@extends('layouts.admin')
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
			<a href="{{ route('objects.edit', ['object' => $object]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit Object</button>
			</a>
			<br>
			<br>
			<h4>Object name:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $object->title_uz }}
					@elseif($lang == 'en')
						{{ $object->title_en }}
					@elseif($lang == 'ru')
						{{ $object->title_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($object->menu_id)
						@if($lang == 'uz')
							{{ $object->parent->menu_uz }}
						@elseif($lang == 'en')
							{{ $object->parent->menu_en }}
						@elseif($lang == 'ru')
							{{ $object->parent->menu_ru }}
						@endif
					@endif
				</span>
			</h4>
			<hr>
			<div style="max-width: 25em">
				<p>Object photo:</p>
				<img src="{{ asset('storage') .'/'. $object->object_photo}}" alt="">
			</div>
			<hr>
			<p style="color: black">Gallery</p>
			<div class="row">
				@foreach($object->gallery as $gallery)
					<div class="xol-md-4 col-lg-4 col-4 border">
                        <p class="text-center mt-0">
                            @if($lang == 'uz')
                                {!! $gallery->title_uz  !!}
                            @elseif($lang == 'en')
                                {!! $gallery->title_en !!}
                            @elseif($lang == 'ru')
                                {!! $gallery->title_ru !!}
                            @endif
                        </p>
						<a href="{{ route('object_galleries.edit', ['object_gallery' => $gallery]) }}">
							<div class="container">
								<img src="{{ asset('storage/galleryThumbnail') . '/' . $gallery->photo_filename }}" class="image" style="width: 100%">
								<div class="middle">
									<div class="text"><i class="fa fa-edit"></i></div>
								</div>
							</div>
						</a>
					</div>
				@endforeach
			</div>
			<hr>
			<div>
				<p>status:
					@if($object->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($object->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection
