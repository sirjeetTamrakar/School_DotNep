@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Message
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                Principal Note
            </li>
        </ol>
    </nav>
    <div class="mission-section">
        <div class="container m-b-30">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-container">
                        <img src="{{ asset(isset($settings['principal_image']) ? 'thumbnail/'.$settings['principal_image']: 'front/assets/images/about.jpg') }}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mission-title">
                        Message From Principal
                    </div>
                    <div class="mission-detail">
                        {!! isset($settings['principal_message']) ? $settings['principal_message']: '' !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="img-container">
                        <img src="{{ asset(isset($settings['adhyaksh_image']) ? 'thumbnail/'.$settings['adhyaksh_image']: 'front/assets/images/about.jpg') }}" alt="" class="img-fluid" />
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="mission-title">
                        Message From Adhyaksha
                    </div>
                    <div class="mission-detail">
                        {!! isset($settings['adhyaksh_message']) ? $settings['adhyaksh_message']: '' !!}
                    </div>
                </div>
            </div>
        </div>
            {{--<div class="title">--}}
                {{--Principal Brief Speech--}}
            {{--</div>--}}
            {{--<div class="overview-detail">--}}
                {{--<p>--}}
                    {{--Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed--}}
                    {{--voluptatum eos debitis repellat cumque necessitatibus numquam--}}
                    {{--sapiente, ab deleniti consequuntur in, iure mollitia illum natus--}}
                    {{--iste facere nesciunt, perspiciatis assumenda. Lorem ipsum dolor--}}
                    {{--sit amet consectetur adipisicing elit. Consequatur labore nostrum--}}
                    {{--commodi provident illum ut quasi totam harum, ipsum mollitia--}}
                    {{--facere culpa cupiditate quibusdam ratione, saepe, quae dolorum--}}
                    {{--corporis itaque?--}}
                {{--</p>--}}
                {{--<p>--}}
                    {{--Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed--}}
                    {{--voluptatum eos debitis repellat cumque necessitatibus numquam--}}
                    {{--sapiente, ab deleniti consequuntur in, iure mollitia illum natus--}}
                    {{--iste facere nesciunt, perspiciatis assumenda. Lorem ipsum dolor--}}
                    {{--sit amet consectetur adipisicing elit. Consequatur labore nostrum--}}
                    {{--commodi provident illum ut quasi totam harum, ipsum mollitia--}}
                    {{--facere culpa cupiditate quibusdam ratione, saepe, quae dolorum--}}
                    {{--corporis itaque?--}}
                {{--</p>--}}
            {{--</div>--}}
        </div>
    </div>

@endsection

@push('script')
@endpush