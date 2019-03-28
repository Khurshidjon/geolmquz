<?php

namespace App\Http\Controllers;

use App\Social;
use Illuminate\Http\Request;

class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $social_networks = Social::where('status', '!=', 2)->get();
        return view('admin.contents.social_network.social_network', [
            'social_networks' => $social_networks,
            'is_active' => 'social_network',
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.contents.social_network.add', [
            'is_active' => 'social_network',
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
            'icon' => 'required',
            'status' => 'required',
            'url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ]);
        if ($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{
            
            $social = new Social();
            $social->icon = $request->get('icon');
            $social->status = $request->get('status');
            $social->url = $request->url;
            $social->save();
            
            $notification = array(
                'message' => 'Social network has been created successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('social_networks.index')->with($notification);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function show(Social $social_network)
    {
        return view('admin.contents.social_network.browse', [
            'is_active' => 'social_network',
            'social_network' => $social_network
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function edit(Social $social_network)
    {
        return view('admin.contents.social_network.edit', [
            'is_active' => 'social_network',
            'social_network' => $social_network
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Social $social_network)
    {
        $validator = \Validator::make($request->all(), [
            'icon' => 'required',
            'status' => 'required',
            'url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ]);
        if ($validator->fails()){
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }else{
    
    
            $social_network->icon = $request->get('icon');
            $social_network->status = $request->get('status');
            $social_network->url = $request->url;
            $social_network->save();
        
            $notification = array(
                'message' => 'Social network has been updated successfully',
                'alert-type' => 'success'
            );
            return redirect()->route('social_networks.index')->with($notification);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Social  $social
     * @return \Illuminate\Http\Response
     */
    public function destroy(Social $social_network)
    {
        $social_network->status = 2;
        $social_network->save();
        $notification = array(
            'message' => 'Social network has been deleted successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('social_networks.index')->with($notification);
    }
}
