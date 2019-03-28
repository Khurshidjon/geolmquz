@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
			<a href="{{ route('technologies.edit', ['technology' => $technology ]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit Technology</button>
			</a>
			<br>
			<br>
			<h4> Technology name:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $technology->title_uz }}
					@elseif($lang == 'en')
						{{ $technology->title_en }}
					@elseif($lang == 'ru')
						{{ $technology->title_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($technology->menu_id)
						@if($lang == 'uz')
							{{ $technology->parent->menu_uz }}
						@elseif($lang == 'en')
							{{ $technology->parent->menu_en }}
						@elseif($lang == 'ru')
							{{ $technology->parent->menu_ru }}
						@endif
					@endif
				</span>
			</h4>
			<hr>
			<h5 style="color: black">Technology text:
				<span style="color: grey">
					@if($lang == 'uz')
						{!! $technology->techno_uz !!}
					@elseif($lang == 'en')
						{!! $technology->techno_en !!}
					@elseif($lang == 'ru')
						{!! $technology->techno_ru !!}
					@endif
				</span>
			</h5>
			<hr>
			<div>
				<p>status:
					@if($technology->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($technology->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection