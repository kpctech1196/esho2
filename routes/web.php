<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userscontrollers;
use App\Http\Controllers\productscontrollers;
use App\Http\Controllers\orderscontrollers;
use App\Http\Controllers\cartcontrollers;
use App\Http\Controllers\admincontrollers;
use App\Http\Controllers\mailcontrollers;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
//view s
Route::view('livesearch','livesearch');
Route::view('test','test');
Route::view('aboutme','aboutme');
Route::get('sendmail',[mailcontrollers::class,'sendmail']);
// admin socket_
// Route::view('admin','admin.master');
Route::view('adminhome','admin.home');
Route::view('adminlog','admin.adminlogin');
Route::view('stockmanag','admin.stockmanag');
Route::view('admin_account','admin.addmin_account');
Route::view('Ordersadmin','admin.order');
Route::get('Ordersadmi',[orderscontrollers::class,"Ordersadmin"]);
Route::get('serchOrders',[orderscontrollers::class,"serchOrders"]);
Route::post('loadTableajax',[admincontrollers::class,"loadTableajax"]);
Route::view('test','test');
Route::post('adminloginmatch',[admincontrollers::class,"adminloginmatch"]);
Route::get('admin',[admincontrollers::class,"index"]);
Route::post('andmintotalorders',[admincontrollers::class,'andmintotalorders']);
Route::post('andminproducts',[admincontrollers::class,'andminproducts']);
Route::post('adminregistration',[admincontrollers::class,'adminregistration']);
Route::get('adminlogout',[admincontrollers::class,"adminlogout"]);
Route::post('livesearch',[admincontrollers::class,"livesearch"]);
Route::post('insertdatajax',[admincontrollers::class,"insertdatajax"]);
Route::get('Orders',[admincontrollers::class,'Orders']);
Route::post('editupdate',[admincontrollers::class,"editupdate"]);
Route::post('editbutton',[admincontrollers::class,"editbutton"]);
Route::post('Deleterecord',[admincontrollers::class,"Deleterecord"]);

// Route::view('aboutme','aboutme');

//usercontrollers
Route::post('resistration',[userscontrollers::class,"resistration"]);
Route::post('login',[userscontrollers::class,"login"]);
Route::get('userslogout',[userscontrollers::class,"userslogout"]);
Route::post("userchangpassword",[userscontrollers::class,"userchangpassword"]);
//user account page
Route::view('useraccount','user_account');
Route::post('user_ac_name_lname',[userscontrollers::class,'user_ac_name_lname']);
Route::post('user_edit_email',[userscontrollers::class,'user_edit_email']);
Route::post('user_edit_mobile',[userscontrollers::class,'user_edit_mobile']);
Route::post('deactivate_u_account',[userscontrollers::class,'deactivate_u_account']);


// index page
Route::get('/',[productscontrollers::class,"index"]);
Route::get('loadtopnav',[productscontrollers::class,'loadtopnav']);
Route::get('itmedetails/{id}',[productscontrollers::class,'itmedetails']);
Route::get('viewmore/{category}',[productscontrollers::class,'viewmore']);
Route::get('autocompletebox',[productscontrollers::class,'autocompletebox']);
Route::get('rangslider',[productscontrollers::class,'rangslider']);
Route::get('checkout/{id}',[orderscontrollers::class,'checkout']);



// cart 
Route::get("mycart/{id}",[cartcontrollers::class,"mycart"]);
Route::post('cartable',[cartcontrollers::class,'cartable']);
Route::post('AddtoCard',[cartcontrollers::class,'AddtoCard']);
Route::get('AddtoCardview',[cartcontrollers::class,'AddtoCardview']);
Route::post('Deletecarditem',[cartcontrollers::class,'Deletecarditem']);
Route::get('loadcart',[cartcontrollers::class,'loadcart']);
Route::get('AddtoCard_mycard',[cartcontrollers::class,"AddtoCard_mycard"]);
Route::view('cart','shopcart');
// Route::post('AddtoCa',[cartcontrollers::class,'AddtoCard']);


// orderscontrollers

Route::get('caseondelivery/{amt}/{id}/{pay_m}',[orderscontrollers::class,"caseondelivery"]);
Route::get('emailcashondelvery',[mailcontrollers::class,"emailcashondelivery"]);
Route::post('users_orders',[orderscontrollers::class,'orders']);
Route::post('cencelorders',[orderscontrollers::class,"cencelorders"]);
Route::post('getaddresh',[orderscontrollers::class,"getaddresh"]);
Route::post('confirmOrderd',[orderscontrollers::class,'confirmOrderd']);
Route::view('emailcashondelivery','emailcashondelivery');