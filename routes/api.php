<?php

use App\Http\Controllers\Api\V1\CustomUserController;
use App\Http\Controllers\Api\V1\HomeController;
use App\Http\Controllers\AudioController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix("v1")->group(function (){

    //对话专栏相关
   Route::get('/home-lasted', [HomeController::class,'lastDialog'])->name('home.lastedDialogue');
   Route::get('/home-class-name',[HomeController::class,'lastDialogBase'])->name('home.dialogueClassName');
   Route::get('/home-class-list',[HomeController::class,'dialogList'])->name('more.dialogueClassList');
   Route::get('/dialogue-list/{id}',[HomeController::class,'dialogInfo'])->name('show.dialogueList');
   Route::get('/dialogue-info/{id}',[HomeController::class,'showDialogue'])->name('show.dialogueInfo');
    Route::get("/audio-info1/{id}",[AudioController::class,'showAudio'])->name('show.audio');

    Route::get('/audio-info/{id}',[HomeController::class,'showAudioInfo'])->name('show.audio1');


   //用户注册、更新、查看相关方法
   Route::get('/custom-user/{id}',[CustomUserController::class,'show'])->name('custom.user.show');
   Route::post('/user-action',[CustomUserController::class,'customUserAction'])->name('custom.user.action'); //用户注册或更新接口

   //暂不使用
   Route::post('/custom-user',[CustomUserController::class,'store'])->name('custom.user.reg');
   Route::put('/custom-user/{id}',[CustomUserController::class,'update'])->name('custom.user.update');


   //用户喜欢模块的相关方法
   Route::get('/user-fav-top5/{userid}',[CustomUserController::class,'getUserFav'])->name('custom.user.fav-top5');
   Route::get('/user-fav-list/{userid}',[CustomUserController::class,'getUserFavList'])->name('custom.user.fav-list');
   Route::post('/user-has-fav',[CustomUserController::class,'hasFav'])->name('custom.user.has-fav');
   Route::post('/user-fav-action',[CustomUserController::class,'userFavAction'])->name('custom.user.fav-action');  //添加和删除喜欢接口

//暂不使用
   Route::post('/user-add-fav',[CustomUserController::class,'addUserFav'])->name('custom.user.add-fav');
   Route::delete('/user-del-fav',[CustomUserController::class,'delUserFav'])->name('custom.user.del-fav');

   //音频字幕播放测试



});