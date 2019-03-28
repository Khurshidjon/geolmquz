@extends('layouts.main')
@section('content')

    @php
        $lang = App::getLocale();
    @endphp

    <div class="container py-5">
        @if(count($objects))
            @if($objects)
                @foreach($objects as $object)
                    @if($lang == 'uz')
                        <p class="text-center">{{ $object->menus->menu_uz }}</p>
                        <h4>
                            <a href="{{ route('page.content', ['menu' => $object->menus->parent, 'submenu' => $object->parent]) }}">
                                {!! $object->title_uz !!}
                            </a>
                        </h4>
                        <p>
                            {!! str_limit($object->body_uz, 500) !!}
                        </p>
                    @elseif($lang == 'ru')
                        <p class="text-center">{{ $object->menus->menu_ru }}</p>
                        <h4>
                            <a href="{{ route('page.content', ['menu' => $object->menus->parent, 'submenu' => $object->parent]) }}">
                                {!! $object->title_ru !!}
                            </a>
                        </h4>
                        <p>
                            {!! str_limit($object->body_ru, 500) !!}
                        </p>
                    @elseif($lang == 'en')
                        <p class="text-center">{{ $object->menus->menu_en }}</p>
                        <h4>
                            <a href="{{ route('page.content', ['menu' => $object->menus->parent, 'submenu' => $object->parent]) }}">
                                {!! $object->title_en !!}
                            </a>
                        </h4>
                        <p>
                            {!! str_limit($object->body_en, 500) !!}
                        </p>
                    @endif
                        <hr>
                @endforeach
            @endif
        @elseif(count($technologies))
            @if($technologies)
                @foreach($technologies as $technology)
                        @if($lang == 'uz')
                        <p class="text-center">{{ $technology->menus->menu_uz }}</p>
                            <h4>
                                <a href="{{ route('page.content', ['menu' => $technology->menus->parent, 'submenu' => $technology->parent]) }}">
                                    {!! $technology->title_uz !!}
                                </a>
                            </h4>
                        @elseif($lang == 'ru')
                            <p class="text-center">{{ $technology->menus->menu_ru }}</p>
                            <h4>
                                <a href="{{ route('page.content', ['menu' => $technology->menus->parent, 'submenu' => $technology->parent]) }}">
                                    {!! $technology->title_ru !!}
                                </a>
                            </h4>
                        @elseif($lang == 'en')
                            <p class="text-center">{{ $technology->menus->menu_en }}</p>
                            <h4>
                                <a href="{{ route('page.content', ['menu' => $technology->menus->parent, 'submenu' => $technology->parent]) }}">
                                    {!! $technology->title_en !!}
                                </a>
                            </h4>
                        @endif
                    <hr>
                @endforeach
            @endif
        @elseif(count($offers))
            @if($offers)
                @foreach($offers as $offer)
                    <p class="text-center"></p>
                @if($lang == 'uz')
                        <p class="text-center">{{ $offer->menu->menu_uz }}</p>
                        <h4>
                            <a href="{{ route('page.content', ['menu' => $offer->menu->parent, 'submenu' => $offer->parent]) }}">
                                {!! $offer->title_uz !!}
                            </a>
                        </h4>
                        <p>
                            {!! str_limit($offer->body_uz, 500) !!}
                        </p>
                    @elseif($lang == 'ru')
                        <p class="text-center">{{ $offer->menu->menu_ru }}</p>
                        <h4>
                            <a href="{{ route('page.content', ['menu' => $offer->menu->parent, 'submenu' => $offer->parent]) }}">
                                {!! $offer->title_ru !!}
                            </a>
                        </h4>
                        <p>
                            {!! str_limit($offer->body_ru, 500) !!}
                        </p>
                    @elseif($lang == 'en')
                        {{--<p class="text-center">{{ $offer->menu->menu_en }}</p>--}}
                        <h4>
                            <a href="{{ route('page.content', ['menu' => $offer->menu->parent, 'submenu' => $offer->parent]) }}">
                                {!! $offer->title_en !!}
                            </a>
                        </h4>
                        <p>
                            {!! str_limit($offer->body_en, 500) !!}
                        </p>
                    @endif
                @endforeach
            @endif
        @else
            <div class="text-center py-5">
                <h2>No results</h2>
            </div>
        @endif
    </div>

@endsection
