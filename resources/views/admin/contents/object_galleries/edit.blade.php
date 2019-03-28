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
                <h2>Edit object photo</h2>
                <br>
                <form action="{{ route('object_galleries.update', ['object_gallery' => $object_gallery ]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="object_id">Ob'ektga biriktirmoq <span style="color: red">*</span></label>
                                <select name="object_id" id="object_id" class="form-control {{ $errors->has('object_id') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    @foreach($objects as $object)
                                        @if($lang=='uz')
                                            <option value="{{ $object->id }}" {{ $object_gallery->object_id == $object->id?'selected':'' }}>{{ $object->title_uz }}</option>
                                        @elseif($lang=='ru')
                                            <option value="{{ $object->id }}" {{ $object_gallery->object_id == $object->id?'selected':'' }}>{{ $object->title_ru }}</option>
                                        @elseif($lang=='en')
                                            <option value="{{ $object->id }}" {{ $object_gallery->object_id == $object->id?'selected':'' }}>{{ $object->title_en }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('object_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('object_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="status">Status <span style="color: red">*</span></label>
                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    <option value="1" {{ $object_gallery->status == 1 ?'selected':'' }}>Active</option>
                                    <option value="0" {{ $object_gallery->status == 0 ?'selected':'' }}>Deactive</option>
                                </select>
                                @if ($errors->has('status'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('status') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-4">
                                <label for="photo_filename">Photo <span style="color: red"></span></label>
                                <input id="photo_filename" type="file" class="form-control {{ $errors->has('photo_filename') ? ' is-invalid' : '' }}" name="photo_filename">
                                @if ($errors->has('photo_filename'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo_filename') }}</strong>
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
                                <label for="title_uz">Title UZ</label>
                                <input id="title_uz" type="text" class="form-control {{ $errors->has('title_uz') ? ' is-invalid' : '' }}" name="title_uz" placeholder="Rasm nomi" value="{{ old('title_uz', $object_gallery->title_uz) }}" autocomplete="off">
                                @if ($errors->has('title_uz'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_uz') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                {{--ru form--}}
                                <label for="title_ru">Title RU</label>
                                <input id="title_ru" type="text" class="form-control {{ $errors->has('title_ru') ? ' is-invalid' : '' }}" name="title_ru" placeholder="Наименование фото" value="{{ old('title_ru', $object_gallery->title_ru) }}" autocomplete="off">
                                @if ($errors->has('title_ru'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_ru') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                {{--en form--}}
                                <label for="title_en">Title EN</label>
                                <input id="title_en" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en" placeholder="Photo name" value="{{ old('title_en', $object_gallery->title_en) }}" autocomplete="off">
                                
                                @if ($errors->has('title_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_en') }}</strong>
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
