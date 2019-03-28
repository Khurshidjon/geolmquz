@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
			<a href="{{ route('object_galleries.edit', ['object_gallery' => $object_gallery]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit object gallery</button>
			</a>
			<br>
			<br>
			<h4> Object gallery name:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $object_gallery->title_uz }}
					@elseif($lang == 'en')
						{{ $object_gallery->title_en }}
					@elseif($lang == 'ru')
						{{ $object_gallery->title_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($object_gallery->object_id)
						@if($lang == 'uz')
							{{ $object_gallery->parent->title_uz }}
						@elseif($lang == 'en')
							{{ $object_gallery->parent->title_en }}
						@elseif($lang == 'ru')
							{{ $object_gallery->parent->title_ru }}
						@endif
					@endif
				</span>
			</h4>
			<hr>
			<h5 style="color: black">Object gallery:
				<span style="color: grey">
					<img src="{{ asset('storage') .'/'. $object_gallery->photo_filename}}" alt="" style="max-width: 20em">
				</span>
			</h5>
			<hr>
			<div>
				<p>status:
					@if($object_gallery->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($object_gallery->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection