<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EcommAdditemController;
use App\Http\Controllers\EcommUserController;
use App\Http\Controllers\EcommLoginController;
use App\Http\Controllers\EcommCartController;
use App\Http\Controllers\EcommAdminController;
use App\Http\Controllers\WebProfile1Controller;
use App\Http\Controllers\WebProfile2Controller;
use App\Http\Controllers\WebProfile3Controller;
use App\Http\Controllers\WebProfile4Controller;




Route::get('/', function () {
    return view('home1');
});


//Ecommerce Start======================================================================

//additem and view item
Route::get('/ecomm_index', [EcommAdditemController::class,'display_ecomm_items']);
Route::get('/ecomm_item/{id}', [EcommAdditemController::class,'preview_item']);
Route::post('/ecomm_add_item', [EcommAdditemController::class,'ecomm_add_item']);
Route::get('/ecomm_admin', function () {
    return view('ecommerce/admin');
});


//ecomm signup
Route::get('/ecomm_signup', function () {
    return view('ecommerce/ecomsignup');
});
Route::post('/ecomm_signup', [EcommUserController::class,'ecomm_add_member']);


//ecomm member
Route::get('/ecomm_member_index', [EcommAdditemController::class,'logged_display_ecomm_items']);
Route::get('/ecomm_member_item/{id}', [EcommAdditemController::class,'logged_preview_item']);
Route::get('/ecomm_cart', [EcommCartController::class,'ecomm_cart_show']);
Route::post('/add_to_cart/{id}', [EcommCartController::class,'add_to_cart']);
Route::get('/ecomm_member_update', function () {
    return view('ecommerce/ecomm_member_update');
});
Route::post('/ecomm_member_update', [EcommUserController::class,'ecomm_update']);


//ecomm admin
Route::get('/ecomm_admin_dash', function () {
    return view('ecommerce/ecomadmindash');
});

Route::get('/ecomm_admin_signup', function () {
    return view('ecommerce/ecomadminsignup');
});

Route::post('/ecomm_admin_signup', [EcommAdminController::class, 'ecomm_admin_signup'])->name('ecomm_admin_signup');

Route::get('/ecomm_search', function () {
    return view('ecommerce/searchpage');
});

Route::get('/search', [EcommAdditemController::class, 'search'])->name('search');


//ecomm_login
Route::get('/ecomm_login', function () {
    return view('ecommerce/ecomlogin');
});
Route::post('/ecomm_login', [EcommLoginController::class,'ecomm_authenticate']);
Route::get('logout', [EcommLoginController::class,'logout'])->name('logout');

//categories
Route::get('/ecomm_books', [EcommAdditemController::class,'ecomm_books']);
Route::get('/ecomm_cloths', [EcommAdditemController::class,'ecomm_cloths']);
Route::get('/ecomm_computer_accessories', [EcommAdditemController::class,'ecomm_computer_accessories']);
Route::get('/ecomm_computer', [EcommAdditemController::class,'ecomm_computer']);
Route::get('/ecomm_footwear', [EcommAdditemController::class,'ecomm_footwear']);
Route::get('/ecomm_furniture', [EcommAdditemController::class,'ecomm_furniture']);
Route::get('/ecomm_household', [EcommAdditemController::class,'ecomm_household']);
Route::get('/ecomm_laptop', [EcommAdditemController::class,'ecomm_laptop']);
Route::get('/ecomm_stationary', [EcommAdditemController::class,'ecomm_stationary']);
Route::get('/ecomm_tires', [EcommAdditemController::class,'ecomm_tires']);

//member_categories
//categories
Route::get('/ecomm_member_books', [EcommAdditemController::class,'ecomm_member_books']);
Route::get('/ecomm_member_cloths', [EcommAdditemController::class,'ecomm_member_cloths']);
Route::get('/ecomm_member_computer_accessories', [EcommAdditemController::class,'ecomm_member_computer_accessories']);
Route::get('/ecomm_member_computer', [EcommAdditemController::class,'ecomm_member_computer']);
Route::get('/ecomm_member_footwear', [EcommAdditemController::class,'ecomm_member_footwear']);
Route::get('/ecomm_member_furniture', [EcommAdditemController::class,'ecomm_member_furniture']);
Route::get('/ecomm_member_household', [EcommAdditemController::class,'ecomm_member_household']);
Route::get('/ecomm_member_laptop', [EcommAdditemController::class,'ecomm_member_laptop']);
Route::get('/ecomm_member_stationary', [EcommAdditemController::class,'ecomm_member_stationary']);
Route::get('/ecomm_member_tires', [EcommAdditemController::class,'ecomm_member_tires']);

Route::get('/product_update', function () {
    return view('ecommerce/ecom_itemupdate');
});

Route::get('/product_view', function () {
    return view('ecommerce/adminproduct_view');
});

Route::get('/product_update', [EcommAdditemController::class, 'index'])->name('product_update');
//Route::get('/product/{id}/edit', [EcommAdditemController::class, 'edit'])->name('edit_product');
Route::delete('/product/{id}', [EcommAdditemController::class, 'destroy'])->name('delete_product');
Route::get('/edit_product/{id}', [EcommAdditemController::class, 'edit'])->name('edit_product');
Route::put('/update_product/{id}', [EcommAdditemController::class, 'update'])->name('update_product');

//Ecommerce End======================================================================


//Main Web Start=====================================================================

Route::get('/web_index', function () {
    return view('mainweb/index');
});

Route::get('/web_components', function () {
    return view('mainweb/components');
});

//Templates Raviprabha
Route::get('/web_profile1',[WebProfile1Controller::class,'web_profile1']);
Route::get('/web_profile2',[WebProfile2Controller::class,'web_profile2']);
Route::get('/web_profile3',[WebProfile3Controller::class,'web_profile3']);
Route::get('/web_profile4',[WebProfile4Controller::class,'web_profile4']);
//end of templates Raviprabha



Route::get('/web_template_J1', function () {
    return view('mainweb/template_ja/template_J1');
});

Route::get('/web_template_J2', function () {
    return view('mainweb/template_ja/template_J2');
});




