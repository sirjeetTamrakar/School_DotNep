
@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}
<style>
    .preview_image img{
        max-width: 200px;
        height: auto;
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
                    <li class="breadcrumb-item "><a href="{{ route('admin.assets') }}">Asset</a></li>
                    <li class="breadcrumb-item active"><a href="#">{{ $asset->title }}</a></li>
                </ol>
            </div>
            <h5 class="page-title">Name : {{ $asset->title }}</h5>
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
                    <h5 class="text-center" id="title">Image Upload Section For {{ $asset->title }}:</h5>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="jumbotron">
                                <h3 class="text-center" id="no_image" style="display: none;">
                                    No images in this asset. Upload Below.
                                </h3>
                                <div class="alert alert-danger print-error-msg" style="display:none">
                                    <ul></ul>
                                </div>
                                <div class="row preview_image">
                                </div>
                                <br>
                                <hr><hr>
                                <div class="row">
                                    <div class="col-md-4 form-group">
                                        <label for="">Image File</label>
                                        <input id="image_submit" type="file" name="asset_image" class="form-control">
                                        <span style="color: red">* Maximum File Size : 1 MB *</span>
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
            url: '{{ route('admin.asset.get_image',$asset->id) }}',
            contentType : false,
            processData : false,
            method: 'get',
            // data: formData,
            success: function(result)
            {
                $('.preview_image').empty();
                var images = result;
                if(images.length < 1){
//                    console.log('No Images');
                    $('#no_image').show();
                }
                else {
                    $('#no_image').hide();
                    $.each(images, function (key, value) {
                        var url = '{{asset(':url')}}';
                        url = url.replace(":url", value.image);
                        var preview = jQuery("<div class='col-md-3'>" +
                            "<div class='card'>" +
                            "<div class='card-body text-center'>" +
                            "<a href='" + url + "' >" +
                            "<img src='" + url + "' alt='Click To View File' style='height: 100px; width: auto' />" +
                            "</a>" +
                            "</div>" +
                            "<div class='card-footer text-center'>" +
                            "<button class='btn btn-danger text-center delete_document' value='" + value.id + "'>delete</button>" +
                            "<br>" +
                            "</div>" +
                            "</div>" +
                            "</div>");

                        $('.preview_image').append(preview);
                    })
                }
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
    $('#image_submit').on('change',function(){
        console.log('adasa');
        var formData = new FormData();
        var myFile = $('#image_submit').prop('files')[0];
//        console.log(myFile);
        $(".print-error-msg").css('display','none');
        formData.append('asset_image',myFile);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content'),
            }
        });

        $.ajax({
            url: '{{ route("admin.asset.upload",$asset->id)}}',
            contentType: false,
            processData: false,
            method: 'POST',
            data : formData,

            success: function(result)
            {
                console.log(result);
                get_images();
                $("#image_submit").val(null);

            },
            error: function(data)
            {
                printErrorMsg(data.responseJSON.error);
                $("#image_submit").val(null);
                document.getElementById('title').scrollIntoView({behavior: "smooth", block: "end", inline: "nearest"});
            }

        })
    });
    function printErrorMsg (msg) {
        $(".print-error-msg").find("ul").html('');
        $(".print-error-msg").css('display','block');
        $.each( msg, function( key, value ) {
            $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
        });
    }
</script>

<script>
    jQuery(document).on('click', '.delete_document', function (e) {
        e.preventDefault();
        var imageId = $(this).val();
        var url = '{{ route("admin.asset.image_delete",":imageId") }}';
        url = url.replace(':imageId',imageId);
        $.ajax({
            url: url,
            contentType : false,
            processData : false,
            method: 'get',
            // data: formData,
            success: function(result)
            {
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