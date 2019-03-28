<?php

namespace App\Http\Controllers;

use App\Address;
use App\Certificat;
use App\Comment;
use App\Menu;
use App\Slider;
use App\Technology;
use App\WhatWeOffer;
use App\XObject;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $q = $request->search;
        $offers = Menu::where('id', 2)->first();
        $objects = XObject::all();
        $technologies = Menu::where('parent_id', '1')->get();
        $sliders = Slider::where('status', 1)->get();
        $comments = Comment::where('status', 1)->get();
        return view('frontend.index', [
            'offers' => $offers,
            'objects' => $objects,
	        'technologies' => $technologies,
	        'sliders' => $sliders,
	        'comments' => $comments,
            'q' => $q,
        ]);
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function contacts(Request $request)
    {
        $q = $request->search;
        $contact = Address::where('status', 1)->first();
        return view('frontend.contacts', [
            'contact' => $contact,
            'q' => $q,
        ]);
    }
    public function showPage(Request $request, Menu $menu)
    {
        $q = $request->search;
        return view('frontend.show', [
            'menu' => $menu,
            'q' => $q,
        ]);
    }
    
	public function showContent(Request $request, Menu $menu, Menu $submenu)
	{
	    $q = $request->search;
		$techno = Technology::where('menu_id', $submenu->id)->first();
		$object = XObject::where('menu_id', $submenu->id)->first();
		$offer = WhatWeOffer::where('menu_id', $submenu->id)->first();
		$certificate = Certificat::where('menu_id', $submenu->id)->first();
		return view('frontend.content', [
			'menu' => $menu,
			'submenu' => $submenu,
			'techno' => $techno,
			'offer' => $offer,
			'object' => $object,
			'certificate' => $certificate,
            'q' => $q,
		]);
	}
	
	public function singleObject(Request $request, XObject $object)
	{
	    $q = $request->search;
		return view('frontend.single_object', [
			'object' => $object,
            'q' => $q,
		]);
	}
	
	public function search(Request $request)
    {
        $q = $request->search;
        if (empty($q)){
            return redirect()->back();
        }
        $technologies = Technology::where('title_uz', 'LIKE', '%' . $q . '%')
                                    ->orWhere('title_ru', 'LIKE', '%' . $q . '%')
                                    ->orWhere('title_en', 'LIKE', '%' . $q . '%')
                                    ->orWhere('techno_uz', 'LIKE', '%' . $q . '%')
                                    ->orWhere('techno_ru', 'LIKE', '%' . $q . '%')
                                    ->orWhere('techno_en', 'LIKE', '%' . $q . '%')
                                    ->get();
    
        $offers = WhatWeOffer::where('title_uz', 'LIKE', '%' . $q . '%')
            ->orWhere('title_ru', 'LIKE', '%' . $q . '%')
            ->orWhere('title_en', 'LIKE', '%' . $q . '%')
            ->orWhere('body_uz', 'LIKE', '%' . $q . '%')
            ->orWhere('body_ru', 'LIKE', '%' . $q . '%')
            ->orWhere('body_en', 'LIKE', '%' . $q . '%')
            ->get();
    
    
        $objects = XObject::where('title_uz', 'LIKE', '%' . $q . '%')
            ->orWhere('title_ru', 'LIKE', '%' . $q . '%')
            ->orWhere('title_en', 'LIKE', '%' . $q . '%')
            ->get();
        
        return view('frontend.search', [
            'q' => $q,
            'technologies' => $technologies,
            'offers' => $offers,
            'objects' => $objects,
        ]);
    }
}
