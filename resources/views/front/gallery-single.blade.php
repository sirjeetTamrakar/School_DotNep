
@extends('front.master')

@push('style')
<link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
            integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI="
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
            integrity="sha256-4hqlsNP9KM6+2eA8VUT0kk4RsMRTeS7QGHIM+MZ5sLY="
            crossorigin="anonymous"
    />
    <!-- font awesome -->
    <link
            rel="stylesheet"
            href="https://use.fontawesome.com/releases/v5.6.3/css/all.css"
            integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/"
            crossorigin="anonymous"
    />
<style>

    #demo {
        height:100%;
        position:relative;
        overflow:hidden;
    }


    .green{
        background-color:#6fb936;
    }
    .thumb{
        margin-bottom: 30px;
    }

    .page-top{
        margin-top:85px;
    }


    img.zoom {
        width: 100%;
        height: 200px;
        border-radius:5px;
        object-fit:cover;
        -webkit-transition: all .3s ease-in-out;
        -moz-transition: all .3s ease-in-out;
        -o-transition: all .3s ease-in-out;
        -ms-transition: all .3s ease-in-out;
    }


    .transition {
        -webkit-transform: scale(1.2);
        -moz-transform: scale(1.2);
        -o-transform: scale(1.2);
        transform: scale(1.2);
    }
    .modal-header {

        border-bottom: none;
    }
    .modal-title {
        color:#000;
    }
    .modal-footer{
        display:none;
    }

</style>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">


@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset($galleries->first()->image) }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Album
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('front.gallery') }}">Gallery</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ $album->title }}
            </li>
        </ol>
    </nav>
    <div class="container page-top">
        <div class="row">
            @if($galleries->isNotEmpty())
                @foreach($galleries as $gallery)
            <div class="col-lg-3 col-md-4 col-xs-6 thumb">
                <a href="{{ asset($gallery->image) }}" class="fancybox" rel="ligthbox">
                    <img  src="{{ asset('thumbnail/'.$gallery->image) }}" class="zoom img-fluid "  alt="">

                </a>
            </div>
            @endforeach
            @endif
        </div>
    </div>

@endsection

@push('script')

<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<script>
    $(document).ready(function(){
        $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
        });

        $(".zoom").hover(function(){

            $(this).addClass('transition');
        }, function(){

            $(this).removeClass('transition');
        });
    });

</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
            integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0="
            crossorigin="anonymous"></script>
    <script>
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav"
        });
        $(".slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>

@endpush
