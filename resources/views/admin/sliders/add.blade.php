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
    <script>
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('.changed_image')
                        .attr('src', e.target.result);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Add Slider</h2>
                <br>
                <form action="{{ route('sliders.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
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
                            <div class="col-md-3">
                                <label for="slider_photo">Texnologiya rasmi</label>
                                <input onchange="readURL(this);"  id="slider_photo" type="file" class="form-control {{ $errors->has('slider_photo') ? ' is-invalid' : '' }}" name="slider_photo" accept="image/jpg, image/png">
                                @if ($errors->has('slider_photo'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('slider_photo') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="col-md-5">
                                <div>
                                    <i class="float-right fa fa-close d-none"></i>
                                    <img src="" class="changed_image" alt="">
                                </div>
                            </div>
                        </div>
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
                                <input id="title_uz" type="text" class="form-control {{ $errors->has('title_uz') ? ' is-invalid' : '' }}" name="title_uz" placeholder="Slider sarlavhasi" value="{{ old('title_uz') }}" autocomplete="off">
                                @if ($errors->has('title_uz'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_uz') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <label for="techno_uz">Content UZ</label>
                                <div id="toolbar-container1"></div>
                                <textarea name="body_uz" id="body_uz" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body_uz') ? ' is-invalid' : '' }}" placeholder="Qisqacha ta'rif">{{ old('body_uz') }}</textarea>
                                @if ($errors->has('body_uz'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body_uz') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu1" class="container tab-pane fade"><br>
                                {{--ru form--}}
                                <label for="title_ru">Title RU</label>
                                <input id="title_ru" type="text" class="form-control {{ $errors->has('title_ru') ? ' is-invalid' : '' }}" name="title_ru" placeholder="Название слайдера" value="{{ old('title_ru') }}" autocomplete="off">
                                @if ($errors->has('title_ru'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_ru') }}</strong>
                                    </span>
                                @endif
                                <br>
                                <label for="body_ru">Content RU</label>
                                <div id="toolbar-container2"></div>
                                <textarea name="body_ru" id="body_ru" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body_ru') ? ' is-invalid' : '' }}" placeholder="Описание">{{ old('body_ru') }}</textarea>
                                @if ($errors->has('body_ru'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body_ru') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div id="menu2" class="container tab-pane fade"><br>
                                {{--en form--}}
                                <label for="title_en">Title EN</label>
                                <input id="title_en" type="text" class="form-control {{ $errors->has('title_en') ? ' is-invalid' : '' }}" name="title_en" placeholder="Slider titleZ" value="{{ old('title_en') }}" autocomplete="off">
                                @if ($errors->has('title_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title_en') }}</strong>
                                    </span>
                                @endif
                                <br>
                                
                                <label for="body_en">Content EN</label>
                                <div id="toolbar-container3"></div>
                                <textarea name="body_en" id="body_en" cols="30" rows="7" class="ckeditor form-control {{ $errors->has('body_en') ? ' is-invalid' : '' }}" placeholder="Description">{{ old('body_en') }}</textarea>
                                @if ($errors->has('body_en'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('body_en') }}</strong>
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
        CKEDITOR.replace('body_uz', {
            language: 'ru',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
        CKEDITOR.replace('body_ru', {
            language: 'ru',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
        CKEDITOR.replace('body_en', {
            language: 'en',
            filebrowserBrowseUrl: '/browser/browse.php',
            filebrowserImageBrowseUrl: '/browser/browse.php?type=Images',
            filebrowserUploadUrl: '/uploader/upload.php',
            filebrowserImageUploadUrl: '/uploader/upload.php?type=Images'
        });
    </script>
@endsection
