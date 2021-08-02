
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
                    <li class="breadcrumb-item "><a href="{{ route('admin.staff.all') }}">Staffs</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('admin.staff.details',$staff->slug) }}">{{ $staff->name }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.staff.certificates',$staff->slug) }}">Certificates</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('name') }} : {{ $staff->name }}</h5>
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
                    <h5 class="text-center">{{ getLanguage('certificates') }} {{ getLanguage('upload') }}</h5>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="jumbotron">
                                <div class="row preview_image">
                                </div>
                                <br>
                                <hr><hr>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="">{{ getLanguage('document').' '.getLanguage('title') }}</label>
                                        <input id="doc_title" type="text" name="title" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for="">{{ getLanguage('document').' '.getLanguage('file') }}</label>
                                        <input id="doc_image" type="file" name="file" class="form-control">
                                    </div>
                                    <div class="col-md-4 form-group">
                                        <label for=""></label>
                                        <br>
                                        <button id="doc_submit" class="btn btn-outline-primary" type="button">
                                            {{ getLanguage('upload') }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection

@push('scripts')

{{--Page specific scripts--}}

<script>
    $(document).ready(function(){
        get_images();
    });

    function get_images(){

        $.ajax({
            url: '{{ route('admin.staff.get_documents',$staff->id) }}',
            contentType : false,
            processData : false,
            method: 'get',
            // data: formData,
            success: function(result)
            {
                console.log(result);
                $('.preview_image').empty();
                var images = result;
                $.each(images, function(key, value){
                    var url = '{{asset(':url')}}';
                    var img = '{{asset('admin/img/document_logo.png')}}';
                    url = url.replace(":url", value.file);
                    var preview = jQuery("<div class='col-md-3'>"+
                            "<div class='card'>"+
                        "<div class='card-header text-center'>"+
                        "<p>"+value.title+"</p>"+
                        "</div>"+
                        "<div class='card-body text-center'>"+
                        "<a href='"+url+"' >"+
                        "<img src='"+img+"' alt='Click To View File' style='height: 100px; width: auto' />"+
                        "</a>"+
                        "</div>"+
                        "<div class='card-footer text-center'>"+
                        "<button class='btn btn-danger text-center delete_document' value='"+value.id+"'>delete</button>" +
                        "<br>"+
                        "</div>"+
                        "</div>"+
                        "</div>");

                    $('.preview_image').append(preview);
                    console.log(value);
                })
                // location.reload();
            },
            error: function(data)
            {
                console.log(data);
            }
        });


    }
</script>

<script>
    $('#doc_submit').on('click',function(){
        console.log('adasa')
        var formData = new FormData();
        var myFile = $('#doc_image').prop('files')[0];
        var title = $('#doc_title').val();
        console.log(myFile);
        formData.append('file',myFile);
        formData.append('title',title);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $.ajax({
            url: '{{ route("admin.staff.upload_document",$staff->id)}}',
            contentType: false,
            processData: false,
            method: 'POST',
            data : formData,

            success: function(result)
            {
                console.log(result);
                get_images();

            },
            error: function(data)
            {
                console.log(data);
            }

        })
    });
</script>

<script>
    jQuery(document).on('click', '.delete_document', function (e) {
        e.preventDefault();
        var imageId = $(this).val();
        var url = '{{ route("admin.staff.delete_document",":imageId") }}';
        url = url.replace(':imageId',imageId);
        $.ajax({
            url: url,
            contentType : false,
            processData : false,
            method: 'get',
            // data: formData,
            success: function(result)
            {
                alert(result);
                get_images();
                // location.reload();
            },
            error: function(data)
            {
                console.log(data);
            }
        });
    });
</script>

@endpush