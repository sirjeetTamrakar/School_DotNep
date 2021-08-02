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
                <a href="{{ route('front.teachers') }}" style="color: #2a98ef;"
                >Teachers &nbsp >> &nbsp</a
                >
            </li>
            <li class="active" style="color: #000;">Teacher Details</li>
        </ol>
    </div>
    <section class="main-inner-section">
        <div class="container">
            <h1 class="inner-section-title">{{ $teacher->name }}</h1>
            {{--<p class="inner-section-subject">"The Human Computer"</p>--}}
            <div class="row">
                <div class="col-lg-5 col-md-12">
                    <div class="single-teacher-img">
                        <img
                                src="{{ asset($teacher->image) }}"
                                alt="{{ $teacher->name }}"
                                class="profile"
                        />
                        <div class="d-flex justify-content-center">
                            <div
                                    class="social-share-wrapper d-sm-flex justify-content-center"
                            >
                                <div class="social-share-block facebook">
                                    <a title="Share on Facebook" target="_blank" href="#">
                                        <div class="social-share-icon-block">
                                            <img
                                                    src="https://www.finbyz.com/static/media/svg/social-facebook.svg"
                                                    title="facebook.com/Finbyz"
                                                    alt="facebook.com/Finbyz"
                                            />
                                            <span class="share-text">Share</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="social-share-block twitter ">
                                    <a title="Share on Twitter" target="_blank" href="#">
                                        <div class="social-share-icon-block">
                                            <img
                                                    src="https://www.finbyz.com/static/media/svg/social-twitter.svg"
                                                    alt="Twitter/FinByz"
                                                    title="Twitter/FinByz"
                                            />
                                            <span class="share-text">Tweet</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="social-share-block linkedin">
                                    <a title="Share on LinkedIn" target="_blank" href="#">
                                        <div class="social-share-icon-block">
                                            <img
                                                    src="https://www.finbyz.com/static/media/svg/social-linkedin.svg"
                                                    alt="linkedin/finbyz"
                                                    title="linkedin/finbyz"
                                            />
                                            <span class="share-text">Share</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="social-share-block email">
                                    <a title="Share via Email" href="#">
                                        <div class="social-share-icon-block">
                                            <img
                                                    src="https://www.finbyz.com/static/media/svg/social-mail.svg"
                                                    alt="EMIAL/finbyz"
                                                    title="EMIAL/finbyz"
                                            />
                                            <span class="share-text">Email</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 col-md-12">
                    <div class="single-bio-details">
                        <ul>
                            <li><strong>Full name: </strong> {{ $teacher->name }}</li>
                            {{--<li>--}}
                                {{--<strong>Education: </strong> BA, Mathematics, Kathmadu Model--}}
                                {{--College--}}
                            {{--</li>--}}
                            <li><strong>Position: </strong> {{ $teacher->job_title }}</li>
                            <li><str    ong>Email: </strong> {{ $teacher->email }}</li>
                            <li><strong>Phone: </strong> {{ $teacher->phone }}</li>
                            <li><strong>Date Joined: </strong>{{ $teacher->join_date }}</li>
                        </ul>
                        <div class="single-short-bio">
                            <h2>A Short Bio</h2>
                            <p>
                                Those who speak of NASA's pioneers rarely mention the name
                                Dorothy Vaughan, but as the head of the NACA's segregated West
                                Area Computing Unit, Vaughan was both a respected
                                mathematician and NASA's first African-American manager.
                            </p>

                            <p>
                                Dorothy Vaughan was assigned to the segregated "West Area
                                Computing" unit, an all-black group of female mathematicians,
                                who were originally required to use separate dining and
                                bathroom facilities. Over time, both individually and as a
                                group, the West Computers distinguished themselves with
                                contributions to virtually every area of research at Langley.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
@endpush