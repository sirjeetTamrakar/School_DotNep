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
                    <li class="breadcrumb-item active"><a href="{{ route('admin.staff.all') }}">Staffs</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('staff') }}</h5>

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

                    <h4 class="mt-0 header-title text-center">{{ getLanguage('staff-setup') }}</h4>
                    <div>
                        <a href="{{ route('admin.staff.add') }}" class="pull-right btn btn-primary">
                            {{ getLanguage('add-new').' '.getLanguage('staff') }}</a>
                    </div>
                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ getLanguage('serial-1') }}</th>
                            <th>{{ getLanguage('name') }}</th>
                            <th>{{ getLanguage('stafftype') }}</th>
                            <th>{{ getLanguage('job-title') }}</th>
                            <th>{{ getLanguage('phone') }}</th>
                            <th>{{ getLanguage('action') }}</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($contents as $content)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$content->name}}</td>
                                <td>{{$content->staffType->title}}</td>
                                <td>{{$content->job_title}}</td>
                                <td>{{$content->phone}}</td>
                                <td>
                                    <a href="{{ route('admin.staff.details',$content->slug) }}" class="btn btn-primary btn-icon-text mr-2 p-1" title="View Details">
                                        <i class="fa fa-eye"></i>
                                        {{ getLanguage('details') }}
                                    </a>

                                    <a href="{{ route('admin.staff.edit',$content->slug) }}" class="btn btn-primary btn-icon-text mr-2 p-1" title="Edit">
                                        <i class="fa fa-edit"></i>
                                        {{ getLanguage('edit') }}
                                    </a>

                                    <button class="btn btn-danger btn-icon-text mr-2 p-1"
                                            data-toggle="modal" data-target="#delete_content{{$content->id}}" title="Delete">
                                        <i class="fa fa-trash"></i>
                                        {{ getLanguage('delete') }}
                                    </button>
                                    @include('admin.staff.delete')


                                    {{-- <a href="{{ route('admin.staff.qualifications',$content->slug) }}" class="btn btn-success btn-icon-text mr-2 p-1" title="Qualifications">
                                        <i class="fa fa-wpforms"></i>
                                        {{ getLanguage('qualifications') }}
                                    </a>

                                    <a href="{{ route('admin.staff.certificates',$content->slug) }}" class="btn btn-secondary btn-icon-text mr-2 p-1" title="Certificates">
                                        <i class="fa fa-file-image-o"></i>
                                        {{ getLanguage('certificates') }}
                                    </a> --}}

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
