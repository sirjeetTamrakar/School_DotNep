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
                    <li class="breadcrumb-item active"><a href="{{ route('admin.subject.all') }}">Subjects</a></li>
                </ol>
            </div>
            <h5 class="page-title">Subjects</h5>
            
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

                    <h4 class="mt-0 header-title">All Subjects</h4>
                    <div>
                        <button class="pull-right btn btn-primary"
                            data-toggle="modal" data-target="#add_content">
                            ADD NEW</button>
                    </div>
                    @include('admin.subject.add')
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Title</th>
                            <th>Grade</th>
                            <th>Remarks</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($contents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>{{$content->title}}</td>
                                <td>{{$content->grade->title}}</td>
                                <td>{{$content->remarks}}</td>
                                <td>
                                    <button class="btn btn-primary btn-icon-text mr-2 p-1"
                                        data-toggle="modal" data-target="#edit_content{{$content->id}}">
                                        <i class="fa fa-edit"></i>
                                    </button>
                                    @include('admin.subject.edit')
                                    <button class="btn btn-danger btn-icon-text mr-2 p-1"
                                        data-toggle="modal" data-target="#delete_content{{$content->id}}">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                    @include('admin.subject.delete')
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
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>

@endpush