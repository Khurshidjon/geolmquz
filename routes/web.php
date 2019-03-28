<?php

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
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
$locale = App::getLocale();

View::composer('layouts.main', function ($view){
    $menus = \App\Menu::where('parent_id', null)->where('position', 1)->get();
	$address = \App\Address::where('status', 1)->first();
	$footer_menus = \App\Menu::where('parent_id', null)->where('position', 1)->get();
	$socials = \App\Social::where('status', 1)->get();
	
	$view->with([
        'menus' => $menus,
        'footer_menus' => $footer_menus,
		'address' => $address,
        'socials' => $socials,
    ]);
});

Route::get('index/{lang}', function ($lang) {
    \Session::put('lang', $lang);
    return redirect()->back();
})->name('locale');

    Route::get('/', 'HomeController@index')->name('index');
    Route::get('/about', 'HomeController@about')->name('about');
    Route::get('/show/biz-bilan-bo-laning-1', 'HomeController@contacts')->name('contacts');
    Route::get('/show/{menu}', 'HomeController@showPage')->name('page.show');
    Route::get('/show/{menu}/{submenu}', 'HomeController@showContent')->name('page.content');
    Route::get('/show_single/object/{object}', 'HomeController@singleObject')->name('single.object');
    Route::post('/comments', 'CommentController@store')->name('comment.store');
    
    Route::get('/search', 'HomeController@search')->name('search');
    
    Route::post('/subscribers', 'SubscriberController@store')->name('subscribers');
    
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'admin'], function (){
	
	Route::get('/login', 'AdminController@loginPage')->name('admin.login');
	
	Route::get('/', 'AdminController@index')->name('admin.index');
	
	Route::middleware(['is_admin'])->group(function () {
		Route::get('/account', 'AdminController@edit')->name('user.account.edit');
		Route::post('/account/update', 'AdminController@update')->name('user.account.update');
		
		Route::resource('/address', 'AddressController');
		
		Route::resource('/objects', 'XObjectController');
		
		Route::resource('/what_we_offers', 'WhatWeOfferController');
		
		Route::resource('/menus', 'MenuController');
		
		Route::resource('/technologies', 'TechnologyController');
		
		Route::resource('/certificats', 'CertificatController');
		
		Route::resource('/object_galleries', 'ObjectGalleryController');
		
		Route::resource('/sliders', 'SliderController');
		
		Route::resource('/social_networks', 'SocialController');
	});
});
    
    Route::get('email-test', function(){
        
        $details['email'] = 'mr.xurshidjon1995@gmail.com';
        
        dispatch(new App\Jobs\SendEmailJob($details));
        
        dd('done');
    });
