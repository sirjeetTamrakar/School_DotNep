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
                    <li class="breadcrumb-item active"><a href="{{ route('admin.grade.all') }}">Grades</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('grade') }}</h5>

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

                    <h4 class="mt-0 header-title">{{ getLanguage('all') }} {{ getLanguage('grade') }}</h4>
                    <div>
                        <button class="pull-right btn btn-primary"
                            data-toggle="modal" data-target="#add_content">
                            {{ getLanguage('add-new') }} {{ getLanguage('grade') }}</button>
                    </div>
                    @include('admin.grade.add')
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ getLanguage('serial-1') }}</th>
                            <th>Grade {{ getLanguage('title') }}</th>
                            @foreach($ethnicities as $ethnicity)
                            <th>{{$ethnicity->title}}</th>
                            @endforeach
                            <th>{{ getLanguage('total').' '.getLanguage('students') }}</th>
                            <th>{{ getLanguage('remarks') }}</th>
                            <th>{{ getLanguage('action') }}</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($contents as $content)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $content->subtitle }}</td>
                                @foreach($ethnicities as $ethnicity)
                                <td>
                                    {{ getLanguage('male') }}: {{isset($content->male[$ethnicity->id])? $content->male[$ethnicity->id]:0 }}
                                    <br>{{ getLanguage('female') }}: {{isset($content->female[$ethnicity->id])? $content->female[$ethnicity->id]:0 }}
                                </td>
                                @endforeach
                                <td> {{$content->total_students}}</td>
                                <td>{{$content->remarks}}</td>
                                <td>
                                    <button class="btn btn-primary btn-icon-text mr-2 p-1"
                                        data-toggle="modal" data-target="#edit_content{{$content->id}}">
                                        <i class="fa fa-edit"></i>{{ getLanguage('edit') }}
                                    </button>
                                    @include('admin.grade.edit')
                                    <button class="btn btn-danger btn-icon-text mr-2 p-1"
                                        data-toggle="modal" data-target="#delete_content{{$content->id}}">
                                        <i class="fa fa-trash"></i> {{getLanguage('delete')}}
                                    </button>
                                    @include('admin.grade.delete')
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
