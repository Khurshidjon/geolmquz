<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use App\Menu;
use App\Subscriber;
use App\XObject;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class XObjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $objects = XObject::with('menus')->orderBy('created_at', 'DESC')->where('status', '!=', 2)->get();
        return view('admin.contents.objects.objects', [
            'is_active' => 'menus',
            'objects' => $objects
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
        return view('admin.contents.objects.add', [
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
            'object_photo' => 'required|image|mimes:jpeg,jpg,png|max:10240'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            if ($request->file('object_photo')) {
                $object_photo = $request->file('object_photo')->store('ObjectPhotos' . '/' . date('FY'), 'public');
            }
            $object = new XObject();
            $object->menu_id = $request->get('menu_id');
            $object->title_uz = $request->title_uz;
            $object->title_ru = $request->title_ru;
            $object->title_en = $request->title_en;
            $object->slug = SlugService::createSlug(XObject::class, 'slug', $request->title_uz);
            $object->status = $request->get('status');
            if ($request->file('object_photo')){
                $object->object_photo = $object_photo;
            }
            $object->save();
    
            $users = Subscriber::all();
            
            foreach ($users as $user){
                $details['email'] = $user->subscribers;
                $details['object'] = $object;
                dispatch(new SendEmailJob($details));
            }
            
            $notification = array(
                'message' => 'Object has been created successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('objects.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\XObject  $xObject
     * @return \Illuminate\Http\Response
     */
    public function show(XObject $object)
    {
        return view('admin.contents.objects.browse', [
        	'is_active' => 'menus',
	        'object' => $object
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\XObject  $xObject
     * @return \Illuminate\Http\Response
     */
    public function edit(XObject $object)
    {
	    $menus = Menu::all();
	    return view('admin.contents.objects.edit', [
		    'menus' => $menus,
		    'is_active' => 'menus',
		    'object' => $object,
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\XObject  $xObject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, XObject $object)
    {
	    $validator = \Validator::make($request->all(), [
		    'title_uz' => 'string|max:255',
		    'title_ru' => 'string|max:255',
		    'title_en' => 'string|max:255',
		    'object_photo' => 'image|mimes:jpeg,jpg,png|max:10240'
	    ]);
	
	    if ($validator->fails()) {
		    return redirect()->back()
			    ->withErrors($validator)
			    ->withInput();
	    }else{
		    if ($request->file('object_photo')) {
			    $object_photo = $request->file('object_photo')->store('ObjectPhotos' . '/' . date('FY'), 'public');
		    }
		    $object->menu_id = $request->get('menu_id');
		    $object->title_uz = $request->title_uz;
		    $object->title_ru = $request->title_ru;
		    $object->title_en = $request->title_en;
		    $object->slug = SlugService::createSlug(XObject::class, 'slug', $request->title_uz);
		    $object->body_uz = $request->body_uz;
		    $object->body_ru = $request->body_ru;
		    $object->body_en = $request->body_en;
		    $object->status = $request->get('status');
		    
		    if ($request->file('object_photo')){
			    $object->object_photo = $object_photo;
		    }
		    $object->save();
		
		    $notification = array(
			    'message' => 'Object has been created successfully',
			    'alert-type' => 'success'
		    );
		
		    return redirect()->route('objects.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\XObject  $xObject
     * @return \Illuminate\Http\Response
     */
    public function destroy(XObject $object)
    {
        $object->status = 2;
        $object->save();
	    $notification = array(
		    'message' => 'Object has been deleted successfully',
		    'alert-type' => 'success'
	    );
	
	    return redirect()->route('objects.index')->with($notification);
    }
}
