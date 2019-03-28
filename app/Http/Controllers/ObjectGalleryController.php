<?php

namespace App\Http\Controllers;

use App\Menu;
use App\ObjectGallery;
use App\XObject;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ObjectGalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
	    $object_galleries = ObjectGallery::orderBy('created_at', 'DESC')->where('status', '!=', 2)->get();
	    return view('admin.contents.object_galleries.object_galleries', [
		    'object_galleries' => $object_galleries,
		    'is_active' => 'objects'
	    ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	    $objects = XObject::all();
	    return view('admin.contents.object_galleries.add', [
		    'objects' => $objects,
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
		    'title_uz' => 'required|string|max:255',
		    'title_ru' => 'required|string|max:255',
		    'title_en' => 'required|string|max:255',
		    'status' => 'required|string|max:255',
		    'object_id' => 'string|max:255',
		    'photo_filename' => 'required|image|mimes:jpeg,jpg,png|max:10240'
	    ]);
	
	    if ($validator->fails())
	    {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    /*if ($request->file('photo_filename')) {
			    $photo_filename = $request->file('photo_filename')->store('ObjectGalleryPhotos' . '/' . date('FY'), 'public');
			    
		    }*/
		    $object_gallery = new ObjectGallery();
		    $object_gallery->title_uz = $request->title_uz;
		    $object_gallery->title_ru = $request->title_ru;
		    $object_gallery->title_en = $request->title_en;
		    $object_gallery->slug = SlugService::createSlug(Menu::class, 'slug', $request->title_uz);
		    $object_gallery->status = $request->get('status');
		    $object_gallery->object_id = $request->get('object_id');
		    if ($request->file('photo_filename')){
			    $originalImage= $request->file('photo_filename');
			    $thumbnailImage = Image::make($originalImage);
			    
			    Storage::disk('local')->makeDirectory('public/ObjectGallery');
			    Storage::disk('local')->makeDirectory('public/galleryThumbnail');
			    
			    $thumbnailPath = storage_path().'/app/public/galleryThumbnail/';
			    
			    $originalPath = storage_path().'/app/public/ObjectGallery/';
			    
			    $thumbnailImage->save($originalPath.time().$originalImage->getClientOriginalName());
			    
//			    $thumbnailImage->resize(150,150);
                
                $thumbnailImage->resize(null, 500, function ($constraint) {
                    $constraint->aspectRatio();
                });
			    
			    $thumbnailImage->save($thumbnailPath.time().$originalImage->getClientOriginalName());
			    
			    $object_gallery->photo_filename = time().$originalImage->getClientOriginalName();
		    }
		    $object_gallery->save();
		
		    $notification = array(
			    'message' => 'Object photo for gallery has been created successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('object_galleries.index')->with($notification);
	    }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ObjectGallery  $objectGallery
     * @return \Illuminate\Http\Response
     */
    public function show(ObjectGallery $object_gallery)
    {
        return view('admin.contents.object_galleries.browse', [
        	'object_gallery' => $object_gallery,
	        'is_active' => $object_gallery,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ObjectGallery  $objectGallery
     * @return \Illuminate\Http\Response
     */
    public function edit(ObjectGallery $object_gallery)
    {
	    $objects = XObject::all();
	    return view('admin.contents.object_galleries.edit', [
		    'objects' => $objects,
		    'is_active' => 'menus',
		    'object_gallery' => $object_gallery,
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ObjectGallery  $objectGallery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ObjectGallery $object_gallery)
    {
	    $validator = \Validator::make($request->all(), [
		    'title_uz' => 'required|string|max:255',
		    'title_ru' => 'required|string|max:255',
		    'title_en' => 'required|string|max:255',
		    'status' => 'required|string|max:255',
		    'object_id' => 'string|max:255',
		    'photo_filename' => 'image|mimes:jpeg,jpg,png|max:10240'
	    ]);
	
	    if ($validator->fails())
	    {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    if ($request->file('photo_filename')) {
			    $photo_filename = $request->file('photo_filename')->store('ObjectGalleryPhotos' . '/' . date('FY'), 'public');
		    }
		    $object_gallery->title_uz = $request->title_uz;
		    $object_gallery->title_ru = $request->title_ru;
		    $object_gallery->title_en = $request->title_en;
		    $object_gallery->slug = SlugService::createSlug(Menu::class, 'slug', $request->title_uz);
		    $object_gallery->status = $request->get('status');
		    $object_gallery->object_id = $request->get('object_id');
		    if ($request->file('photo_filename')){
			    $object_gallery->photo_filename = $photo_filename;
		    }
		    $object_gallery->save();
		
		    $notification = array(
			    'message' => 'Object photo for gallery has been updated successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('object_galleries.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ObjectGallery  $objectGallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(ObjectGallery $object_gallery)
    {
	    $object_gallery->status = 2;
	    $object_gallery->save();
	    $notification = array(
		    'message' => 'Object photo for gallery has been deleted successfully',
		    'alert-type' => 'success'
	    );
	    return redirect()->route('object_galleries.index')->with($notification);
    }
}
