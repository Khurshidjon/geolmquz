@extends('layouts.main')
@section('content')
    <script src="{{ asset('gallery/gallery_scripts/jquery.prettyPhoto.js') }}"></script>
    <link rel="stylesheet" href="{{ asset('gallery/gallery_scripts/prettyPhoto.css') }}">
    <script >
        $(function(){
            
            $("area[rel^='prettyPhoto']").prettyPhoto();
            
            $(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
            $(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
            
            $("#custom_content a[rel^='prettyPhoto']:first").prettyPhoto({
                custom_markup: '<div id="map_canvas" style="width:220px; height:245px"></div>',
                changepicturecallback: function(){ initialize(); }
            });
            
            $("#custom_content a[rel^='prettyPhoto']:last").prettyPhoto({
                custom_markup: '<div id="bsap_1259344" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div><div id="bsap_1237859" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6" style="height:260px"></div><div id="bsap_1251710" class="bsarocks bsap_d49a0984d0f377271ccbf01a33f2b6d6"></div>',
                changepicturecallback: function(){ _bsap.exec(); }
            });
        });
    </script>
    <style>
        h1 { font-family: Georgia; font-style: italic; margin-bottom: 10px; }
    
        h2 {
            font-family: Georgia;
            font-style: italic;
            margin: 25px 0 5px 0;
        }
    
        p { font-size: 1.2em; }
        
        .wide {
            border-bottom: 1px #000 solid;
            width: 4000px;
        }
    
        .fleft { float: left; margin: 0 20px 0 0; }
    
        .cboth { clear: both; }
    
        #main {
            background: #fff;
            margin: 0 auto;
            padding: 30px;
            width: 1000px;
        }

    </style>

    @php
		$lang = App::getLocale();
		$i = 1;
		$k = 1;
	@endphp
	<section class="ftco-section">
		<div class="container">
			{{--@if($techno || $object || $offer)--}}
				@if($submenu->status == 2)
					<div class="col-md-12 tab-wrap">
						<div class="tab-content bg-light p-4 p-md-5 ftco-animate" id="v-pills-tabContent">
								<div class="tab-pane py-2 fade {{ $k==1?'show active':'' }}" id="v-pills-{{$k}}" role="tabpanel" aria-labelledby="day-{{$k}}-tab">
									<div class="row departments">
										<div class="col-lg-4 order-lg-last d-flex align-items-stretch">
											<div class="img d-flex align-self-stretch" style="background-image: url('{{ asset('storage') .'/'. $submenu->menu_photo}}');"></div>
										</div>
										<div class="col-lg-8">
											<h2>
												@if($lang == 'uz')
													{{ $submenu->menu_uz }}
												@elseif($lang == 'ru')
													{{ $submenu->menu_ru }}
												@elseif($lang == 'en')
													{{ $submenu->menu_en }}
												@endif
											</h2>
											<p>
												@if($lang == 'uz')
													{{ $submenu->description_uz }}
												@elseif($lang == 'ru')
													{{ $submenu->description_ru }}
												@elseif($lang == 'en')
													{{ $submenu->description_en }}
												@endif
											</p>
											<div class="row mt-5 pt-2">
												@foreach($submenu->child as $subsubmenu)
													<a href="{{ route('page.content', ['menu' => $submenu, 'submenu' => $subsubmenu]) }}" class="col-lg-6">
														<div class="services-2 d-flex">
															<div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
																<img src="{{ asset('storage') .'/'. $subsubmenu->menu_photo}}" alt="" style="width: 100%">
															</div>
															<div class="text">
																<h3>
																	@if($lang == 'uz')
																		{{ $subsubmenu->menu_uz }}
																	@elseif($lang == 'ru')
																		{{ $subsubmenu->menu_ru }}
																	@elseif($lang == 'en')
																		{{ $subsubmenu->menu_en }}
																	@endif
																</h3>
																<p>
																	
																	@if($lang == 'uz')
																		{{ $subsubmenu->description_uz }}
																	@elseif($lang == 'ru')
																		{{ $subsubmenu->description_ru }}
																	@elseif($lang == 'en')
																		{{ $subsubmenu->description_en }}
																	@endif
																</p>
															</div>
														</div>
													</a>
												@endforeach
											</div>
										</div>
									</div>
								</div>
								@php
									$k++
								@endphp
							</div>
					</div>
				@elseif($submenu->status == 1)
					<div class="row justify-content-center mb-5 pb-2">
					<div class="col-md-8 text-center heading-section ftco-animate">
						<h2 class="mb-4">
							@if($lang == 'uz')
								{{ $submenu->menu_uz }}
							@elseif($lang == 'ru')
								{{ $submenu->menu_ru }}
							@elseif($lang == 'en')
								{{ $submenu->menu_en }}
							@endif
						</h2>
					</div>
				</div>
					<div class="ftco-departments">
					<div class="row">
						<div class="col-md-12 nav-link-wrap">
							<div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
								<h4>
									@if($techno)
										@if($lang == 'uz')
											{!! $techno->title_uz !!}
										@elseif($lang == 'ru')
											{!! $techno->title_ru !!}
										@elseif($lang == 'en')
											{!! $techno->title_en !!}
										@endif
									@elseif($object)
										@if($lang == 'uz')
											{!! $object->title_uz !!}
										@elseif($lang == 'ru')
											{!! $object->title_ru !!}
										@elseif($lang == 'en')
											{!! $object->title_en !!}
										@endif
									@elseif($offer)
										@if($lang == 'uz')
											{!! $offer->title_uz !!}
										@elseif($lang == 'ru')
											{!! $offer->title_ru !!}
										@elseif($lang == 'en')
											{!! $offer->title_en !!}
										@endif
									@endif
								</h4>
							</div>
						</div>
						<div class="col-md-12 tab-wrap">
							<div class="tab-content bg-light p-4 p-md-5 ftco-animate" id="v-pills-tabContent">
								@if($techno)
									@if($lang == 'uz')
										{!! $techno->techno_uz !!}
									@elseif($lang == 'ru')
										{!! $techno->techno_ru !!}
									@elseif($lang == 'en')
										{!! $techno->techno_en !!}
									@endif
								@elseif($object)
                                    
                                    <section class="ftco-section">
                                        <div class="container">
                                            <div class="text-center">
                                                <div class="container" style="max-width: 30em">
                                                    <img src="{{ asset('storage') .'/'. $object->object_photo}}" alt="" style="width: 100%">
                                                </div>
                                                <hr>
                                            </div>
                                            <div class="row justify-content-center mb-5 pb-2">
                                                <div class="col-md-12 heading-section ftco-animate">
                                                    <ul class="gallery clearfix row">
                                                        @foreach($object->gallery as $gallery)
                                                            <li class="col-md-4">
                                                                <a href="{{ asset('storage/ObjectGallery') . '/' . $gallery->photo_filename}}" rel="prettyPhoto[gallery2]" title="{{ $gallery->title_uz }}">
                                                                    <img src="{{ asset('storage/galleryThumbnail') . '/' .  $gallery->photo_filename}}" style="width: 100%; height: 100%" alt="{{ $gallery->title_uz }}" />
                                                                </a>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </section>
        
								@elseif($offer)
									@if($lang == 'uz')
										{!! $offer->body_uz !!}
									@elseif($lang == 'ru')
										{!! $offer->body_ru !!}
									@elseif($lang == 'en')
										{!! $offer->body_en !!}
									@endif
								@elseif($certificate)
									<div style="width: 100%; max-width: 10em !important;">
										@if($lang == 'uz')
											{!! $certificate->body_uz !!}
										@elseif($lang == 'ru')
											{!! $certificate->body_ru !!}
										@elseif($lang == 'en')
											{!! $certificate->body_en !!}
										@endif
									</div>
								@endif

							</div>
						</div>
					</div>
				</div>
				@endif
		</div>
	</section>


@endsection
