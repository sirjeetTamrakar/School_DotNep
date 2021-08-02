@extends('front.master')

@push('style')
<link  rel ="stylesheet" href="{{ asset('front/assets/css/about.css') }}"/>
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset( isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('about-us') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('about-us') }}
            </li>
        </ol>
    </nav>
    <div class="about-section">
        <div class="container">
            <div class="row">
                {{--<div class="col-md-5">--}}
                    {{--<div class="img-container">--}}
                        {{--<img src="assets/images/about.jpg" alt="" class="img-fluid" />--}}
                    {{--</div>--}}
                {{--</div>--}}
                <div class="col-md-12">
                    <div class="about-title">
                        {{ getFrontLanguage('about-us') }}
                    </div>
                    <div class="about-detail">
                        {!! isset($settings['about']) ? $settings['about'] : "" !!}
                    </div>
                </div>
            </div>
            {{--<div class="title">--}}
                {{--{{ getFrontLanguage('school-history') }}--}}
            {{--</div>--}}
            {{--<div class="about-detail">--}}
                {{--<p>--}}
                    {{--{!! isset($settings['history']) ? $settings['history']: "" !!}--}}
                {{--</p>--}}
            {{--</div>--}}
        </div>
        <div class="counter-container">
            <div class="container">
                <div class="row text-center">
                    <div class="col-md-4">
                        <div class="counter">
                            <h2
                                    class="timer count-title count-number"
                                    data-to="{{ isset($settings['total_administrations']) ? $settings['total_administrations'] : "" }}"
                                    data-speed="3000"
                            ></h2>
                            <p class="count-text ">{{ getFrontLanguage('administration-members') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter">
                            <h2
                                    class="timer count-title count-number"
                                    data-to="{{ isset($settings['total_teachers']) ? $settings['total_teachers'] : "" }}"
                                    data-speed="3000"
                            ></h2>
                            <p class="count-text ">{{ getFrontLanguage('our-excellent-teachers') }}</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="counter">
                            <h2
                                    class="timer count-title count-number"
                                    data-to="{{ isset($settings['total_student']) ? $settings['total_student'] : "" }}"
                                    data-speed="2000"
                            ></h2>
                            <p class="count-text ">{{ getFrontLanguage('our-genius-students') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush