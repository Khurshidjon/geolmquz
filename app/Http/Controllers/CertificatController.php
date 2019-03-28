<?php

namespace App\Http\Controllers;

use App\Certificat;
use App\Menu;
use Cocur\Slugify\Bridge\ZF2\SlugifyService;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CertificatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $certificats = Certificat::orderBy('created_at', 'DESC')->where('status', '!=', 2)->get();
	    return view('admin.contents.certificats.certificats', [
		    'certificats' => $certificats,
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
	    return view('admin.contents.certificats.add', [
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
	    ]);
	
	    if ($validator->fails()) {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    $certificat = new Certificat();
		    $certificat->menu_id = $request->get('menu_id');
		    $certificat->status = $request->get('status');
		    $certificat->slug = SlugService::createSlug(Certificat::class, 'slug', $request->title_uz);
		    $certificat->title_uz = $request->title_uz;
		    $certificat->title_ru = $request->title_ru;
		    $certificat->title_en = $request->title_en;
		    $certificat->body_uz = $request->body_uz;
		    $certificat->body_ru = $request->body_ru;
		    $certificat->body_en = $request->body_en;
		    $certificat->save();
		
		    $notification = array(
			    'message' => 'Certificat has been created successfully',
			    'alert-type' => 'success'
		    );
		
		    return redirect()->route('certificats.index')->with($notification);
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function show(Certificat $certificat)
    {
        return view('admin.contents.certificats.browse', [
        	'certificat' => $certificat,
	        'is_active' => 'menus'
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function edit(Certificat $certificat)
    {
	    $menus = Menu::all();
	    
	    return view('admin.contents.certificats.edit', [
		    'menus' => $menus,
		    'is_active' => 'menus',
		    'certificat' => $certificat,
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Certificat $certificat)
    {
	    $validator = \Validator::make($request->all(), [
		    'title_uz' => 'string|max:255',
		    'title_ru' => 'string|max:255',
		    'title_en' => 'string|max:255',
	    ]);
	
	    if ($validator->fails()) {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    $certificat->menu_id = $request->get('menu_id');
		    $certificat->status = $request->get('status');
		    $certificat->slug = SlugService::createSlug(Certificat::class, 'slug', $request->title_uz);
		    $certificat->title_uz = $request->title_uz;
		    $certificat->title_ru = $request->title_ru;
		    $certificat->title_en = $request->title_en;
		    $certificat->body_uz = $request->body_uz;
		    $certificat->body_ru = $request->body_ru;
		    $certificat->body_en = $request->body_en;
		    $certificat->save();
		
		    $notification = array(
			    'message' => 'Certificat has been updated successfully',
			    'alert-type' => 'success'
		    );
		
		    return redirect()->route('certificats.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Certificat  $certificat
     * @return \Illuminate\Http\Response
     */
    public function destroy(Certificat $certificat)
    {
    	$certificat->status = 2;
    	$certificat->save();
	    $notification = array(
		    'message' => 'Certificat has been deleted successfully',
		    'alert-type' => 'success'
	    );
	
	    return redirect()->route('certificats.index')->with($notification);
    }
}
