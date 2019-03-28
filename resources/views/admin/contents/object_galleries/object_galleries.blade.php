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
                    <a href="{{ route('object_galleries.create') }}"><button type="button" class="btn btn-success"><i class="fa fa-plus-circle"></i> Add Content</button></a>
                </div>
                <div class="table-responsive mb-5">
                    <table class="table-bordered table-hover w-100">
                        <thead>
                            <tr style="text-align: center">
                                <th>ID</th>
                                <th>Menu</th>
                                <th>Photo</th>
                                <th>Photo name</th>
                                <th>Status</th>
                                <th>action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $i = 1;
                                $lang = App::getLocale();
                            //die()
                            @endphp

                            @foreach($object_galleries as $object_gallery)
                                <tr style="text-align: center">
                                    <td>{{ $i++ }}</td>
                                        @if($lang == 'uz')
                                            <td>{{ $object_gallery->object->title_uz }}</td>
                                        @elseif($lang == 'ru')
                                            <td>{{ $object_gallery->object->title_ru }}</td>
                                        @elseif($lang == 'en')
                                            <td>{{ $object_gallery->object->title_en }}</td>
                                        @endif
                                    <td>
                                        <img src="{{ asset('storage') .'/'. $object_gallery->photo_filename}}" alt="" style="width: 70px">
                                    </td>
                                    <td>
                                        @if($lang == 'uz')
                                            {{ $object_gallery->title_uz }}
                                        @elseif($lang == 'ru')
                                            {{ $object_gallery->title_ru }}
                                        @elseif($lang == 'en')
                                            {{ $object_gallery->title_en }}
                                        @endif
                                    </td>
                                    <td>
                                        @if($object_gallery->status == 0)
                                            <span class="badge badge-danger">deactive</span>
                                        @elseif($object_gallery->status == 1)
                                            <span class="badge badge-success">active</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('object_galleries.show', ['object_gallery' => $object_gallery]) }}" class="btn"><i class="fa fa-eye text-info"></i></a>
                                        <a href="{{ route('object_galleries.edit', ['object_gallery' => $object_gallery]) }}" class="btn"><i class="fa fa-edit text-success"></i></a>
                                        <a href="#" title="Delete" class="btn text-danger delete" data-url="{{ route('object_galleries.destroy', ['object_gallery' => $object_gallery]) }}" data-id="" data-toggle="modal" data-target="#myModal">
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
                        <h4 class="modal-title" style="color: #FFFFFF; vertical-align: middle" > Are you sure you want to delete this object photo?</h4>
                        <button type="button" class="close" data-dismiss="modal" style="vertical-align: middle; margin-top: -20px;">
                            <i class="fa fa-close text-white"></i>
                        </button>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn" style="background-color: red; color: white">Yes, Delete this object photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
