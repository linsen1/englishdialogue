<?php

namespace App\Http\Controllers\Api\V1;

use App\CustomUser;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCustomUser;
use App\Http\Requests\StoreUserFavorite;
use App\UserFavorite;
use Illuminate\Http\Request;

class CustomUserController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function store(StoreCustomUser $request)
    {
        $status = 200;
        $validated=$request->validated();
        $is_user=CustomUser::where('user_wx_openid',$validated['user_wx_openid']);
        if($is_user->count()){
            return response()->json(['status'=>$status,'data'=>['flag'=>'0']]);
        }else {
            $custom_user = new CustomUser();
            $custom_user->user_wx_openid = $validated['user_wx_openid'];
            $custom_user->user_nickname = $validated['user_nickname'];
            $custom_user->user_pic = $request->input('user_pic');
            $custom_user->save();
            return response()->json(['status'=>$status,'data'=>['flag'=>'1','info'=>$custom_user]]);
        }
        //
    }



    public function customUserAction(StoreCustomUser $request)
    {
        $status = 200;
        $validated=$request->validated();
        $custom_user=CustomUser::updateOrCreate(
            ['user_wx_openid'=>$validated['user_wx_openid']],
            ['user_nickname'=>$validated['user_nickname'],'user_pic'=>$request->input('user_pic')]
        );

        return response()->json(['status'=>$status,'data'=>['flag'=>'1','info'=>$custom_user]]);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function show($id)
    {
        $status=200;
        $custom_user=CustomUser::findOrFail($id);
        return response()->json(['status'=>$status, 'data'=>$custom_user]);
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function update(StoreCustomUser $request, $id)
    {
        $custom_user=CustomUser::findOrFail($id);
        $validated=$request->validated();
        $custom_user->user_wx_openid=$validated['user_wx_openid'];
        $custom_user->user_nickname=$validated['user_nickname'];
        $custom_user->user_pic=$request->input('user_pic');
        $custom_user->save();
        $status=200;
        return response()->json(['status'=>$status, 'data'=>$custom_user]);
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {

        //
    }

    public  function  getUserFav($userid){
        $status=200;
        $favinfo=UserFavorite::with('DialogueInfo')->where('custom_user_id',$userid)->latest()->take(5)->get();
       // $custom_fav_top5=UserFavorite::where('custom_user_id',$userid);
      return response()->json(['status'=>$status,'data'=>$favinfo]);
    }

    public  function getUserFavList($userid){
        $status=200;
        $custom_fav_list=UserFavorite::with('DialogueInfo')->where('custom_user_id',$userid)->latest()->paginate(10);
        return response()->json(['status'=>$status,'data'=>$custom_fav_list]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function  addUserFav(StoreUserFavorite $request){
        $status=200;
        $validated=$request->validated();
        $is_user_fav=UserFavorite::where([['custom_user_id','=',$validated['custom_user_id']],['fav_info_id','=',$validated['fav_info_id']]]);
        if($is_user_fav->count()>0){
            return response()->json(['status'=>$status,'data'=>['flag'=>'0']]);
        }else{
            $user_fav=new UserFavorite();
            $user_fav->custom_user_id=$validated['custom_user_id'];
            $user_fav->fav_info_id=$validated['fav_info_id'];
            $user_fav->save();
            return response()->json(['status'=>$status,'data'=>['flag'=>'1','info'=>$user_fav]]);
        }
    }

    public function userFavAction(StoreUserFavorite $request)
    {
        $status = 200;
        $validated = $request->validated();
        $is_user_fav = UserFavorite::where([['custom_user_id', '=', $validated['custom_user_id']], ['fav_info_id', '=', $validated['fav_info_id']]]);

        if ($is_user_fav->count() == 0){
            $user_fav1 = UserFavorite::create(
                ['custom_user_id' => $validated['custom_user_id'], 'fav_info_id' => $validated['fav_info_id']]
            );
            return response()->json(['status'=>$status,'data'=>['flag'=>'1','info'=>$user_fav1]]);
        } else{
            $user_fav=$is_user_fav->delete();
            return response()->json(['status'=>$status,'data'=>['flag'=>'1','info'=>'已删除']]);
        }


    }




    public function delUserFav(StoreUserFavorite $request){
        $status=200;
        $validated=$request->validated();
        $user_fav=UserFavorite::where([['custom_user_id','=',$validated['custom_user_id']],['fav_info_id','=',$validated['fav_info_id']]]);
        if($user_fav->count()>0){
            $user_fav->delete();
            return response()->json(['status'=>$status,'data'=>['flag'=>'1']]);
        }else{
            return response()->json(['status'=>$status,'data'=>['flag'=>'0']]);
        }
    }

    public function hasFav(StoreUserFavorite $request){
        $status=200;
        $validated=$request->validated();
        $user_fav=UserFavorite::where([['custom_user_id','=',$validated['custom_user_id']],['fav_info_id','=',$validated['fav_info_id']]]);
        if($user_fav->count()>0){
            return response()->json(['status'=>$status,'data'=>['flag'=>'1']]);
        } else{
            return response()->json(['status'=>$status,'data'=>['flag'=>'0']]);
        }
    }

}
