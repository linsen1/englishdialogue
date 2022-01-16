<?php

namespace App\Http\Controllers\Api\V1;

use App\ClassBase;
use App\DialogueBase;
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
        $infos = DialogueBase::orderBY('created_at', 'desc')->take(5)->get();
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
        $info = DialogueBase::where('class_base_id',$id)->orderBy('dialogue_order', 'asc')->get();
        return response()->json(['status' => $status, 'data' => $info]);
    }

    public function showDialogue($id){
        $status = 200;
        $info=DialogueWords::where('dialogue_base_id',$id)->orderBy('words_order','asc')->get();
        return response()->json(['status' => $status, 'data' => $info]);
    }

}
