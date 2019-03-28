<?php

namespace App\Http\Controllers;

use App\Mail\Subscribers;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
        $validate = \Validator::make($request->all(), [
            'subscribers' => 'required|string|email|max:255',
        ]);
        if ($validate->fails()){
            $notification  = array(
                'message' => 'Failed to enter data, email is required',
                'alert_type' => 'danger'
            );
            return response($notification);
        
        }else{
            $exist = Subscriber::where('subscribers', $request->subscribers)->first();
            if (isset($exist)){
                $notification  = array(
                    'message' => 'The email has already been taken.',
                    'alert_type' => 'warning'
                );
                
                return response($notification);
                
            }else{
                $subscriber = new Subscriber();
                $subscriber->subscribers = $request->subscribers;
                $subscriber->save();
                \Mail::to($subscriber->subscribers)->send(new Subscribers());
                $notification = array(
                    'message' => 'Thank you for subscribe',
                    'alert_type' => 'success'
                );
                return response($notification);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function edit(Subscriber $subscriber)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subscriber $subscriber)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        //
    }
}
