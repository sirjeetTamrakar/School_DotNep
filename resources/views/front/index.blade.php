@extends('front.master')

@push('style')

<style>
    .slick-slide img{
        display:inline-block;
    }

    .modal.fade.popup-container{
        display:flex ;
        justify-content: center;
        align-items:center;
        overflow: hidden;
    }

    /* .show{
        display:flex !important;
        flex-direction: column;
    }

    .popup-container{
        display:flex !important;
        justify-content: center;
        align-items:center;
    } */

</style>
@endpush

@section('content')
<div class="banner">
    <div class="container">
        <div class="banner-carousel">

            @if($context->sliders->isNotEmpty())
            @foreach($context->sliders as $slider)
            <div>
                <div class="img-container">
                    <img src="{{ asset($slider->image) }}"
                                alt="{{ $slider->title }}"
                                class="img-fluid"
                    />
                </div>
                <div class="banner-title">
                    {{ $slider->title }}
                </div>
            </div>
            @endforeach
            @endif

        </div>
    </div>
</div>

<div class="welcome-container">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="about-wrapper">
                    <div class="main-title">
                        {{ getFrontLanguage('welcome-to') }}  "{{ isset($settings['name']) ? $settings['name'] : "High School" }}"
                    </div>
                    <div
                        class="description"
                        style="font-size: 16px; line-height: 30px;"
                    >
                    {!! isset($settings['welcome_message']) ? $settings['welcome_message'] : ''  !!}
                    </div>
                    <div class="button-container">
                        <a href="{{ route('front.about') }}" class="mybtn">{{ getFrontLanguage('read-more-1') }}</a>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="notice-carousel-wrapper">
                    <div class="info-title">
                        सूचना पाटी
                    </div>
                    <div class="notice-carousel">

                    @if($context->block_notices->isNotEmpty())
                    @foreach($context->block_notices as $notice)
                        <div>
                            <div class="item-wrapper">
                                <div class="detail">
                                    <a class="title" href="{{ route('front.singleNotice',[$notice->id,getNepaliDate($notice->created_at)]) }}">
                                        {{$notice->title}}
                                    </a>
                                    <div class="date">
                                        {{ getNepaliDate($notice->created_at) }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    @else
                    <div class="tab-item">
                        <div class="title">
                            <a href="">
                                No Notice Available !!
                            </a>
                        </div>
                    </div>
                @endif


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="other-section">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <div class="tab-container">
                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home"
                            >{{ getFrontLanguage('news-1') }}</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu1">{{ getFrontLanguage('tender-1')." ".getFrontLanguage('notice-1') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu2"
                            >{{ getFrontLanguage('event') }}</a
                            >
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#menu3"
                            >{{ getFrontLanguage('scholarship-1') }}</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane container active" id="home">
                            <div class="publication-wrapper">

                                @if($context->news->isNotEmpty())
                                            @foreach($context->news as $news)
                                            <div class="publication-item">
                                                <a class="title" href="{{ route('front.singleNews',[$news->id,getNepaliDate($news->created_at)]) }}">
                                                    {{ $news->title }}
                                                </a>
                                                <div class="date">
                                                    {{ isset($news->created_at)?$news->created_at->format('Y-m-d'):"" }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                <div class="button-container">
                                    <a href="{{ route('front.news') }}">थप पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="menu1">
                            <div class="publication-wrapper">

                                @if($context->tenders->isNotEmpty())
                                            @foreach($context->tenders as $news)
                                            <div class="publication-item">
                                                <a class="title" href="{{ route('front.singleNews',[$news->id,getNepaliDate($news->created_at)]) }}">
                                                    {{ $news->title }}
                                                </a>
                                                <div class="date">
                                                    {{ isset($news->created_at)?$news->created_at->format('Y-m-d'):"" }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                <div class="button-container">
                                    <a href="{{ route('front.tender') }}">थप पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="menu2">
                            <div class="publication-wrapper">

                                @if($context->events->isNotEmpty())
                                            @foreach($context->events as $news)
                                            <div class="publication-item">
                                                <a class="title" href="{{ route('front.singleNews',[$news->id,getNepaliDate($news->created_at)]) }}">
                                                    {{ $news->title }}
                                                </a>
                                                <div class="date">
                                                    {{ isset($news->created_at)?$news->created_at->format('Y-m-d'):"" }}
                                                </div>
                                            </div>
                                        @endforeach
                                    @endif
                                <div class="button-container">
                                    <a href="{{ route('front.events') }}">थप पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane container fade" id="menu3">
                            <div class="publication-wrapper">

                                @if($context->scholarships->isNotEmpty())
                                            @foreach($context->scholarships as $news)
                                        <div class="publication-item">
                                            <a class="title" href="{{ route('front.singleNews',[$news->id,getNepaliDate($news->created_at)]) }}">
                                                {{ $news->title }}
                                            </a>
                                            <div class="date">
                                                {{ isset($news->created_at)?$news->created_at->format('Y-m-d'):"" }}
                                            </div>
                                        </div>
                                        @endforeach
                                    @endif
                                <div class="button-container">
                                    <a href="{{ route('front.scholarship') }}">थप पढ्नुहोस्</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-5">
                <div class="officer-container">
                    <div class="office-title">
                        {{ getFrontLanguage('officer') }}
                    </div>

                    <div class="officer-item">
                        <div class="img-container">
                            <img
                                                    src="{{asset(isset($settings['adhyaksh_image']) ? 'thumbnail/'.$settings['adhyaksh_image']:'')}}"
                                                    alt=""
                                                    class="img-fluid"
                                            />
                        </div>
                        <div class="info">
                            <div class="name">{{isset($settings['adhyaksh_name']) ? $settings['adhyaksh_name']:''}}</div>
                            <div class="designation"> {{ getFrontLanguage('ward-chairman') }}</div>
                        </div>
                    </div>

                    <div class="officer-item">
                        <div class="img-container">
                            <img
                                                    src="{{asset(isset($settings['principal_image']) ? 'thumbnail/'.$settings['principal_image']:'')}}"
                                                    alt=""
                                                    class="img-fluid"
                                            />
                        </div>
                        <div class="info">
                            <div class="name">{{isset($settings['principal_name']) ? $settings['principal_name']:''}} </div>
                            <div class="designation"> {{ getFrontLanguage('principal') }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  

    <div class="facilities">
        <div class="main-title">
             {{ getFrontLanguage('gallery') }}
        </div>
        <div class="gallery-section">
        <div class="container">
            <div class="row">
                @if($albums->isNotEmpty())
                    @foreach($albums as $album)
                        <div class="col-md-4">
                            <div class="album-container">
                                <a href="{{ route('front.singleAlbum',$album->slug) }}">
                                    <div class="img-container">
                                        <img src="{{ asset(isset($album->gallerys) ? $album->gallerys->first()->image : 'front/assets/images/banner1.jpg') }}" alt="{{$album->title}}" />
                                    </div>
                                    <div class="overlay">
                                        <div class="view">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="album-title">
                                {{ $album->title }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-4">
                        <span>No Albums Present</span>
                    </div>
                @endif
            </div>
        </div>
    </div>
    </div>

    <div class="facilities">
        <div class="main-title">
            {{ getFrontLanguage('our-staff-members') }}
        </div>
        <div class="sub-title">
            Our generous and hardworking staff members.
        </div>
        <div class="container">
            <div class="teacherSlider">
                @foreach($context->staffs as $staff)
                    <div>
                        <div class="facility-item">
                            <div class="img-container">
                                <img
                                        src="{{ asset('thumbnail/'.$staff->image) }}"
                                        alt=""
                                        class="img-fluid"
                                />
                            </div>
                            <div class="facility-title">
                                {{$staff->name}}
                            </div>
                            <div class="facility-designation">
                                {{ $staff->job_title }}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>





    {{--<div class="facilities">--}}
        {{--<div class="main-title">--}}
            {{--{{ getFrontLanguage('facilities') }}--}}
        {{--</div>--}}
        {{--<div class="sub-title">--}}
            {{--Our School is equipped with many facilities--}}
        {{--</div>--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--@if($context->asset_categories->isNotEmpty())--}}
                    {{--@foreach($context->asset_categories as $category)--}}
                        {{--@dd($category)--}}
                        {{--<div class="col-md-4">--}}
                            {{--<div class="facility-item">--}}
                                {{--<div class="img-container">--}}
                                    {{--<img--}}
                                            {{--src="{{ asset( isset($category->preview_image) ? $category->preview_image :"front/assets/images/computerlab.jpg") }}"--}}
                                            {{--alt=""--}}
                                            {{--class="img-fluid"--}}
                                    {{--/>--}}
                                {{--</div>--}}
                                {{--<div class="facility-title">--}}
                                    {{--{{ $category->title }}--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--@endforeach--}}
                {{--@endif--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="counter-container">
        <div class="container">
            <div class="main-title">
                {{ getFrontLanguage('our-school-family') }}
            </div>
            <div class="sub-title">
                We strive towards success and greatness.
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <div class="counter">
                        <h2
                                class="timer count-title count-number"
                                data-to="{{ isset($settings['total_administrations']) ? $settings['total_administrations'] : "" }}"
                                data-speed="3000"
                        >{{ isset($settings['total_administrations']) ? $settings['total_administrations'] : "" }}</h2>
                        <p class="count-text ">{{ getFrontLanguage('administration-members') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter">
                        <h2
                                class="timer count-title count-number"
                                data-to="{{ isset($settings['total_teachers']) ? $settings['total_teachers'] : "" }}"
                                data-speed="3000"
                        >{{ isset($settings['total_teachers']) ? $settings['total_teachers'] : "" }}</h2>
                        <p class="count-text ">{{ getFrontLanguage('our-excellent-teachers') }}</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="counter">
                        <h2
                                class="timer count-title count-number"
                                data-to="{{ isset($settings['total_student']) ? $settings['total_student'] : "" }}"
                                data-speed="3000"
                        >{{ isset($settings['total_student']) ? $settings['total_student'] : "" }}</h2>
                        <p class="count-text ">{{ getFrontLanguage('our-genius-students') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{--<div class="testimonial-container">--}}
        {{--<div--}}
                {{--id="testimonialCarousel"--}}
                {{--class="carousel slide"--}}
                {{--data-ride="carousel"--}}
        {{-->--}}
            {{--<ul class="carousel-indicators">--}}
                {{--<li--}}
                        {{--data-target="#hospitalCarousel"--}}
                        {{--data-slide-to="0"--}}
                        {{--class="active"--}}
                {{--></li>--}}
                {{--<li data-target="#hospitalCarousel" data-slide-to="1"></li>--}}
                {{--<li data-target="#hospitalCarousel" data-slide-to="2"></li>--}}
            {{--</ul>--}}

            {{--<div class="carousel-inner">--}}
                {{--@if($context->testimonials->isNotEmpty())--}}
                    {{--@foreach($context->testimonials as $testimonial)--}}
                    {{--<div class="carousel-item @if($context->testimonials[0]->id == $testimonial->id)active @endif">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="testimonial-wrapper">--}}
                                    {{--<div class="title">{{ getFrontLanguage('what-people-are-saying') }}</div>--}}
                                    {{--<p>--}}
                                        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
                                        {{--Aperiam aliquid unde magni aspernatur excepturi nobis--}}
                                        {{--nihil,--}}
                                    {{--</p>--}}
                                    {{--<p>--}}
                                        {{--Lorem ipsum dolor sit amet, consectetur adipisicing elit.--}}
                                        {{--Libero sequi, est quas distinctio atque, debitis--}}
                                        {{--voluptatum--}}
                                    {{--</p>--}}
                                    {{--<div class="name">{{$testimonial->name}}</div>--}}
                                    {{--<div class="designation">--}}
                                        {{--{{ $testimonial->designation }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<div class="img-container">--}}
                                    {{--<img--}}
                                            {{--src="{{ asset(isset($testimonial->image) ? 'thumbnail/'.$testimonial->image :$settings['logo'] ) }}"--}}
                                            {{--alt=""--}}
                                            {{--class="img-fluid"--}}
                                    {{--/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--@endforeach--}}
                {{--@else--}}
                    {{--<div class="carousel-item active">--}}
                        {{--<div class="row">--}}
                            {{--<div class="col-md-6">--}}
                                {{--<div class="testimonial-wrapper">--}}
                                    {{--<div class="title">{{ getFrontLanguage('what-people-are-saying') }}</div>--}}
                                    {{--<p>--}}
                                        {{--No Testimonials Available--}}
                                    {{--</p>--}}
                                    {{--<div class="name">David</div>--}}
                                    {{--<div class="designation">--}}
                                        {{--Admin--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}

                            {{--<div class="col-md-6">--}}
                                {{--<div class="img-container">--}}
                                    {{--<img--}}
                                            {{--src="{{ asset(isset($settings['logo'])?$settings['logo']:'') }}"--}}
                                            {{--alt=""--}}
                                            {{--class="img-fluid"--}}
                                    {{--/>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--@endif--}}
            {{--</div>--}}

            {{--<a--}}
                    {{--class="carousel-control-prev"--}}
                    {{--href="#testimonialCarousel"--}}
                    {{--data-slide="prev"--}}
            {{-->--}}
                {{--<span class="carousel-control-prev-icon"></span>--}}
            {{--</a>--}}
            {{--<a--}}
                    {{--class="carousel-control-next"--}}
                    {{--href="#testimonialCarousel"--}}
                    {{--data-slide="next"--}}
            {{-->--}}
                {{--<span class="carousel-control-next-icon"></span>--}}
            {{--</a>--}}
        {{--</div>--}}
    {{--</div>--}}
    @if(isset($popups))
        @foreach ($popups as $popup)
            <div class="modal fade popup-container" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <!-- <h5 class="modal-title" id="exampleModalLabel">{{ $popup->title }}</h5> -->
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <img src="{{ asset($popup->image) }}" alt="">
                    </div>
            </div>
            </div>
        </div>
      @endforeach
      @endif

@endsection

@push('script')


<script>
        window.onload = function(){
            $('.modal').modal('show');
        }
    </script>
<script>
    $(".teacherSlider").slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: true,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });

</script>

@endpush
