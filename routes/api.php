<?php

use App\Http\Controllers\Api\V1\CustomUserController;
use App\Http\Controllers\Api\V1\HomeController;
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

   //用户注册、更新、查看相关方法
   Route::post('/custom-user',[CustomUserController::class,'store'])->name('custom.user.reg');
   Route::put('/custom-user/{id}',[CustomUserController::class,'update'])->name('custom.user.update');
   Route::get('/custom-user/{id}',[CustomUserController::class,'show'])->name('custom.user.show');

   //用户喜欢模块的相关方法
   Route::get('/user-fav-top5/{userid}',[CustomUserController::class,'getUserFav'])->name('custom.user.fav-top5');
   Route::get('/user-fav-list/{userid}',[CustomUserController::class,'getUserFavList'])->name('custom.user.fav-list');
   Route::post('/user-add-fav',[CustomUserController::class,'addUserFav'])->name('custom.user.add-fav');
   Route::delete('/user-del-fav',[CustomUserController::class,'delUserFav'])->name('custom.user.del-fav');
   Route::post('/user-has-fav',[CustomUserController::class,'hasFav'])->name('custom.user.has-fav');

});