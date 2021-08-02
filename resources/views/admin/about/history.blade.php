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
                    <li class="breadcrumb-item"><a href="#">School</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('basic').' '.getLanguage('information-1') }}</h5>
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

                    <h4 class="mt-0 header-title">{{ getLanguage('school').' '.getLanguage('information-1') }}</h4>


                    <form class="" action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>{{ getLanguage('history') }}</label>
                                    <textarea name="history" style="height: 500px;" class="summernote">
{{ getAbout('history') }}
                                    </textarea>
                                </div>




                            </div>

                        </div>


                        <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection

@push('scripts')
<script src="{{ asset('admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 500,                 // set editor height
            minHeight: 500,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
</script>

@endpush