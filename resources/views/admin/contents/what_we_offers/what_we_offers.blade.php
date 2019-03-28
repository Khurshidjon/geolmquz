@extends('layouts.admin')
@section('content')
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
                    <a href="{{ route('what_we_offers.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Content</button></a>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Offer</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $lang = App::getLocale();
                            @endphp

                            @foreach($what_we_offers as $what_we_offer)
                                <tr style="text-align: center">
                                    <td>{{ $i++ }}</td>
                                    <td>
                                        @if($lang == 'uz')
                                            {{ $what_we_offer->menu->menu_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $what_we_offer->menu->menu_ru }}
                                        @elseif($lang == 'en')
                                            {{ $what_we_offer->menu->menu_en }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($lang == 'uz')
                                            {{ $what_we_offer->title_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $what_we_offer->title_ru }}
                                        @elseif($lang == 'en')
                                            {{ $what_we_offer->title_en }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($what_we_offer->status == 0)
                                            <span class="badge badge-danger">deactive</span>
                                        @elseif($what_we_offer->status == 1)
                                            <span class="badge badge-success">active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('what_we_offers.show', ['what_we_offer' => $what_we_offer]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                        <a href="{{ route('what_we_offers.edit', ['what_we_offer' => $what_we_offer]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                        <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('what_we_offers.destroy', ['what_we_offer' => $what_we_offer]) }}" data-toggle="modal" data-target="#myModal">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
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
        });
    </script>
    <div class="modal fade" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <form action="" method="post" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <div class="modal-header" style="background-color: red">
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this offer?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this offer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
