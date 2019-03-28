<?php

namespace App\Http\Controllers;

use App\Menu;
use App\Subscriber;
use App\WhatWeOffer;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class WhatWeOfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $what_we_offers = WhatWeOffer::with('menu')->orderBy('created_at', 'DESC')->where('status', '!=', 2)->get();
        return view('admin.contents.what_we_offers.what_we_offers', [
            'is_active' => 'menu',
            'what_we_offers' => $what_we_offers,
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
        return view('admin.contents.what_we_offers.add', [
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
            $what_we_offer = new WhatWeOffer();
	        $what_we_offer->menu_id = $request->get('menu_id');
	        $what_we_offer->title_uz = $request->title_uz;
	        $what_we_offer->title_ru = $request->title_ru;
	        $what_we_offer->title_en = $request->title_en;
	        $what_we_offer->slug = SlugService::createSlug(WhatWeOffer::class, 'slug', $request->title_uz);
	        $what_we_offer->body_uz = $request->body_uz;
	        $what_we_offer->body_ru = $request->body_ru;
	        $what_we_offer->body_en = $request->body_en;
	        $what_we_offer->status = $request->get('status');
	        $what_we_offer->save();
	        
            $notification = array(
                'message' => 'Technology has been created successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('what_we_offers.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WhatWeOffer  $whatWeOffer
     * @return \Illuminate\Http\Response
     */
    public function show(WhatWeOffer $what_we_offer)
    {
        return view('admin.contents.what_we_offers.browse', [
        	'is_active' => 'menus',
	        'what_we_offer' => $what_we_offer,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WhatWeOffer  $whatWeOffer
     * @return \Illuminate\Http\Response
     */
    public function edit(WhatWeOffer $what_we_offer)
    {
	    $menus = Menu::all();
	    return view('admin.contents.what_we_offers.edit', [
		    'menus' => $menus,
		    'is_active' => 'menus',
		    'what_we_offer' => $what_we_offer,
	    ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WhatWeOffer  $whatWeOffer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WhatWeOffer $what_we_offer)
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
		    
		    $what_we_offer->menu_id = $request->get('menu_id');
		    $what_we_offer->title_uz = $request->title_uz;
		    $what_we_offer->title_ru = $request->title_ru;
		    $what_we_offer->title_en = $request->title_en;
		    $what_we_offer->slug = SlugService::createSlug(WhatWeOffer::class, 'slug', $request->title_uz);
		    $what_we_offer->body_uz = $request->body_uz;
		    $what_we_offer->body_ru = $request->body_ru;
		    $what_we_offer->body_en = $request->body_en;
		    $what_we_offer->status = $request->get('status');
		    $what_we_offer->save();
		
		    $notification = array(
	            'message' => 'Offer has been updated successfully',
			    'alert-type' => 'success'
		    );
		    return redirect()->route('what_we_offers.index')->with($notification);
	    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WhatWeOffer  $whatWesOffer
     * @return \Illuminate\Http\Response
     */
    public function destroy(WhatWeOffer $what_we_offer)
    {
	    $what_we_offer->status = 2;
	    $what_we_offer->save();
	    $notification = array(
		    'message' => 'Offer has been deleted successfully',
		    'alert-type' => 'success'
	    );
	    return redirect()->route('what_we_offers.index')->with($notification);
    }
}
