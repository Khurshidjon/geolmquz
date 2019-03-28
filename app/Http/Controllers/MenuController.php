<?php

namespace App\Http\Controllers;

use App\Menu;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::where('parent_id', null)->where('status', '!=', 0)->get();
        
        return view('admin.menus.menus', [
            'is_active' => 'menus',
            'menus' => $menus,
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
        return view('admin.menus.add', [
            'is_active' => 'menus',
            'menus' => $menus,
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
            'menu_uz' => 'required|string|max:255',
            'menu_ru' => 'required|string|max:255',
            'menu_en' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'position' => 'required',
            'parent_id' => 'string|max:255',
            'menu_photo' => 'required|image|mimes:jpeg,jpg,png|max:10240'
        ]);

        if ($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if ($request->file('menu_photo')) {
                $menu_photo = $request->file('menu_photo')->store('MenuPhotos' . '/' . date('FY'), 'public');
            }
            $menu = new Menu();
            $menu->menu_uz = $request->menu_uz;
            $menu->menu_ru = $request->menu_ru;
            $menu->menu_en = $request->menu_en;
            $menu->slug = SlugService::createSlug(Menu::class, 'slug', $request->menu_uz);
            $menu->description_uz = $request->description_uz;
            $menu->description_ru = $request->description_ru;
            $menu->description_en = $request->description_en;
            $menu->status = $request->get('status');
            $menu->position = $request->get('position');
            $menu->parent_id = $request->get('parent_id');
            if ($request->file('menu_photo')){
                $menu->menu_photo = $menu_photo;
            }
            $menu->save();

            $notification = array(
                'message' => 'Menu has been created successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('menus.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return view('admin.menus.browse', [
        	'menu' => $menu,
	        'is_active' => 'menus',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $menu)
    {
	    $menus = Menu::all();
	    return view('admin.menus.edit', [
		    'is_active' => 'menus',
		    'menus' => $menus,
		    'editMenu' => $menu,
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
	    $validator = \Validator::make($request->all(), [
		    'menu_uz' => 'required|string|max:255',
		    'menu_ru' => 'required|string|max:255',
		    'menu_en' => 'required|string|max:255',
		    'status' => 'required|string|max:255',
		    'position' => 'required',
		    'parent_id' => 'string|max:255',
		    'menu_photo' => 'image|mimes:jpeg,jpg,png|max:10240'
	    ]);
	
	    if ($validator->fails())
	    {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    if ($request->file('menu_photo')) {
			    $menu_photo = $request->file('menu_photo')->store('MenuPhotos' . '/' . date('FY'), 'public');
		    }
		    $menu->menu_uz = $request->menu_uz;
		    $menu->menu_ru = $request->menu_ru;
		    $menu->menu_en = $request->menu_en;
		    $menu->slug = SlugService::createSlug(Menu::class, 'slug', $request->menu_uz);
		    $menu->description_uz = $request->description_uz;
		    $menu->description_ru = $request->description_ru;
		    $menu->description_en = $request->description_en;
		    $menu->status = $request->get('status');
		    $menu->position = $request->get('position');
		    $menu->parent_id = $request->get('parent_id');
		    if ($request->file('menu_photo')){
			    $menu->menu_photo = $menu_photo;
		    }
		    $menu->save();
		
		    $notification = array(
			    'message' => 'Menu has been updated successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('menus.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Menu $menu)
    {
        $menu->status = 0;
        $menu->save();
        $notification = array(
            'message' => 'The menu was deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }

}
