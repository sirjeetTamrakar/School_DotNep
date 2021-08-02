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
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">*Breadcrumb1*</a></li>
                    <li class="breadcrumb-item active">*Breadcrumb2*</li>
                </ol>
            </div>
            <h5 class="page-title"> Unauthorized </h5>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <h2>Unauthorized Access</h2>
                <h4>You donot have permission to access this page.</h4>
            </div>
            <hr>

            <div class="text-center">
                <h2>अनधिकृत पहुँच</h2>
                <h4>
                    तपाईंसँग यो पृष्ठ पहुँच गर्न अनुमति छैन</h4>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

{{--Page specific scripts--}}

@endpush