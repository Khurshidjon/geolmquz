<?php

namespace App\Http\Controllers;

use App\Address;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $address = Address::where('status', '!=','2')->get();
	    return view('admin.contents.address.address', [
		    'address' => $address,
		    'is_active' => 'menus',
	    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    return view('admin.contents.address.add', [
		    'is_active' => 'objects'
	    ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
	    $validator = \Validator::make($request->all(), [
		    'address_uz' => 'required|string|max:255',
		    'address_ru' => 'required|string|max:255',
		    'address_en' => 'required|string|max:255',
		    'email' => 'required|string|max:255',
		    'phone' => 'required|string|max:255',
		    'status' => 'required|string|max:255',
	    ]);
	
	    if ($validator->fails())
	    {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    
		    Address::create([
		    	'address_uz' => $request->address_uz,
		    	'address_ru' => $request->address_ru,
		    	'address_en' => $request->address_en,
		    	'email' => $request->email,
		    	'phone' => $request->phone,
		    	'status' => $request->get('status')
		    ]);
		    
		    $notification = array(
			    'message' => 'Address has been created successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('address.index')->with($notification);
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show(Address $address)
    {
        return view('admin.contents.address.browse', [
        	'address' => $address,
	        'is_active' => 'menus'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function edit(Address $address)
    {
        return view('admin.contents.address.edit', [
        	'address' => $address,
	        'is_active' => 'menus',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
	    $validator = \Validator::make($request->all(), [
		    'address_uz' => 'required|string|max:255',
		    'address_ru' => 'required|string|max:255',
		    'address_en' => 'required|string|max:255',
		    'email' => 'required|string|max:255',
		    'phone' => 'required|string|max:255',
		    'status' => 'required|string|max:255',
	    ]);
	
	    if ($validator->fails())
	    {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		
		    $address->update([
			    'address_uz' => $request->address_uz,
			    'address_ru' => $request->address_ru,
			    'address_en' => $request->address_en,
			    'email' => $request->email,
			    'phone' => $request->phone,
			    'status' => $request->get('status')
		    ]);
		
		    $notification = array(
			    'message' => 'Address has been updated successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('address.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
        $address->status = 2;
        $address->save();
	    $notification = array(
		    'message' => 'Address has been deleted successfully',
		    'alert-type' => 'success'
	    );
	    return redirect()->route('address.index')->with($notification);
    }
}
