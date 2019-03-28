@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
			<a href="{{ route('certificats.edit', ['certificat' => $certificat]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit Certificat</button>
			</a>
			<br>
			<br>
			<h4> Certifikat name:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $certificat->title_uz }}
					@elseif($lang == 'en')
						{{ $certificat->title_en }}
					@elseif($lang == 'ru')
						{{ $certificat->title_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($certificat->menu_id)
						@if($lang == 'uz')
							{{ $certificat->parent->menu_uz }}
						@elseif($lang == 'en')
							{{ $certificat->parent->menu_en }}
						@elseif($lang == 'ru')
							{{ $certificat->parent->menu_ru }}
						@endif
					@endif
				</span>
			</h4>
			<hr>
			<h5 style="color: black">Certificat text:
				<span style="color: grey">
					@if($lang == 'uz')
						{!! $certificat->body_uz !!}
					@elseif($lang == 'en')
						{!! $certificat->body_en !!}
					@elseif($lang == 'ru')
						{!! $certificat->body_ru !!}
					@endif
				</span>
			</h5>
			<hr>
			<div>
				<p>status:
					@if($certificat->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($certificat->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection