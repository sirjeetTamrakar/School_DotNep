@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}

<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .select2-container {
        width: 100% !important;
        padding: 0;
    }
</style>

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.staffbygrade.all') }}">Staff-Grade-Subject</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('staff-by-grade') }}</h5>

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

                    <h4 class="mt-0 header-title">{{ getLanguage('subject-teacher-assign') }}</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ getLanguage('serial-1') }}</th>
                            <th>{{ getLanguage('grade') }}</th>
                            <th class="text-center">{{ getLanguage('teachers') }}</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($contents as $content)
                            <tr>
                                <td>{{ $content->id }}</td>
                                <td>{{$content->title}}</td>
                                <td>
                                    <table style="width: 100%">
                                        <tr class="table-primary">
                                            <td>{{ getLanguage('subject') }}</td>
                                            <td>{{ getLanguage('teacher-name') }}</td>
                                            <td>{{ getLanguage('action') }}</td>
                                        </tr>
                                        @foreach($content->subjects as $subject)
                                        <tr>
                                            <td>{{$subject->title}}</td>
                                            <td>
                                                <ul>
                                                    @foreach($subject->staffs as $staff)
                                                        <li>
                                                            <a href="{{ route('admin.staff.details',$staff->slug) }}">
                                                                <span class="badge badge-pill badge-success">{{$staff->name}}</span>
                                                            </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                            <td>
                                                <button type="button" data-toggle="modal" data-target="#add_content{{$content->id}}{{$subject->id}}" class="btn btn-outline-primary">Assign</button>
                                            </td>
                                            @include('admin.staffbygrade.add')
                                        </tr>
                                        @endforeach
                                    </table>
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


    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
    {{--Select 2 INIT--}}
    <script>
        $(document).ready(function() {
            $('.js-example-basic-multiple').select2();
        });
    </script>

@endpush