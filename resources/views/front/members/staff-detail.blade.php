@extends('front.master')

@push('style')
@endpush

@section('content')

    <div style="background-color: #E9ECEF;">
        <ol
                class="breadcrumb breadcrumb-fill0 container"
                style="background-color: #E9ECEF;"
        >
            <li>
                <a href="{{ route('front.home') }}" style="color: #2a98ef;"
                ><i class="fa fa-home"></i> Home &nbsp >> &nbsp</a
                >
            </li>
            <li>
                <a href="{{ route('front.staffs',$staffType->slug) }}" style="color: #2a98ef;"
                >Teachers &nbsp >> &nbsp</a
                >
            </li>
            <li class="active" style="color: #000;">Staff Details</li>
        </ol>
    </div>
    <section class="main-inner-section">
        <div class="container">
            <h1 class="inner-section-title">{{ $staff->name }}</h1>
            {{--<p class="inner-section-subject">"The Human Computer"</p>--}}
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="single-teacher-img">
                        <img
                                src="{{ asset($staff->image) }}"
                                alt="{{ $staff->name }}"
                                class="profile"
                        />
                        {{--<div class="d-flex justify-content-center">--}}
                            {{--<div--}}
                                    {{--class="social-share-wrapper d-sm-flex justify-content-center"--}}
                            {{-->--}}
                                {{--<div class="social-share-block facebook">--}}
                                    {{--<a title="Share on Facebook" target="_blank" href="#">--}}
                                        {{--<div class="social-share-icon-block">--}}
                                            {{--<img--}}
                                                    {{--src="https://www.finbyz.com/static/media/svg/social-facebook.svg"--}}
                                                    {{--title="facebook.com/Finbyz"--}}
                                                    {{--alt="facebook.com/Finbyz"--}}
                                            {{--/>--}}
                                            {{--<span class="share-text">Share</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="social-share-block twitter ">--}}
                                    {{--<a title="Share on Twitter" target="_blank" href="#">--}}
                                        {{--<div class="social-share-icon-block">--}}
                                            {{--<img--}}
                                                    {{--src="https://www.finbyz.com/static/media/svg/social-twitter.svg"--}}
                                                    {{--alt="Twitter/FinByz"--}}
                                                    {{--title="Twitter/FinByz"--}}
                                            {{--/>--}}
                                            {{--<span class="share-text">Tweet</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="social-share-block linkedin">--}}
                                    {{--<a title="Share on LinkedIn" target="_blank" href="#">--}}
                                        {{--<div class="social-share-icon-block">--}}
                                            {{--<img--}}
                                                    {{--src="https://www.finbyz.com/static/media/svg/social-linkedin.svg"--}}
                                                    {{--alt="linkedin/finbyz"--}}
                                                    {{--title="linkedin/finbyz"--}}
                                            {{--/>--}}
                                            {{--<span class="share-text">Share</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                                {{--<div class="social-share-block email">--}}
                                    {{--<a title="Share via Email" href="#">--}}
                                        {{--<div class="social-share-icon-block">--}}
                                            {{--<img--}}
                                                    {{--src="https://www.finbyz.com/static/media/svg/social-mail.svg"--}}
                                                    {{--alt="EMIAL/finbyz"--}}
                                                    {{--title="EMIAL/finbyz"--}}
                                            {{--/>--}}
                                            {{--<span class="share-text">Email</span>--}}
                                        {{--</div>--}}
                                    {{--</a>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="single-bio-details">
                        <ul>
                            <li><strong>{{ getFrontLanguage('full-name-1') }}: </strong> {{ $staff->name }}</li>
                            {{--<li>--}}
                                {{--<strong>Education: </strong> BA, Mathematics, Kathmadu Model--}}
                                {{--College--}}
                            {{--</li>--}}
                            <li><strong>{{ getFrontLanguage('position') }}: </strong> {{ $staff->job_title }}</li>
                            <li><strong>{{ getFrontLanguage('email-1') }}: </strong> {{ $staff->email }}</li>
                            <li><strong>{{ getFrontLanguage('phone-1') }}: </strong> {{ $staff->phone }}</li>
                            <li><strong>{{ getFrontLanguage('date-joined') }}: </strong>{{ $staff->join_date }}</li>
                        </ul>
                        @if($staff->description)
                            <div class="single-short-bio">
                                <h2>{{ getFrontLanguage('a-short-bio') }}</h2>
                                <p>
                                    {!! $staff->description !!}
                                </p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
@endpush