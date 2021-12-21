<?php

namespace App\Http\Controllers;

use App\ClassBase;
use Illuminate\Http\Request;
use App\Http\Requests\StoreClassBase;
use App\Http\Requests\EditClassBase;

class ClassBaseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('pages.classbase.list',['classBases'=>ClassBase::orderBY('created_at','desc')->get()]); //
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('pages.classbase.add');  //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClassBase $request)
    {
        $validated=$request->validated();
        $classBase=new ClassBase();
        $classBase->class_name=$validated['class_name'];
        $classBase->class_pic=$validated['class_pic'];
        if($request->hasFile('class_pic')){
            $localfile=$request->class_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $classBase->class_pic= $up_to_buket;
        }
        $classBase->class_order=$validated['class_order'];
        $classBase->class_type=$validated['class_type'];
        $classBase->save();

        return redirect()->route('classBases.list');
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

        return view('pages.classbase.edit',['classBase' => ClassBase::findorFail($id)]);

        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditClassBase $request, $id)
    {
        $classBase=ClassBase::findOrFail($id);
        $validated=$request->validated();
        $classBase->class_name=$validated['class_name'];
        if($request->hasFile('class_pic')){
            $localfile=$request->class_pic->store('images','public');
            $up_to_buket=up_file_to_tencent_buck($localfile,$localfile);
            $classBase->class_pic= $up_to_buket;
        }
        $classBase->class_order=$validated['class_order'];
        $classBase->class_type=$validated['class_type'];
        $classBase->save();
        return redirect()->route('classBases.list');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classBase=ClassBase::findOrFail($id);
        $classBase->delete();
        session()->flash('status','分类已被删除');
        return redirect()->route('classBases.list');
    }
}
