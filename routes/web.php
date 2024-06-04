<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Middleware\logincheck;
use App\Http\Controllers\AdminController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('login',[UserController::class,'login'])->name('login');
Route::post('loginpost',[UserController::class, 'loginpost'])->name('loginpost');

Route::get('register',[RegisterController::class,'register'])->name('register');
Route::post('usernamecheck',[UserController::class,'usernamecheck'])->name('usernamecheck');
Route::post('referaldetails',[UserController::class,'referaldetails'])->name('referaldetails');
Route::post('registersubmit',[RegisterController::class, 'registersubmit'])->name('registersubmit');


Route::group(['middleware'=>['logincheck']],function(){
Route::get('userdashboard', [UserController::class, 'userdashboard'])->name('userdashboard');
Route::get('productone',[UserController::class,'productone'])->name('productone');
Route::get('producttwo',[UserController::class,'producttwo'])->name('producttwo');
Route::get('productthree',[UserController::class,'productthree'])->name('productthree');

Route::get('subscribeplan',[UserController::class,'subscribeplan'])->name('subscribeplan');
Route::get('subscribe/{plan_id}',[UserController::class,'subscribe'])->name('subscribe');
Route::get('makepayment',[UserController::class,'makepayment'])->name('makepayment');

Route::post('depositmoney',[UserController::class,'depositmoney'])->name('depositmoney');
Route::get('passbook',[UserController::class,'passbook'])->name('passbook');
Route::get('adduser',[UserController::class,'adduser'])->name('adduser');


Route::post('adduserpost',[UserController::class,'adduserpost'])->name('adduserpost');

Route::get('downlineusers',[UserController::class,'activedownlineusers'])->name('activedownlineusers');
Route::post('getuserdetails',[UserController::class,'getuserdetails'])->name('getuserdetails');

Route::get('inactivedownlineusers',[UserController::class,'inactivedownlineusers'])->name('inactivedownlineusers');

Route::get('levelusers',[UserController::class,'levelusers'])->name('levelusers');

Route::get('referallusers',[UserController::class,'referallusers'])->name('referallusers');

Route::get('fundtransftertoother',[UserController::class,'fundtransftertoother'])->name('fundtransftertoother');

Route::post('serachphonenumber',[UserController::class,'serachphonenumber'])->name('serachphonenumber');

Route::get('withdraw',[UserController::class,'withdraw'])->name('withdraw');

Route::post('withdrawmoney',[UserController::class,'withdrawmoney'])->name('withdrawmoney');
Route::get('legality',[UserController::class, 'legality'])->name('legality');

Route::get('kycupdate',[UserController::class,'kycupdate'])->name('kycupdate');
Route::post('updatekyc',[UserController::class,'updatekyc'])->name('updatekyc');
Route::get('successfulkyc',[UserController::class,'successfulkyc'])->name('successfulkyc');
Route::get('usertree/{id}',[UserController::class,'usertree'])->name('usertree');

Route::get('logout',[UserController::class,'logout'])->name('logout');
Route::get('userprofile',[UserController::class,'userprofile'])->name('userprofile');

Route::post('submitprofilesetting',[UserController::class,'submitprofilesetting'])->name('submitprofilesetting');

Route::get('changepassword',[UserController::class,'changepassword'])->name('changepassword');

Route::post('submitchangepassword',[UserController::class,'submitchangepassword'])->name('submitchangepassword');

Route::get('userdashboard', [UserController::class, 'userdashboard'])->name('userdashboard');

Route::get('transactionpin',[UserController::class,'transactionpin'])->name('transactionpin');

Route::post('submittransactionpin',[UserController::class,'submittransactionpin'])->name('submittransactionpin');


Route::post('submitchnagetransactionpin',[UserController::class,'submitchnagetransactionpin'])->name('submitchnagetransactionpin');


Route::get('changetransactionpin',[UserController::class,'changetransactionpin'])->name('changetransactionpin');

Route::get('supportticket',[UserController::class,'supportticket'])->name('supportticket');
Route::post('userplanbal',[UserController::class,'userplanbal'])->name('userplanbal');
Route::get('orders',[UserController::class,'orders'])->name('orders');
// Route::get('returnorder/{oid}',[UserController::class,'returnorder'])->name('returnorder');
// Route::post('/cancelorder/{oid}',[UserController::class,'cancelorder'])->name('cancelorder');


});

Route::get('adminlogin',[AdminController::class,'adminlogin'])->name('adminlogin');

Route::post('adminloginpost',[AdminController::class,'adminloginpost'])->name('adminloginpost');

Route::get('admindashboard',[AdminController::class,'admindashboard'])->name('admindashboard');

//admintype
Route::get('types',[AdminController::class, 'types'])->name('types');
Route::get('addtype',[AdminController::class, 'addtype'])->name('addtype');
Route::post('submittype',[AdminController::class, 'submittype'])->name('submittype');

Route::get('/edittype/{type_id}',[AdminController::class, 'edittype'])->name('edittype');

Route::get('/deletetype/{type_id}',[AdminController::class, 'deletetype'])->name('deletetype');

Route::post('/updatetype/{type_id}',[AdminController::class, 'updatetype'])->name('updatetype');    

//adminproduct
Route::get('adminproduct',[AdminController::class, 'adminproduct'])->name('adminproduct');
Route::get('addadminproduct',[AdminController::class, 'addadminproduct'])->name('addadminproduct');
Route::post('submitproduct',[AdminController::class, 'submitproduct'])->name('submitproduct');

Route::get('clickproduct/{id}',[AdminController::class, 'updateproduct'])->name('updateproduct');
Route::post('submitupdateproduct/{id}',[AdminController::class, 'submitupdateproduct'])->name('submitupdateproduct');

Route::get('deleteproduct/{id}',[AdminController::class, 'deleteproduct'])->name('deleteproduct');

//addlevel

Route::get('addtolevel',[AdminController::class, 'addtolevel'])->name('addtolevel');
Route::post('submitaddtolevel',[AdminController::class, 'submitaddtolevel'])->name('submitaddtolevel');


Route::get('activeusers',[AdminController::class, 'activeusers'])->name('activeusers');


Route::get('banneduser',[AdminController::class, 'banneduser'])->name('banneduser');


Route::get('pendingdeposit',[AdminController::class, 'pendingdeposit'])->name('pendingdeposit');

Route::post('postsendmoney',[UserController::class,'postsendmoney'])->name('postsendmoney');

