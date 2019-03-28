@extends('layouts.admin')
@section('content')
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
    <script>
        @if(\Session::has('message'))
        var type = "{{ \Session::get('alert-type', 'info') }}";
        switch(type){
            case 'info':
                toastr.info("{{ \Session::get('message') }}");
                break;

            case 'warning':
                toastr.warning("{{ \Session::get('message') }}");
                break;

            case 'success':
                toastr.success("{{ \Session::get('message') }}");
                break;

            case 'error':
                toastr.error("{{ \Session::get('message') }}");
                break;
        }
        @endif
    </script>
    <div class="main-content bg-white border-left">
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="mb-5">
                    <a href="{{ route('menus.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Menu</button></a>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Menu name</th>
                                <th>status</th>
                                <th>position</th>
                                <th>action</th>
                            </tr>
                        </thead>
	                    <tbody>
                                @php
                                    $i = 1;
                                    $k = 1;
                                    $lang = App::getLocale();
                                @endphp
                                @foreach($menus as $menu)
                                    <tr>
                                        <td class="text-center">{{ $i++ }}</td>
                                        <td class="pl-3">
                                        @if($lang == 'uz')
                                            {{ $menu->menu_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $menu->menu_ru }}
                                        @elseif($lang == 'en')
                                            {{ $menu->menu_en }}
                                        @endif
                                        </td>
                                        <td>
                                            @if($menu->status == 0)
                                                <span class="badge badge-danger">deactive</span>
                                            @elseif($menu->status == 1)
                                                <span class="badge badge-success">active</span>
                                            @elseif($menu->status == 2)
                                                <span class="badge badge-info">active & parnet</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if($menu->position == 1)
                                                Header
                                            @else
                                                Footer
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{ route('menus.show', ['menu' => $menu]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                            <a href="{{ route('menus.edit', ['menu' => $menu]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                            <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('menus.destroy', ['menu' => $menu]) }}" data-id="" data-toggle="modal" data-target="#myModal">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @foreach($menu->child as $childMenu)
                                        <tr>
                                            <td class="text-center">{{ $i++ }}</td>
                                            <td style="padding-left: 3em">
                                            @if($lang == 'uz')
                                                {{ $childMenu->menu_uz }} <sup class="badge badge-danger" style="font-size: 10px">sub</sup>
                                            @elseif($lang == 'ru')
                                                {{ $childMenu->menu_ru }} <sup class="badge badge-danger" style="font-size: 10px">sub</sup>
                                            @elseif($lang == 'en')
                                                {{ $childMenu->menu_en }} <sup class="badge badge-danger" style="font-size: 10px">sub</sup>
                                            @endif
                                            </td>
                                            <td>
                                                @if($childMenu->status == 0)
                                                    <span class="badge badge-danger">deactive</span>
                                                @elseif($childMenu->status == 1)
                                                    <span class="badge badge-success">active</span>
                                                @elseif($childMenu->status == 2)
                                                    <span class="badge badge-info">active & parent</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($childMenu->position == 1)
                                                    Header
                                                @else
                                                    Footer
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('menus.show', ['menu' => $childMenu]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                                <a href="{{ route('menus.edit', ['menu' => $childMenu]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                                <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('menus.destroy', ['menu' => $childMenu]) }}" data-id="" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @foreach($childMenu->child as $subMenu)
                                            <tr style="color: #a71d2a;">
                                                <td class="text-center">{{ $i++ }}</td>
                                                <td style="padding-left: 7em">
                                                @if($lang == 'uz')
                                                    {{ $subMenu->menu_uz }} <sup class="badge badge-danger" style="font-size: 10px">sub-sub</sup>
                                                @elseif($lang == 'ru')
                                                    {{ $subMenu->menu_ru }} <sup class="badge badge-danger" style="font-size: 10px">sub-sub</sup>
                                                @elseif($lang == 'en')
                                                    {{ $subMenu->menu_en }} <sup class="badge badge-danger" style="font-size: 10px">sub-sub</sup>
                                                @endif
                                                </td>
                                                <td>
                                                    @if($subMenu->status == 0)
                                                        <span class="badge badge-danger">deactive</span>
                                                    @elseif($subMenu->status == 1)
                                                        <span class="badge badge-success">active</span>
                                                    @elseif($subMenu->status == 2)
                                                        <span class="badge badge-info">active & parent</span>
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($subMenu->position == 1)
                                                        Header
                                                    @else
                                                        Footer
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('menus.show', ['menu' => $subMenu]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                                    <a href="{{ route('menus.edit', ['menu' => $subMenu]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                                    <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('menus.destroy', ['menu' => $subMenu]) }}" data-id="" data-toggle="modal" data-target="#myModal">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('.delete').on('click', function (e) {
                e.preventDefault();
                var url = $(this).attr('data-url');
                $('.delete-form').attr('action', url);
            });
        })
    </script>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <form action="" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="background-color: red">
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this menu?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this menu</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
