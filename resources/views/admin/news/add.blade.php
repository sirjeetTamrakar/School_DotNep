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
                    <li class="breadcrumb-item"><a href="{{ route('admin.news.all') }}">News</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.news.add') }}">Add</a></li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('add-new').' '.getLanguage('news') }}</h5>
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
                    <h4 class="modal-title text-center" id="exampleModalLabel">{{ getLanguage('news').' '.getLanguage('information-1') }}</h4>

                    <form method="post" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="title">{{ getLanguage('news').' '.getLanguage('title') }}</label>
                            <input type="text" name="title" id="title" value="{{old("title")}}" class="form-control" required>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="status">{{ getLanguage('status') }}</label>
                                    <div class="btn-group btn-group-toggle form-control" style="height: 49px"  data-toggle="buttons">
                                        <label class="btn btn-light active">
                                            <input type="radio" name="status" id="option1" checked value="Active"> Active
                                        </label>
                                        <label class="btn btn-light">
                                            <input type="radio" name="status" id="option2" value="Inactive"> Inactive
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="photo">{{ getLanguage('news').' '.getLanguage('image') }}</label>
                                    <input type="file" name="image" id="photo" class="form-control">
                                    <span style="color: red">*Max Size: 1 MB</span>
                                </div>
                                <div class="image_preview">
                                    <div class="z-depth-1-half mb-4" style="text-align: center;">
                                        <img id="preview_image" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg" class="avatar-pic img-fluid" title="Click To Upload news Photo"
                                             alt="news Image">
                                    </div>
                                    {{--<img src="{{asset('admin/img/profile_icon.png')}}" alt="" id="preview_image" name style="height: 100px; width: auto">--}}
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="content">{{ getLanguage('news').' '.getLanguage('description') }}:</label>
                                    <textarea name="contents" id="content" class="summernote" >{{old("contents")}}</textarea>
                                </div>
                            </div>
                        </div>
                        @if ($errors->has('image'))
                            <span class="alert alert-danger" role="alert">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                        @endif

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
        uploadimages(e)
    });

    function uploadimages(e){
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.addEventListener('load',function(){
                const previewImage = document.querySelector('#preview_image')
                console.log(previewImage)
                previewImage.setAttribute("src",reader.result)
            });
            reader.readAsDataURL(file);
        }
    }
</script>


@endpush