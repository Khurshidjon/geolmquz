@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <style>
        .ck-editor__editable {
            min-height: 400px;
        }
    </style>
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Add object photo</h2>
                <br>
                <form action="{{ route('address.update', ['address' => $address]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="status">Phone <span style="color: red">*</span></label>
                                <input type="text" name="phone" class="form-control {{ $errors->has('phone') ? ' is-invalid' : '' }}" placeholder="+998901234567" value="{{ old('phone', $address->phone) }}">
                                @if ($errors->has('phone'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="status">Email <span style="color: red">*</span></label>
                                <input type="text" name="email" class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="mail@example.com" value="{{ old('email', $address->email) }}">
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status <span style="color: red">*</span></label>
                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    <option value="1" {{ $address->status==1?'selected':'' }}>Active</option>
                                    <option value="0" {{ $address->status==0?'selected':'' }}>Deactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="tab-content">
                            <ul class="nav nav-tabs" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#home">UZB</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu1">РУС</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#menu2">ENG</a>
                                </li>
                            </ul>
                            
                            <div id="home" class="container tab-pane active"><br>
                                {{--uz form--}}
                                <label for="title_uz">Address UZ</label>
                                <input id="address_uz" type="text" class="form-control {{ $errors->has('address_uz') ? ' is-invalid' : '' }}" name="address_uz" placeholder="Manzil" value="{{ old('address_uz', $address->address_uz) }}" autocomplete="off">
                                @if ($errors->has('address_uz'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_uz') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                {{--ru form--}}
                                <label for="address_ru">Address RU</label>
                                <input id="address_ru" type="text" class="form-control {{ $errors->has('address_ru') ? ' is-invalid' : '' }}" name="address_ru" placeholder="Адрес" value="{{ old('address_ru', $address->address_ru) }}" autocomplete="off">
                                @if ($errors->has('address_ru'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_ru') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                {{--en form--}}
                                <label for="address_en">Address EN</label>
                                <input id="address_en" type="text" class="form-control {{ $errors->has('address_en') ? ' is-invalid' : '' }}" name="address_en" placeholder="Address" value="{{ old('address_en', $address->address_en) }}" autocomplete="off">
                                @if ($errors->has('address_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('address_en') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                </form>
            </div>
        </div>
    </div>
@endsection
