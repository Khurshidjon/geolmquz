<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	$sliders = Slider::orderBy('created_at', 'DESC')->where('status', '!=', 2)->get();
        return view('admin.sliders.sliders', [
        	'is_active' => 'menus',
	        'sliders' => $sliders,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.add', [
        	'is_active' => 'menus',
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
        $validator = Validator::make($request->all(), [
        	'title_uz' => 'string:max:255',
        	'title_ru' => 'string:max:255',
        	'title_en' => 'string:max:255',
        	'status' => 'required',
        	'slider_photo' => 'required|image|mimes:jpeg,jpg,png|max:20480'
        ]);
        
        if ($validator->fails()){
        	return redirect()->back()
		        ->withErrors($validator)
        	    ->withInput();
        }else{
        	$slider_photo = $request->file('slider_photo')->store('Sliders' . '/' . date('FY'), 'public');
            $slider = new Slider();
            $slider->title_uz = $request->title_uz;
            $slider->title_ru = $request->title_ru;
            $slider->title_en = $request->title_en;
            $slider->body_uz = $request->body_uz;
            $slider->body_ru = $request->body_ru;
            $slider->body_en = $request->body_en;
            $slider->status = $request->get('status');
            $slider->slider_photo = $slider_photo;
            $slider->save();
	        $notification = array(
		        'message' => 'Slider has been created successfully',
		        'alert-type' => 'success'
	        );
            return redirect()->route('sliders.index', [
            	'is_active' => 'menus',
            ])->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        return view('admin.sliders.browse', [
        	'is_active' => 'menus',
	        'slider' => $slider
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
	    return view('admin.sliders.edit', [
		    'is_active' => 'menus',
		    'slider' => $slider
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
	    $validator = Validator::make($request->all(), [
		    'title_uz' => 'string:max:255',
		    'title_ru' => 'string:max:255',
		    'title_en' => 'string:max:255',
		    'status' => 'required',
		    'slider_photo' => 'image|mimes:jpeg,jpg,png|max:20480'
	    ]);
	
	    if ($validator->fails()){
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    $slider->title_uz = $request->title_uz;
		    $slider->title_ru = $request->title_ru;
		    $slider->title_en = $request->title_en;
		    $slider->body_uz = $request->body_uz;
		    $slider->body_ru = $request->body_ru;
		    $slider->body_en = $request->body_en;
		    $slider->status = $request->get('status');
		    if ($request->file('slider_photo')){
			    $slider->slider_photo = $request->file('slider_photo')->store('Sliders' . '/' . date('FY'), 'public');
		    }
		    $slider->save();
		    $notification = array(
			    'message' => 'Slider has been updated successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('sliders.index', [
			    'is_active' => 'menus',
		    ])->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->status = 2;
        $slider->save();
	    $notification = array(
		    'message' => 'Slider has been deleted successfully',
		    'alert-type' => 'success'
	    );
	    return redirect()->route('sliders.index', [
		    'is_active' => 'menus',
	    ])->with($notification);
    }
}
