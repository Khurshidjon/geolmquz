@extends('layouts.main')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp

    <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('frontend/images/bg_1.jpg') }}');" data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <h1 class="mb-2 bread">@lang('pages.contact_us')</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="{{ route('index') }}">@lang('pages.home') <i class="ion-ios-arrow-forward"></i></a></span> <span>@lang('pages.contact_us') </span></p>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pt ftco-no-pb contact-section">
        <div class="container">
            <div class="row d-flex align-items-stretch no-gutters">
                <div class="col-md-6 p-4 p-md-5 bg-light">
                    <iframe src="https://yandex.uz/map-widget/v1/-/CCU8NENX" width="560" height="400" frameborder="0" allowfullscreen="true"></iframe>
                </div>
                <div class="col-md-6 p-4 p-md-5 bg-light">
                    <form action="{{ route('comment.store') }}" class="comment-form">
                        <div class="form-group">
                            <input type="text" class="form-control username" placeholder="Your Name" name="username">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control email" placeholder="Your Email" name="email">
                        </div>
                        <div class="form-group">
                            <textarea id="" cols="30" rows="7" class="form-control comment-area" placeholder="Message" name="comment"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5 send_comment">@lang('pages.comment_button')</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-6 d-flex align-items-stretch">
                    <div id="map"></div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section contact-section">
        <div class="container">
            <div class="row d-flex mb-5 contact-info">
                <div class="col-md-12 mb-4">
                    <h2 class="h4">@lang('pages.contact_information')</h2>
                </div>
                <div class="w-100"></div>
                <div class="col-md-4 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('pages.top_address')</span>
                            @if($contact)
                                @if($lang == 'uz')
                                    {{ $contact->address_ru }}
                                @elseif($lang == 'ru')
                                    {{ $contact->address_uz }}
                                @elseif($lang == 'en')
                                    {{ $contact->address_uz }}
                                @endif
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('pages.top_phone')</span>
                            @if($contact)
                                <a href="tel:{{ $contact->phone }}">{{ $contact->phone }}</a>
                            @endif
                        </p>
                    </div>
                </div>
                <div class="col-md-4 d-flex">
                    <div class="bg-light d-flex align-self-stretch box p-4">
                        <p><span>@lang('pages.top_email')</span>
                            @if($contact)
                                <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
                            @endif
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
