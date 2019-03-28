@extends('layouts.admin')
@section('content')
	@php
		$lang = App::getLocale();
	@endphp
	<div class="main-content bg-white border-left">
		<div class="section__content section__content--p30">
			<a href="{{ route('address.edit', ['address' => $address]) }}">
				<button type="button" class="btn btn-warning text-white"><i class="fa fa-edit"></i> Edit address</button>
			</a>
			<br>
			<br>
			<h4> Email:
				<span style="color: grey">
					{{ $address->email }}
				</span>
			</h4>
			<hr>
			<h4> Phone:
				<span style="color: grey">
					{{ $address->phone }}
				</span>
			</h4>
			<hr>
			<h4>Menu parent:
				<span style="color: grey">
					@if($lang == 'uz')
						{{ $address->address_uz }}
					@elseif($lang == 'en')
						{{ $address->address_en }}
					@elseif($lang == 'ru')
						{{ $address->address_ru }}
					@endif
				</span>
			</h4>
			<hr>
			<div>
				<p>status:
					@if($address->status == 0)
						<span class="badge badge-danger">Deactive</span>
					@elseif($address->status == 1)
						<span class="badge badge-success">Active</span>
					@endif
				</p>
			</div>
			<hr>
		</div>
	</div>

@endsection