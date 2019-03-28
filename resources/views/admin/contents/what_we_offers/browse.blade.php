@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
			<a href="{{ route('what_we_offers.edit', ['what_we_offer' => $what_we_offer ]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit Offer</button>
			</a>
			<br>
			<br>
			<h4> Offer name:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $what_we_offer->title_uz }}
					@elseif($lang == 'en')
						{{ $what_we_offer->title_en }}
					@elseif($lang == 'ru')
						{{ $what_we_offer->title_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($what_we_offer->menu_id)
						@if($lang == 'uz')
							{{ $what_we_offer->parent->menu_uz }}
						@elseif($lang == 'en')
							{{ $what_we_offer->parent->menu_en }}
						@elseif($lang == 'ru')
							{{ $what_we_offer->parent->menu_ru }}
						@endif
					@endif
				</span>
			</h4>
			<hr>
			<h5 style="color: black">Offer text:
				<span style="color: grey">
					@if($lang == 'uz')
						{!! $what_we_offer->body_uz !!}
					@elseif($lang == 'en')
						{!! $what_we_offer->body_en !!}
					@elseif($lang == 'ru')
						{!! $what_we_offer->body_ru !!}
					@endif
				</span>
			</h5>
			<hr>
			<div>
				<p>status:
					@if($what_we_offer->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($what_we_offer->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection