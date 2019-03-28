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
                <h2>Update social group or channel URL</h2>
                <br>
                <form action="{{ route('social_networks.update', ['social_network' => $social_network]) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-8" style="font-size: 25px">
                                <label for="object_id">Social network turi</label>
                                <div class="list-inline">
                                    <div class="list-inline-item text-info">
                                        <label for="facebook">
                                            <input id="facebook" type="radio" name="icon" value="icon-facebook" {{ $social_network->icon=='icon-facebook'?'checked':'' }}>
                                            <i class="fab fa-facebook"></i>
                                        </label>
                                    </div>
                                    <div class="list-inline-item text-warning">
                                        <label for="odkl">
                                            <input id="odkl" type="radio" name="icon" value="icon-odnoklassniki" {{ $social_network->icon=='icon-odnoklassniki'?'checked':'' }}>
                                            <i class="fab fa-odnoklassniki"></i>
                                        </label>
                                    </div>
                                    <div class="list-inline-item text-info">
                                        <label for="twitter">
                                            <input id="twitter" type="radio" name="icon" value="icon-twitter" {{ $social_network->icon=='icon-twitter'?'checked':'' }}>
                                            <i class="fab fa-twitter"></i>
                                        </label>
                                    </div>
                                    <div class="list-inline-item" style="color: #c51f1a">
                                        <label for="google">
                                            <input id="google" type="radio" name="icon" value="icon-google-plus" {{ $social_network->icon=='icon-google-plus'?'checked':'' }}>
                                            <i class="fab fa-google-plus"></i>
                                        </label>
                                    </div>
                                    <div class="list-inline-item text-danger">
                                        <label for="instagram">
                                            <input id="instagram" type="radio" name="icon" value="icon-instagram" {{ $social_network->icon=='icon-instagram'?'checked':'' }}>
                                            <i class="fab fa-instagram"></i>
                                        </label>
                                    </div>
                                    <div class="list-inline-item text-info">
                                        <label for="linkedin">
                                            <input id="linkedin" type="radio" name="icon" value="icon-linkedin" {{ $social_network->icon=='icon-linkedin'?'checked':'' }}>
                                            <i class="fab fa-linkedin"></i>
                                        </label>
                                    </div>
                                    <div class="list-inline-item" style="color: red">
                                        <label for="youtube">
                                            <input id="youtube" type="radio" name="icon" value="icon-youtube" {{ $social_network->icon=='icon-youtube'?'checked':'' }}>
                                            <i class="fab fa-youtube"></i>
                                        </label>
                                    </div>
                                </div>
                                @if ($errors->has('icon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('icon') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status <span style="color: red">*</span></label>
                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    <option value="1" {{ $social_network->status==1?'selected':'' }}>Active</option>
                                    <option value="0" {{ $social_network->status==0?'selected':'' }}>Deactive</option>
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
                            <div id="menu2" class="container"><br>
                                <label for="url">Group or Channel url</label>
                                <input id="url" type="text" class="form-control {{ $errors->has('url') ? ' is-invalid' : '' }}" name="url" placeholder="https://example.com/group" value="{{ old('url', $social_network->url) }}" autocomplete="off">
                                
                                @if ($errors->has('url'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('url') }}</strong>
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
