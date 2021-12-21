<?php

namespace App\Http\Controllers;

use App\ClassBase;
use App\DialogueBase;
use App\DialogueWords;
use App\Http\Requests\EditDialogueWords;
use App\Http\Requests\StoreDialogueWords;
use Illuminate\Http\Request;

class DialogueWordsController extends Controller
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
        return view('pages.dialogue-words.add',['dialoguebases'=>DialogueBase::all()]); //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDialogueWords $request)
    {
        $validated=$request->validated();
        $Words=new DialogueWords();
        $Words->words_text=$validated['words_text'];
        $Words->dialogue_base_id=$validated['dialogue_base_id'];
        $Words->words_pic=$validated['words_pic'];
        $Words->words_audio=$validated['words_pic'];
        $Words->words_order=$validated['words_order'];
        $Words->words_is_translate=$validated['words_is_translate'];

        if($request->hasFile('words_pic')){
            $localfile=$request->words_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $Words->words_pic= $up_to_buket;
        }

        if($request->hasFile('words_audio')){
            $localfile=$request->words_audio->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $Words->words_audio= $up_to_buket;
        }

        if($request->input('words_subtitle')){
            $Words->words_subtitle=$request->input('words_subtitle');
        }
        $Words->save();
        return redirect()->route('dialogueWords.list');
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
       return  view('pages.dialogue-words.edit',['words'=>DialogueWords::findorFail($id),'dialoguebases'=>DialogueBase::all()]); //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDialogueWords $request, $id)
    {
        $Words=DialogueWords::findOrFail($id);
        $validated=$request->validated();
        $Words->words_text=$validated['words_text'];
        $Words->dialogue_base_id=$validated['dialogue_base_id'];
        $Words->words_order=$validated['words_order'];
        $Words->words_is_translate=$validated['words_is_translate'];
        if($request->hasFile('words_pic')){
            $localfile=$request->words_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $Words->words_pic= $up_to_buket;
        }
        if($request->hasFile('words_audio')){
            $localfile=$request->words_audio->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $Words->words_audio= $up_to_buket;
        }
        if($request->input('words_subtitle')){
            $Words->words_subtitle=$request->input('words_subtitle');
        }
        $Words->save();
        return redirect()->route('dialogueWords.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Words=DialogueWords::findOrFail($id);
        $Words->delete();
        session()->flash('status','分类已被删除');
        return redirect()->route('dialogueWords.list');
        //
    }
}
