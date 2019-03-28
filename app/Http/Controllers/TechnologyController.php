<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Technology;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $technologies = Technology::orderBy('created_at', 'DESC')->where('status', '!=', 2)->get();
        return view('admin.contents.technologies.technologies', [
            'technologies' => $technologies,
            'is_active' => 'menus'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $menus = Menu::all();
        return view('admin.contents.technologies.add', [
            'menus' => $menus,
            'is_active' => 'menus'
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
            'title_uz' => 'string|max:255',
            'title_ru' => 'string|max:255',
            'title_en' => 'string|max:255',
            'menu_photo' => 'image|mimes:jpeg,jpg,png|max:10240'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            $techno = new Technology();
            $techno->menu_id = $request->get('menu_id');
            $techno->title_uz = $request->title_uz;
            $techno->title_ru = $request->title_ru;
            $techno->title_en = $request->title_en;
            $techno->slug = SlugService::createSlug(Technology::class, 'slug', $request->title_uz);
            $techno->techno_uz = $request->techno_uz;
            $techno->techno_ru = $request->techno_ru;
            $techno->techno_en = $request->techno_en;
            $techno->status = $request->get('status');
            $techno->save();

            $notification = array(
                'message' => 'Technology has been created successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('technologies.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function show(Technology $technology)
    {
        return view('admin.contents.technologies.browse', [
        	'technology' => $technology,
	        'is_active' => 'menus'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function edit(Technology $technology)
    {
	    $menus = Menu::all();
	    return view('admin.contents.technologies.edit', [
		    'menus' => $menus,
		    'is_active' => 'menus',
		    'technology' => $technology
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
	    $validator = \Validator::make($request->all(), [
		    'title_uz' => 'string|max:255',
		    'title_ru' => 'string|max:255',
		    'title_en' => 'string|max:255',
		    'menu_photo' => 'image|mimes:jpeg,jpg,png|max:10240'
	    ]);
	
	    if ($validator->fails()) {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    $technology->menu_id = $request->get('menu_id');
		    $technology->title_uz = $request->title_uz;
		    $technology->title_ru = $request->title_ru;
		    $technology->title_en = $request->title_en;
		    $technology->slug = SlugService::createSlug(Technology::class, 'slug', $request->title_uz);
		    $technology->techno_uz = $request->techno_uz;
		    $technology->techno_ru = $request->techno_ru;
		    $technology->techno_en = $request->techno_en;
		    $technology->status = $request->get('status');
		    $technology->save();
		
		    $notification = array(
			    'message' => 'Technology has been updated successfully',
			    'alert-type' => 'success'
		    );
		
		    return redirect()->route('technologies.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Technology  $technology
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->status = 2;
        $technology->save();
        
	    $notification = array(
		    'message' => 'Technology has been deleted successfully',
		    'alert-type' => 'success'
	    );
	
	    return redirect()->route('technologies.index')->with($notification);
    }
}
