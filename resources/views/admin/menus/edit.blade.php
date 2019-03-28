@extends('layouts.admin')
@section('content')
    @php
        $lang = App::getLocale();
    @endphp
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <h2>Add navbar menu</h2>
                <br>
                <form action="{{ route('menus.update', ['menu' => $editMenu]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group row">
                        <div class="col-md-9">
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
                                        <label for="menu_uz">Menu nomi <span style="color: red">*</span></label>
                                        <input id="menu_uz" type="text" class="form-control {{ $errors->has('menu_uz') ? ' is-invalid' : '' }}" name="menu_uz" value="{{ old('menu_uz', $editMenu->menu_uz) }}" placeholder="Menu nomi">
                                        @if ($errors->has('menu_uz'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('menu_uz') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="description_uz">Qisqacha mazmuni</label>
                                        <textarea name="description_uz" id="description_uz" cols="30" rows="7" class="form-control {{ $errors->has('description_uz') ? ' is-invalid' : '' }}" placeholder="Qisqacha ta'rif">{{ old('description_uz', $editMenu->description_uz) }}</textarea>
                                        @if ($errors->has('description_uz'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description_uz') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                    {{--ru form--}}
                                <div id="menu1" class="container tab-pane fade"><br>
                                        <label for="menu_ru">Название меню <span style="color: red">*</span></label>
                                        <input id="menu_ru" type="text" class="form-control {{ $errors->has('menu_ru') ? ' is-invalid' : '' }}" name="menu_ru" value="{{ old('menu_ru', $editMenu->menu_ru ) }}" placeholder="Название меню">
                                        @if ($errors->has('menu_ru'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('menu_ru') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="description_ru">Описание</label>
                                        <textarea name="description_ru" id="description_ru" cols="30" rows="7" class="form-control {{ $errors->has('description_ru') ? ' is-invalid' : '' }}" placeholder="Описание">{{ old('description_ru', $editMenu->description_ru) }}</textarea>
                                        @if ($errors->has('description_ru'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description_ru') }}</strong>
                                            </span>
                                        @endif
                                </div>
                                    {{--en form--}}
                                <div id="menu2" class="container tab-pane fade"><br>
                                        <label for="menu_en">Menu name <span style="color: red">*</span></label>
                                        <input id="menu_en" type="text" class="form-control {{ $errors->has('menu_en') ? ' is-invalid' : '' }}" name="menu_en" value="{{ old('menu_en', $editMenu->menu_en) }}" placeholder="Menu name">
                                        @if ($errors->has('menu_en'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('menu_en') }}</strong>
                                            </span>
                                        @endif
                                        <br>
                                        <label for="description_en">Description</label>
                                        <textarea name="description_en" id="description_en" cols="30" rows="7" class="form-control {{ $errors->has('description_en') ? ' is-invalid' : '' }}" placeholder="Description">{{ old('description_en', $editMenu->description_uz) }}</textarea>
                                        @if ($errors->has('description_en'))
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $errors->first('description_en') }}</strong>
                                            </span>
                                        @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="status">Status <span style="color: red">*</span></label>
                            <select name="status" id="status" class="form-control {{ $errors->has('status') ? ' is-invalid' : '' }}">
                                <option disabled>-- bittasini tanlang --</option>
                                <option value="1" {{ $editMenu->status==1?'selected':'' }}>Active</option>
                                <option value="2" {{ $editMenu->status==2?'selected':'' }}>Active & Parent</option>
                                <option value="0" {{ $editMenu->status==0?'selected':'' }}>Deactive</option>
                            </select>
                            @if ($errors->has('status'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('status') }}</strong>
                                </span>
                            @endif
                            <br>
                            <label for="position">Position <span style="color: red">*</span></label>
                            <select name="position" id="position" class="form-control {{ $errors->has('position') ? ' is-invalid' : '' }}">
                                <option selected disabled>-- bittasini tanlang --</option>
                                <option value="1" {{ $editMenu->position==1?'selected':'' }}>Header</option>
                                <option value="2" {{ $editMenu->position==2?'selected':'' }}>Footer</option>
                            </select>
                            @if ($errors->has('position'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('position') }}</strong>
                                </span>
                            @endif
                            <br>
                            <label for="parent_id">Menyuga biriktirmoq</label>
                            <select name="parent_id" id="parent_id" class="form-control {{ $errors->has('parent_id') ? ' is-invalid' : '' }}">
                                <option selected disabled>-- bittasini tanlang --</option>
                                @foreach($menus as $menu)
                                    @if($lang=='uz')
                                        <option value="{{ $menu->id }}" {{ $editMenu->parent_id==$menu->id?'selected':'' }}>{{ $menu->menu_uz }}</option>
                                    @elseif($lang=='ru')
                                        <option value="{{ $menu->id }}" {{ $editMenu->parent_id==$menu->id?'selected':'' }}>{{ $menu->menu_ru }}</option>
                                    @elseif($lang=='en')
                                        <option value="{{ $menu->id }}" {{ $editMenu->parent_id==$menu->id?'selected':'' }}>{{ $menu->menu_en }}</option>
                                    @endif
                                @endforeach
                            </select>
                            @if ($errors->has('parent_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('parent_id') }}</strong>
                                </span>
                            @endif
                            <br>
                            <label for="menu_photo">Menu rasmi <span style="color: red">*</span></label>
                            <input id="menu_photo" type="file" class="form-control {{ $errors->has('menu_photo') ? ' is-invalid' : '' }}" name="menu_photo" accept="image/jpeg, image/jpg, image/png" value="{{ $menu->menu_photo }}">
                            @if ($errors->has('menu_photo'))
                                <span class="invalid-feedback" role="alert">
                                   <strong>{{ $errors->first('menu_photo') }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>
                    <button type="submit" class="btn btn-outline-success">Jo'natmoq</button>
                </form>
            </div>
        </div>
    </div>
@endsection