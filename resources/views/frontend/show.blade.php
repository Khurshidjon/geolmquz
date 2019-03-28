@extends('layouts.main')
@section('content')
@php
    $lang = App::getLocale();
    $i = 1;
    $k = 1;
@endphp
{{--    {{ //$menu }}--}}
<section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5 pb-2">
                <div class="col-md-8 text-center heading-section ftco-animate">
                    {{--<span class="subheading">Departments</span>--}}
                    <h2 class="mb-4">
                        @if($lang == 'uz')
                            {{ $menu->menu_uz }}
                        @elseif($lang == 'ru')
                            {{ $menu->menu_ru }}
                        @elseif($lang == 'en')
                            {{ $menu->menu_en }}
                        @endif
                    </h2>
                    <p>
                        @if($lang == 'uz')
                            {{ $menu->description_uz }}
                        @elseif($lang == 'ru')
                            {{ $menu->description_ru }}
                        @elseif($lang == 'en')
                            {{ $menu->description_en }}
                        @endif
                    </p>
                </div>
            </div>
            <div class="ftco-departments">
                <div class="row">
                    <div class="col-md-12 nav-link-wrap">
                        <div class="nav nav-pills d-flex text-center" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            @foreach($menu->child as $submenu)
                                <a class="nav-link ftco-animate {{ $i==1?'active':''}}" id="v-pills-{{$i}}-tab" data-toggle="pill" href="#v-pills-{{$i}}" role="tab" aria-controls="v-pills-{{$i}}" aria-selected="true">
                                    @if($lang == 'uz')
                                        {{ $submenu->menu_uz }}
                                    @elseif($lang == 'ru')
                                        {{ $submenu->menu_ru }}
                                    @elseif($lang == 'en')
                                        {{ $submenu->menu_en }}
                                    @endif
                                </a>
                                @php
                                    $i++
                                @endphp
                            @endforeach
                        </div>
                    </div>
                    <div class="col-md-12 tab-wrap">
                        <div class="tab-content bg-light p-4 p-md-5 ftco-animate" id="v-pills-tabContent">
                            @foreach($menu->child as $submenu)
                                <div class="tab-pane py-2 fade {{ $k==1?'show active':'' }}" id="v-pills-{{$k}}" role="tabpanel" aria-labelledby="day-{{$k}}-tab">
                                    <div class="row departments">
                                        <div class="col-lg-4 order-lg-last d-flex align-items-stretch">
                                            <div class="img d-flex align-self-stretch" style="background-image: url('{{ asset('storage') .'/'. $submenu->menu_photo}}');"></div>
                                        </div>
                                        <div class="col-lg-8">
                                            <h2>
                                                <a href="{{ route('page.content', ['menu' => $menu, 'submenu' => $submenu]) }}">
                                                    @if($lang == 'uz')
                                                        {{ $submenu->menu_uz }}
                                                    @elseif($lang == 'ru')
                                                        {{ $submenu->menu_ru }}
                                                    @elseif($lang == 'en')
                                                        {{ $submenu->menu_en }}
                                                    @endif
                                                </a>
                                            </h2>
                                            <p>
                                                @if($lang == 'uz')
                                                    {{ $submenu->description_uz }}
                                                @elseif($lang == 'ru')
                                                    {{ $submenu->description_ru }}
                                                @elseif($lang == 'en')
                                                    {{ $submenu->description_en }}
                                                @endif
                                            </p>
                                            <div class="row mt-5 pt-2">
                                                @foreach($submenu->child as $subsubmenu)
                                                    <div class="col-lg-6">
                                                        <a href="#" class="services-2 d-flex">
                                                            <div class="icon mt-2 mr-3 d-flex justify-content-center align-items-center">
                                                                {{--<span class="flaticon-first-aid-kit"></span>--}}
                                                                <img src="{{ asset('storage') .'/'. $subsubmenu->menu_photo}}" alt="" style="width: 100%">
                                                            </div>
                                                            <div class="text">
                                                                <h3>
                                                                    @if($lang == 'uz')
                                                                        {{ $subsubmenu->menu_uz }}
                                                                    @elseif($lang == 'ru')
                                                                        {{ $subsubmenu->menu_ru }}
                                                                    @elseif($lang == 'en')
                                                                        {{ $subsubmenu->menu_en }}
                                                                    @endif
                                                                </h3>
                                                                <p>
                                                                    @if($lang == 'uz')
                                                                        {{ $subsubmenu->description_uz }}
                                                                    @elseif($lang == 'ru')
                                                                        {{ $subsubmenu->description_ru }}
                                                                    @elseif($lang == 'en')
                                                                        {{ $subsubmenu->description_en }}
                                                                    @endif
                                                                </p>
                                                            </div>
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @php
                                    $k++
                                @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection
