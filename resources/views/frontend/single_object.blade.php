@extends('layouts.main')
@section('content')
	<script src="{{ asset('gallery/gallery_scripts/jquery.prettyPhoto.js') }}"></script>
	<link rel="stylesheet" href="{{ asset('gallery/gallery_scripts/prettyPhoto.css') }}">
	<script >
        $(function(){
           /* $('#gallery').gallerie();
            $('.small-text').parent().next().next().find('.gallerie-title').text()*/
    
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
        
        ul li { display: inline; }
        
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
	
	<section class="ftco-section">
		<div class="container">
			<div class="text-center">
				<h3>{{ $object->title_uz }}</h3>
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

@endsection
