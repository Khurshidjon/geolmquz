@extends('layouts.admin')
<link rel="stylesheet" href="{{ asset('frontend/css/icomoon.css') }}">
<style>
    .container {
        position: relative;
        width: 50%;
    }
    
    .image {
        opacity: 1;
        display: block;
        width: 100%;
        height: auto;
        transition: .5s ease;
        backface-visibility: hidden;
    }
    
    .middle {
        transition: .5s ease;
        opacity: 0;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        text-align: center;
    }
    
    .container:hover .image {
        opacity: 0.3;
    }
    
    .container:hover .middle {
        opacity: 1;
    }
    
    .text {
        background-color: rgba(0, 0, 0, 0.3);
        color: white;
        font-size: 16px;
        padding: 16px 32px;
    }
</style>
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <a href="{{ route('social_networks.edit', ['social_network' => $social_network]) }}">
                <button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit Social Netwrok</button>
            </a>
            <br>
            <br>
            <h4>Icon:
                <span style="color: grey; font-size: 30px">
						<i class="{{ $social_network->icon }}"></i>
				</span>
            </h4>
            <hr>
            <h4>Social Network url:
                <span style="color: grey">
                    {{ $social_network->url }}
				</span>
            </h4>
            <hr>
            <div>
                <p>status:
                    @if($social_network->status == 0)
                        <span class="badge badge-danger">Deactive</span>
                    @elseif($social_network->status == 1)
                        <span class="badge badge-success">Active</span>
                    @endif
                </p>
            </div>
            <hr>
        </div>
    </div>

@endsection
