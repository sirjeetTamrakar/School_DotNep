@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}
<!-- Dropzone css -->
{{--    <link href="{{ asset('admin/assets/plugins/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css">--}}
<style>
    .image_preview{
        width: 100%;
        min-height: 100px;
        margin-top: 15px;

        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        color: #cccccc;

    }

    .avatar-pic {
        width: auto;
        height: 100px;
    }
    .file-field input[type="file"] {
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 0;
        margin: 0;
        cursor: pointer;
        filter: alpha(opacity=0);
        opacity: 0;
        box-sizing: border-box;
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
                    <li class="breadcrumb-item"><a href="{{ route('admin.download.all') }}">Download</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.download.edit',$download->id) }}">Edit</a></li>
                </ol>
            </div>
            <h5 class="page-title"> Edit File {{ $download->title }}</h5>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="modal-title text-center" id="exampleModalLabel">File Information </h4>

                    <form method="post" action="{{ route('admin.download.update',$download->id) }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" value="{{$download->title}}" id="title" class="form-control" required>
                        </div>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <div class="btn-group btn-group-toggle form-control" style="height: 49px"  data-toggle="buttons">

                                        <label class="btn btn-light @if($download->status == 1) active @endif ">
                                            <input type="radio" name="status" id="option1" @if($download->status == 1) checked @endif value="Active"> Active
                                        </label>
                                        <label class="btn btn-light @if($download->status == 0) active @endif">
                                            <input type="radio" name="status" @if($download->status == "Inactive") checked @endif id="option2" value="Inactive"> Inactive
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">File Attachment:</label>
                                    <input type="file" name="file" id="photo" class="form-control" >
                                </div>
                                <div class="image_preview">
                                    @if(isset($download->file))
                                        <label for="">Current Attachment:</label>
                                        <a href="{{ asset($download->file) }}" target="__blank">
                                        <div class="z-depth-1-half mb-4" style="text-align: center;">
                                            <img id="preview_image" src="{{asset('admin/img/document_logo.png')}}" class="avatar-pic img-fluid" title="Click To View Current Attachment"
                                                 alt="Download File">
                                        </div>
                                        </a>
                                    @else
                                        <label for="">No previous Attachment.</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="content">File Description:</label>
                                    <textarea name="contents" id="content" class="summernote" >{!! $download->description !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success pull-right">Save changes</button>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')

{{--SummerNote--}}
<script src="{{ asset('admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
</script>

{{--Image Upload--}}
<script>
    $('input[type=file]').on('change', function(e){
        $('.image_preview').hide();
    });

</script>


@endpush