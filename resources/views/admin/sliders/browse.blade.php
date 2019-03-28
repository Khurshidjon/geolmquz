@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
			<a href="{{ route('sliders.edit', ['slider' => $slider]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit object gallery</button>
			</a>
			<br>
			<br>
			<h4> Slider title:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $slider->title_uz }}
					@elseif($lang == 'en')
						{{ $slider->title_en }}
					@elseif($lang == 'ru')
						{{ $slider->title_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<p class="text-dark"> Slider description:
				<span style="color: grey ">
					@if($lang == 'uz')
						{!! $slider->body_uz  !!}
					@elseif($lang == 'en')
						{!! $slider->body_en !!}
					@elseif($lang == 'ru')
						{!!  $slider->body_ru !!}
					@endif
				</span>
			</p>
			<hr>
			<h5 style="color: black">Object gallery:
				<span style="color: grey">
					<img src="{{ asset('storage') .'/'. $slider->slider_photo }}" alt="" style="max-width: 20em">
				</span>
			</h5>
			<hr>
			<div>
				<p>status:
					@if($slider->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($slider->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection