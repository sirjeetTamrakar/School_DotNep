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
        <div class="card m-b-25">
            <div class="card-body">
                <div class="row mt-2 mb-3">
                    <div class="col-md-6">
                        <h4 class="mt-2 ml-3 header-title">Add Course</h4>

                    </div>
                    <div class="col-md-6 text-md-right">
                        <a href="{{ route('admin.course.all') }}" class="btn btn-primary" type="button">
                            Back to all courses
                        </a>
                    </div>
                </div>


                <div class="col-md-8 ml-0">
                    <form action="{{ route('admin.course.addSubmit') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @include('admin.course.commonform')
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
    $('#course_image').hide();
    $('#course_img').change(function(){

    let reader = new FileReader();

    reader.onload = (e) => {

        $('#course_image').attr('src', e.target.result);
        $('#course_image').show();
    }

    reader.readAsDataURL(this.files[0]);

    });

</script>


@endpush
