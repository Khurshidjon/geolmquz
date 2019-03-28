@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30 pb-5">
			<a href="{{ route('menus.edit', ['menu' => $menu]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit Menu</button>
			</a>
			<br>
			<br>
			<h4>Menu name:
				<span style="color: grey">
					@if($lang == 'uz')
							{{ $menu->menu_uz }}
						@elseif($lang == 'en')
							{{ $menu->menu_en }}
						@elseif($lang == 'ru')
							{{ $menu->menu_ru }}
						@endif
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($menu->parent)
						@if($lang == 'uz')
							{{ $menu->parent->menu_uz }}
						@elseif($lang == 'en')
							{{ $menu->parent->menu_en }}
						@elseif($lang == 'ru')
							{{ $menu->parent->menu_ru }}
						@endif
					@endif
				</span>
			</h4>
			<hr>
			<p style="color: black">Menu description:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $menu->description_uz }}
					@elseif($lang == 'en')
						{{ $menu->description_en }}
					@elseif($lang == 'ru')
						{{ $menu->description_ru }}
					@endif
				</span>
			</p>
			<hr>
			<div>
				<p>Menu photo:</p>
				<img src="{{ asset('storage') .'/'. $menu->menu_photo}}" alt="">
			</div>
			<hr>
			<div>
				<p>status:
					@if($menu->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($menu->status == 1)
						<span class="badge badge-success">Active</span>
					@elseif($menu->status == 2)
						<span class="badge badge-info">Active & Parent</span>
					@endif
				</p>
			</div>
			<hr>
			<div>
				<p>position:
					@if($menu->position == 1)
						<span class="badge badge-success">Header</span>
					@else
						<span class="badge badge-info">Footer</span>
					@endif
				</p>
			</div>
		</div>
	</div>

@endsection