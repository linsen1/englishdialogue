<?php

namespace App\Http\Controllers;

use App\ClassBase;
use App\DialogueBase;
use App\Http\Requests\EditClassBase;
use App\Http\Requests\EditDialogue;
use App\Http\Requests\StoreDialogue;
use Illuminate\Http\Request;

class DialogueBasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.email.compose');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.dialogue.add',['classBase'=>ClassBase::where('class_type',0)->get()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDialogue $request)
    {
        $validated=$request->validated();
        $dialogues=new DialogueBase();
        $dialogues->dialogue_title=$validated['dialogue_title'];
        $dialogues->dialogue_order=$validated['dialogue_order'];
        $dialogues->dialogue_sentence_count=$validated['dialogue_sentence_count'];
        $dialogues->dialogue_pic=$validated['dialogue_pic'];
        $dialogues->dialogue_home_pic=$validated['dialogue_home_pic'];
        $dialogues->class_base_id=$validated['class_base_id'];
        if($request->hasFile('dialogue_pic')){
            $localfile=$request->dialogue_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $dialogues->dialogue_pic= $up_to_buket;
        }
        if($request->hasFile('dialogue_pic')){
            $localfile1=$request->dialogue_home_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile1,$localfile1);
            $dialogues->dialogue_home_pic= $up_to_buket;
        }
        $dialogues->save();
        return redirect()->route('dialogue.list');
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
        return view('pages.dialogue.edit',['dialogues' => DialogueBase::findorFail($id),'classBase'=>ClassBase::where('class_type',0)->get()]);//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditDialogue $request, $id)
    {
        $dialogues=DialogueBase::findOrFail($id);
        $validated=$request->validated();
        $dialogues->dialogue_title=$validated['dialogue_title'];
        $dialogues->dialogue_order=$validated['dialogue_order'];
        $dialogues->dialogue_sentence_count=$validated['dialogue_sentence_count'];
        $dialogues->class_base_id=$validated['class_base_id'];
        if($request->hasFile('dialogue_pic')){
            $localfile=$request->dialogue_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $dialogues->dialogue_pic= $up_to_buket;
        }
        if($request->hasFile('dialogue_home_pic')){
            $localfile=$request->dialogue_home_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $dialogues->dialogue_home_pic= $up_to_buket;
        }
        $dialogues->save();

        return redirect()->route('dialogue.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dialogues=DialogueBase::findOrFail($id);
        $dialogues->delete();
        session()->flash('status','对话目录已被删除');
        return redirect()->route('dialogue.list');//
    }
}
