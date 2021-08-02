@extends('admin.layouts.master')

@push('styles')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
{{--Page specific styles--}}

@endpush

@section('headers')

{{--Heading and breadcrumbs--}}
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                <li class="breadcrumb-item active"><a href="{{ route('admin.subject.all') }}">Course</a></li>
            </ol>
        </div>
        <h5 class="page-title">Course</h5>

    </div>
</div>
<!-- end row -->

@endsection

@section('contents')

{{--Page Specific Content--}}
<div class="row">
    <div class="col-11" style="margin-left:6%;">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row mt-2 mb-3">
                    <div class="col-md-6">
                        <h4 class="mt-2 ml-3 header-title">Add Pop-Up</h4>

                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('admin.popup.all') }}" class="btn btn-primary" type="button">
                            Back to all popups
                        </a>
                    </div>
                </div>


                <div class="col-md-12 ml-0">
                    <form action="{{ route('admin.popup.addSubmit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.popup.commonform')
                        <div class="form-group mt-1">
                            <button class="btn btn-primary" type="submit">Submit</button>
                        </div>
                    </form>

                </div>

            </div>

        </div>
    </div>
</div>




@endsection

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $(document).ready(function () {
        $('#summernote').summernote();
    });

</script>


@endpush
