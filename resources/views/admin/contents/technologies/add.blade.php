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
                <h2>Add Technology</h2>
                <br>
                <form action="{{ route('technologies.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label for="menu_id">Menyuga biriktirmoq</label>
                                <select name="menu_id" id="menu_id" class="form-control {{ $errors->has('menu_id') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    @foreach($menus as $menu)
                                        @if($lang=='uz')
                                            <option value="{{ $menu->id }}">{{ $menu->menu_uz }}</option>
                                        @elseif($lang=='ru')
                                            <option value="{{ $menu->id }}">{{ $menu->menu_ru }}</option>
                                        @elseif($lang=='en')
                                            <option value="{{ $menu->id }}">{{ $menu->menu_en }}</option>
                                        @endif
                                    @endforeach
                                </select>
                                @if ($errors->has('menu_id'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('menu_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <label for="status">Status <span style="color: red">*</span></label>
                                <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                    <option selected disabled>-- bittasini tanlang --</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
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
                                <label for="title_uz">Title UZ</label>
                                <input id="title_uz" type="text" class="form-control {{ $errors->has('title_uz') ? ' is-invalid' : '' }}" name="title_uz" placeholder="Texnologiya nomi" value="{{ old('title_uz') }}" autocomplete="off">
                                @if ($errors->has('title_uz'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_uz') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <label for="techno_uz">Content UZ</label>
                                <div id="toolbar-container1"></div>
                                <textarea name="techno_uz" id="techno_uz" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('techno_uz') ? ' is-invalid' : '' }}" placeholder="Qisqacha ta'rif">{{ old('techno_uz') }}</textarea>
                                @if ($errors->has('techno_uz'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('techno_uz') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                {{--ru form--}}
                                <label for="title_ru">Title RU</label>
                                <input id="title_ru" type="text" class="form-control {{ $errors->has('title_ru') ? ' is-invalid' : '' }}" name="title_ru" placeholder="Наименование технологии" value="{{ old('title_ru') }}" autocomplete="off">
                                @if ($errors->has('title_ru'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_ru') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <label for="techno_ru">Content RU</label>
                                <div id="toolbar-container2"></div>
                                <textarea name="techno_ru" id="body_ru" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('techno_ru') ? ' is-invalid' : '' }}" placeholder="Описание">{{ old('techno_ru') }}</textarea>
                                @if ($errors->has('techno_ru'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('techno_ru') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                {{--en form--}}
                                <label for="title_en">Title EN</label>
                                <input id="title_en" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en" placeholder="Technology name" value="{{ old('title_en') }}" autocomplete="off">
                                @if ($errors->has('title_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                                @endif
                                <br>

                                <label for="techno_en">Content EN</label>
                                <div id="toolbar-container3"></div>
                                <textarea name="techno_en" id="techno_en" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('techno_en') ? ' is-invalid' : '' }}" placeholder="Description">{{ old('techno_en') }}</textarea>
                                @if ($errors->has('techno_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('techno_en') }}</strong>
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
    <script>
        CKEDITOR.replace('techno_uz', {
            language: 'ru',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
        CKEDITOR.replace('techno_ru', {
            language: 'ru',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
        CKEDITOR.replace('techno_en', {
            language: 'en',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
    </script>
@endsection
