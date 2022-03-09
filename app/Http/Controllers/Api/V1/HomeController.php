<?php

namespace App\Http\Controllers\Api\V1;

use App\ClassBase;
use App\DialogueBase;
use App\DialogueVideo;
use App\DialogueWords;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function lastDialog()
    {
        $status = 200;
        $infos = DialogueBase::orderBY('dialogue_order', 'asc')->take(5)->get();
        return response()->json(['status' => $status, 'data' => $infos]);
    }

    public function lastDialogBase()
    {
        $status = 200;
        $info = ClassBase::orderBY('class_order', 'asc')->take(5)->get();
        if ($info) {
            return response()->json(['status' => $status, 'data' => $info]);
        } else {
            $status = 500;
            return response()->json(['status' => $status, 'data' => $info]);
        }
    }

    public function dialogList()
    {
        $status = 200;
        $info = ClassBase::orderBy('class_order', 'asc')->paginate(10);
        return response()->json(['status' => $status, 'data' => $info]);
    }

    public function dialogInfo($id)
    {
        $status = 200;
        $info = DialogueBase::where('class_base_id',$id)->orderBy('id', 'asc')->get();
        return response()->json(['status' => $status, 'data' => $info]);
    }

    public function showDialogue($id){
        $status = 200;
        $info=DialogueWords::where('dialogue_base_id',$id)->with('DialogueBase')->orderBy('words_order','asc')->get();
        return response()->json(['status' => $status, 'data' => $info]);
    }

    public function showAudioInfo($id){

        $status = 200;
        $info=DialogueVideo::where('dialogue_base_id',$id)->with('DialogueBase')->get();
        $wordszimu= explode("\r\n\r\n\r\n",$info[0]['video_englishChinese_words']);
        $audioBase=array(
            'id'=>$id,
            'video_title'=>$info[0]['DialogueBase']['dialogue_title'],
            'video_pic'=>$info[0]['video_image'],
            'video_mp3'=>$info[0]['video_mp3_url'],
            'created_at'=>$info[0]['created_at'],
            'updated_at'=>$info[0]['updated_at'],
            'dialogue_base'=>$info[0]['DialogueBase']
        );
        $seconds=$info[0]['video_time'];
       
        $zimuArray=[];
        foreach($wordszimu as $value){
            $itemArray=explode("\r\n",$value);
            $info=[];
            $info['time']=$this->getTimes($itemArray[0],$seconds);
            $info['words']=$itemArray[1].'|'.$itemArray[2];
            array_push($zimuArray,$info);
        }
        $audioBase['video_zimu']=$zimuArray;

        return response()->json(['status' => $status, 'data' => $audioBase]);
    }

    public function getTimes($currentTime,$seconds){
        $sourceTime=explode(":",$currentTime);
        $time0=(int)$sourceTime[0]*3600;
        $time1=(int)$sourceTime[1]*60;
        $time2=(int)$sourceTime[2];
        $total=$time0+$time1+$time2-$seconds;
        return gmdate("i:s",$total);
    }
}
