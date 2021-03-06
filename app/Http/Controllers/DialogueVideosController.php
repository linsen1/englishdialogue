<?php

namespace App\Http\Controllers;

use App\DialogueBase;
use App\DialogueVideo;
use App\DialogueWords;
use App\Http\Requests\EditDialogueVideos;
use App\Http\Requests\StoreDialogueVideos;
use Illuminate\Http\Request;

class DialogueVideosController extends Controller
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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dialogue_videos.add',['dialoguebases'=>DialogueBase::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDialogueVideos $request)
    {
        $validated=$request->validated();
        $video=new DialogueVideo();
        $video->dialogue_base_id=$validated['dialogue_base_id'];
        $video->video_mp3_url=$validated['video_mp3_url'];
        $video->video_time=$validated['video_time'];
        $video->video_englishChinese_words=$validated['video_englishChinese_words'];

        if($request->hasFile('video_url')){
            $localfile=$request->video_url->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->video_url= $up_to_buket;
        }
        if($request->hasFile('video_mp3_url')){
            $localfile=$request->video_mp3_url->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->video_mp3_url= $up_to_buket;
        }
        if($request->hasFile('video_image')){
            $localfile=$request->video_image->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->video_image= $up_to_buket;
        }
        if($request->hasFile('english_subtitle')){
            $localfile=$request->english_subtitle->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->english_subtitle= $up_to_buket;
        }
        if($request->hasFile('chinese_subtitle')){
            $localfile=$request->chinese_subtitle->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->chinese_subtitle= $up_to_buket;
        }
        $video->save();
        return redirect()->route('dialogueVideos.list');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return  view('pages.dialogue_videos.edit',['video'=>DialogueVideo::findorFail($id),'dialoguebases'=>DialogueBase::all()]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDialogueVideos $request, $id)
    {
        //$cover_img='';
       // $vod_file='';
        $video=DialogueVideo::findOrFail($id);
        $validated=$request->validated();
        $video->dialogue_base_id=$validated['dialogue_base_id'];
        $video->video_time=$validated['video_time'];
        $video->video_englishChinese_words=$validated['video_englishChinese_words'];


        if($request->hasFile('video_url')){
            $localfile=$request->video_url->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->video_url= $up_to_buket;
           // $vod_file=$localfile;
        }

        if($request->hasFile('video_mp3_url')){
            $localfile=$request->video_mp3_url->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->video_mp3_url= $up_to_buket;
        }

        if($request->hasFile('video_image')){
            $localfile=$request->video_image->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->video_image= $up_to_buket;
            //$cover_img=$localfile;
            //up_video_to_tencent_vod($vod_file,$cover_img);
        }
        if($request->hasFile('english_subtitle')){
            $localfile=$request->english_subtitle->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->english_subtitle= $up_to_buket;
        }
        if($request->hasFile('chinese_subtitle')){
            $localfile=$request->chinese_subtitle->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $video->chinese_subtitle= $up_to_buket;
        }

        $video->save();
        return redirect()->route('dialogueVideos.list'); //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $video=DialogueVideo::findOrFail($id);//
        $video->delete();
        session()->flash('status','??????????????????');
        return redirect()->route('dialogueVideos.list');
    }
}
