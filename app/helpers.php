<?php
use Vod\VodUploadClient;
use Vod\Model\VodUploadRequest;

function active_class($path, $active = 'active') {
  return call_user_func_array('Request::is', (array)$path) ? $active : '';
}

function is_active_route($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'true' : 'false';
}

function show_class($path) {
  return call_user_func_array('Request::is', (array)$path) ? 'show' : '';
}

function show_class_bases_name($class_id){
   $classbase=\App\ClassBase::where('id',$class_id)->get();
   return $classbase[0]['class_name'];
}

function show_dialogue_title($dialogue_base_id){
    $className=\App\DialogueBase::where('id',$dialogue_base_id)->get();
    return $className[0]['dialogue_title'];
}

function up_file_to_tencent_buck($union_key,$path){
    $secretId=env('secretId');
    $secretKey=env('secretKey');
    $region=env('region');

    $cosClient = new Qcloud\Cos\Client(
        array(
            'region' => $region,
            'schema' => 'https', //协议头部，默认为http
            'credentials'=> array(
                'secretId'  => $secretId ,
                'secretKey' => $secretKey)));

### 上传文件流
    try {

        $result = $cosClient->upload(
            $bucket = env('bucket'), //存储桶名称，由BucketName-Appid 组成，可以在COS控制台查看 https://console.cloud.tencent.com/cos5/bucket
            $key = $union_key, //此处的 key 为对象键
            $body = fopen(storage_path('app/public/'.$path), 'rb')
        );
        return $result['Key'];
    } catch (\Exception $e) {
       dd("$e\n");
    }
}

function up_video_to_tencent_vod($media,$cover_file){
    $secretId=env('secretId');
    $secretKey=env('secretKey');
    $region=env('region');
    $client = new VodUploadClient($secretId, $secretKey);
    $req = new VodUploadRequest();
    $req->MediaFilePath = storage_path('app/public/'.$media);
    $req->CoverFilePath =storage_path('app/public/'.$cover_file);
    $req->ClassId=862768;
    $req->Procedure='dialoguetrace';
    try {
        $rsp = $client->upload($region, $req);
        return [
            "media"=>$rsp->getMediaUrl(),
            "file_Id"=>$rsp->getFileId(),
            "cover_url"=>$rsp->getCoverUrl()
        ];
    } catch (Exception $e) {
        // 处理上传异常
        dd($e);
    }
}