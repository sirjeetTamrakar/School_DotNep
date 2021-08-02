@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.album.all') }}">Albums</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('album') }}</h5>

        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title text-center">{{ getLanguage('image') }} {{ getLanguage('album') }}</h4>
                    <div>
                        <button data-toggle="modal" data-target="#add_content" class="pull-right btn btn-primary">
                            {{ getLanguage('add-new') }} {{ getLanguage('album') }}</button>
                        @include('admin.album.add')

                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>{{ getLanguage('album') }} {{ getLanguage('title') }}</th>
                                <th>{{ getLanguage('date') }}</th>
                                <th>{{ getLanguage('image') }}</th>
                                <th>{{ getLanguage('action') }}</th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$content->title}}</td>
                                <td>{{ getNepaliDate($content->created_at)}}</td>
                                <td>
                                    <a href="{{ route('admin.album.gallery',$content->slug) }}" class="btn btn-success btn-icon-text mr-2 p-1">
                                        {{ getLanguage('album') }} {{ getLanguage('image') }} {{ getLanguage('view-and-edit') }}
                                    </a>
                                </td>
                                <td>
                                    <button data-toggle="modal" data-target="#edit_content{{$content->id}}" class="btn btn-primary btn-icon-text mr-2 p-1" title="Edit">
                                        <i class="fa fa-edit"></i> {{getLanguage('edit')}}
                                    </button>
                                    @include('admin.album.edit')


                                    <button class="btn btn-danger btn-icon-text mr-2 p-1"
                                            data-toggle="modal" data-target="#delete_content{{$content->id}}" title="Delete">
                                        <i class="fa fa-trash"></i> {{ getLanguage('delete') }}
                                    </button>
                                    @include('admin.album.delete')

                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')

{{--Page specific scripts--}}
<!-- Required datatable js -->
<script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>


@endpush
