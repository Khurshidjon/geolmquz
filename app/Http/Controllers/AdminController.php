<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Menu;
use App\User;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    	//$this->middleware('is_admin')->only('index');
    }
	
	public function index(Request $request)
    {
        if (Auth::check()){
        	if (Auth::user()->is_admin == 1){
		        return view('admin.index', [
			        'is_active' => 'index'
		        ]);
	        }else{
        		return redirect()->back();
	        }
        }else{
	        return redirect()->route('admin.login');
        }
    }

    public function loginPage()
    {
	    if (Auth::check()){
		    return redirect()->route('admin.index');
	    }else{
		    return view('admin.login');
	    }
    }




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function show(Admin $admin)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        return view('admin.account', [
        	'is_active' => '',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Admin $admin)
    {
	    $validator = \Validator::make($request->all(), [
		    'name' => 'string|max:255',
		    'email' => 'string|max:255',
		    'password' => 'same:password',
		    'password_confirmation' => 'same:password',
		    'avatar' => 'image|mimes:jpeg,jpg,png|max:10240',
	    ]);
	
	    if ($validator->fails()) {
		    $notification = array(
			    'message' => 'You have any error to user update failed',
			    'alert-type' => 'error'
		    );
		    return redirect()->back()
			    ->withErrors($validator)
			    ->with($notification)
			    ->withInput();
	    }else{
	    	if ($request->file('avatar')){
			    $avatar = $request->file('avatar')->store('user' .'/'. date('FY'), 'public');
		    }
		    
	    	$id = Auth::user()->id;
		    $user = User::find($id);
		    $user->name = $request->name;
		    $user->email = $request->email;
		    if ($request->current_password){
			    if (Hash::check(Input::get('current_password'), $user['password'])){
				    $user->password = bcrypt($request->password);
			    }
		    }
		    if ($request->file('avatar')) {
			    $user->avatar = $avatar;
		    }
		    $user->save();
		    
		    $notification = array(
			    'message' => 'User has been updated successfully',
			    'alert-type' => 'success'
		    );
		
		    return redirect()->back()->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Admin  $admin
     * @return \Illuminate\Http\Response
     */
    public function destroy(Admin $admin)
    {
        //
    }
}
