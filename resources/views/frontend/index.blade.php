@extends('layouts.main')
@section('content')
    @php
        $lang = \App::getLocale();
        $d = 1;
    @endphp
    <style>
        .prev, .next{
            cursor: pointer;
            border-radius: 50%;
            /*background-color: #ddd;*/
            border: none;
            text-align: center;
            font-size: 55px;
            transition: color 0.3s;
            margin: 0 auto;
            color: #9e9e9e;
        }
        
        .prev:hover, .next:hover{
            color: #ff8000;
        }
        .owl-next{
            font-size: 50px !important;
        }
        .owl-prev{
            font-size: 50px !important;
        }
        .owl-prev:focus{
            outline: none;
        }
        .owl-next:focus{
            outline: none;
        }
        .username:focus-within, .email:focus-within{
            border: 1px solid #fd7e14 !important;
            border-left: none !important;
        }
        .username, .email{
            border-bottom-right-radius: 5px !important;
            border-top-right-radius: 5px !important;
            border-left: none !important;
        }
        .input-group-text{
            border: 1px solid rgba(0, 0, 0, 0.1);
            background-color: white;
            border-right: none !important;
        }
        .comment-area{
            resize: none;
            margin-top: 2em;
        }
    </style>
<section class="home-slider owl-carousel">

    @foreach($sliders as $slider)
        <div class="slider-item" style="background-image:url('{{ asset('storage') .'/'. $slider->slider_photo }}');" data-stellar-background-ratio="0.{{ $d+2 }}">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-center justify-content-start" data-scrollax-parent="true">
                    <div class="col-md-6 text ftco-animate">
                        <h1 class="mb-4">
                            @if($lang == 'uz')
                                {!! $slider->title_uz !!}
                            @elseif($lang == 'ru')
                                {!! $slider->title_ru !!}
                            @elseif($lang == 'en')
                                {!! $slider->title_en !!}
                            @endif
                        </h1>
                        <h3 class="subheading">
                            @if($lang == 'uz')
                                {!! $slider->body_uz !!}
                            @elseif($lang == 'ru')
                                {!! $slider->body_ru !!}
                            @elseif($lang == 'en')
                                {!! $slider->body_en !!}
                            @endif
                        </h3>
                        <p><a href="#" class="btn btn-secondary px-4 py-3 mt-3">View our works</a></p>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</section>

<section class="ftco-services ftco-no-pb">
    <div class="container">
        <div class="no-gutters owl-carousel owl-carousel-header">
            @foreach($technologies as $technology)
                <div class="d-flex services align-self-stretch p-4 ftco-animate">
                    <div class="media block-6 d-block text-center">
                        <div class="icon d-flex justify-content-center align-items-center"
                             style="
                                background-image: url('{{ asset('storage') .'/'. $technology->menu_photo }}');
                                background-size: 100% 100%">
                        </div>
                        <div class="media-body p-2 mt-3" style="max-height: 9em">
                            <h3 class="heading">
                                @if($lang == 'uz')
                                    {{ $technology->menu_uz }}
                                @elseif($lang == 'ru')
                                    {{ $technology->menu_ru }}
                                @elseif($lang == 'en')
                                    {{ $technology->menu_en }}
                                @endif
                            </h3>
                            <p>
                                @if($lang == 'uz')
                                    {{ $technology->description_uz }}
                                @elseif($lang == 'ru')
                                    {{ $technology->description_ru }}
                                @elseif($lang == 'en')
                                    {{ $technology->description_en }}
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
<section class="ftco-section ftco-no-pt">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">
                    <br>
                </span>
                <h2 class="mb-4">
                    @if($lang == 'uz')
                        {{ $offers->menu_uz }}
                    @elseif($lang == 'ru')
                        {{ $offers->menu_ru }}
                    @elseif($lang == 'en')
                        {{ $offers->menu_en }}
                    @endif
                </h2>
                <p>
                    @if($lang == 'uz')
                        {{ $offers->description_uz }}
                    @elseif($lang == 'ru')
                        {{ $offers->description_ru }}
                    @elseif($lang == 'en')
                        {{ $offers->description_en }}
                    @endif
                </p>
            </div>
        </div>
        <div class="owl-carousel owl-carousel-section">
            @foreach($offers->child as $offer)
                <div class="ftco-animate">
                <div class="staff">
                    <div class="img-wrap d-flex align-items-stretch">
                        <div class="img align-self-stretch" style="background-image: url('{{ asset('storage') .'/'. $offer->menu_photo }}');"></div>
                    </div>
                    <div class="text pt-3 text-center">
                        <span class="position mb-2">
                            @if($lang == 'uz')
                                {{ $offer->menu_uz }}
                            @elseif($lang == 'ru')
                                {{ $offer->menu_ru }}
                            @elseif($lang == 'en')
                                {{ $offer->menu_en }}
                            @endif
                        </span>
                        <div class="faded">
                            <p>
                                @if($lang == 'uz')
                                    {{ $offer->description_uz }}
                                @elseif($lang == 'ru')
                                    {{ $offer->description_ru }}
                                @elseif($lang == 'en')
                                    {{ $offer->description_en }}
                                @endif
                            </p>
                            <ul class="ftco-social text-center">
                                <li class="ftco-animate"><a href="https://twitter.com/intent/tweet?text=my share text&amp;url={{ route('page.show', ['offer' => $offer])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><span class="icon-twitter"></span></a></li>
                                <li class="ftco-animate"><a href="https://www.facebook.com/sharer/sharer.php?u={{route('page.show', ['offer' => $offer])}}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><span class="icon-facebook"></span></a></li>
                                <li class="ftco-animate"><a href="https://telegram.me/share/url?url={{ route('page.show', ['offer' => $offer]) }}" onclick="window.open(this.href, 'mywin',
'left=20,top=20,width=500,height=500,toolbar=1,resizable=0'); return false;"><span class="icon-telegram"></span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <span class="prev">
            <i class="fas fa-chevron-circle-left"></i>
        </span>
        <span class="next">
            <i class="fas fa-chevron-circle-right"></i>
        </span>
    </div>
</section>

<section class="ftco-intro" style="background-image: url('{{ asset('frontend/images/bg_3.jpg') }}');" data-stellar-background-ratio="0.5">
    <div class="overlay"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h2>We Provide Free Health Care Consultation</h2>
                <p class="mb-0">Your Health is Our Top Priority with Comprehensive, Affordable medical.</p>
                <p></p>
            </div>
            <div class="col-md-3 d-flex align-items-center">
                <p class="mb-0"><a href="#" class="btn btn-secondary px-4 py-3">Free Consutation</a></p>
            </div>
        </div>
    </div>
</section>
<section class="ftco-section bg-light">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    <span class="subheading">Blog</span>
                    <h2 class="mb-4">
                        Objects
                    </h2>
                    <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
                </div>
            </div>
            <div class="row">
                @foreach($objects as $object)
                    <div class="col-md-4 ftco-animate">
                        <div class="blog-entry">
                            <a href="{{ route('single.object', ['object' => $object]) }}" class="block-20" style="background-image: url('{{ asset('storage') .'/'. $object->object_photo}}');">
                                <div class="meta-date text-center p-2">
                                    <span class="day">{{ $object->created_at->format('d') }}</span>
                                    <span class="mos">{{ $object->created_at->format('F') }}</span>
                                    <span class="yr">{{ $object->created_at->format('Y') }}</span>
                                </div>
                            </a>
                            <div class="text bg-white p-4">
                                <h3 class="heading">
                                    <a href="#">
                                        @if($lang == 'uz')
                                            {{ $object->title_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $object->title_ru }}
                                        @elseif($lang == 'en')
                                            {{ $object->title_en }}
                                        @endif
                                    </a>
                                </h3>
                                <div class="d-flex align-items-center mt-4">
                                    <p class="mb-0"><a href="#" class="btn btn-primary">Read More <span class="ion-ios-arrow-round-forward"></span></a></p>
                                    <p class="ml-auto mb-0">
                                        <a href="#" class="mr-2">{{ $object->menus->menu_en }}</a>
                                        {{--<a href="#" class="meta-chat"><span class="icon-chat"></span> 3</a>--}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
               @endforeach
            </div>
        </div>
    </section>

<section class="ftco-section testimony-section bg-light">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">@lang('pages.testimonials')</span>
                <h2 class="mb-4">@lang('pages.testimonials_title')</h2>
                <p>
                    @lang('pages.testimonials_content')
                </p>
            </div>
        </div>
        <div class="row ftco-animate justify-content-center">
            <div class="col-md-8">
                <div class="carousel-testimony owl-carousel">
                    @foreach($comments as $comment)
                        <div class="item">
                        <div class="testimony-wrap d-flex">
                            <div class="user-img mr-4" style="background-image: url('{{ asset('storage/user/avatar.png') }}')"></div>
                            <div class="text ml-2 bg-light">
                            <span class="quote d-flex align-items-center justify-content-center">
                              <i class="icon-quote-left"></i>
                            </span>

                                <p>
                                    {{ $comment->comment }}
                                </p>
                                <p class="name">{{ $comment->username }}</p>
                                <span class="position">{{ \Carbon\Carbon::createFromTimeStamp(strtotime($comment->created_at))->diffForHumans() }}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<section class="ftco-section bg-light comment-container">
    <div class="container">
        <div class="row justify-content-center mb-5 pb-2">
            <div class="col-md-8 text-center heading-section ftco-animate">
                <span class="subheading">Pricing</span>
                <h2 class="mb-4">Our Pricing</h2>
                <p>Separated they live in. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country</p>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <form action="{{ route('comment.store') }}" class="pricing-entry pb-5 text-center comment-form">
                    <div>
                        <h3 class="mb-4 price">Comment</h3>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="icon icon-user-circle-o input-group-text" style="font-size: 20px"></span>
                                    </div>
                                    <input type="text" class="form-control input-form username" name="username" placeholder="Username" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" style="font-size: 20px">@</span>
                                    </div>
                                    <input type="email" class="form-control input-form email" name="email" placeholder="E-mail" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <textarea name="comment" id="" cols="30" rows="10" class="comment-area form-control" placeholder="Message" autocomplete="off"></textarea>
                    </div>
                    <p class="button sm text-center"><button type="submit" class="btn btn-primary px-4 py-3 send_comment">@lang('pages.comment_button')</button></p>
                </form>
            </div>
        </div>
    </div>
</section>
@endsection

