@extends('front.master')

@push('style')
    <style>
        .noticeImage-img{
            width: 100%;
            height: auto;
        }
    </style>
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Notice Detail
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('front.notice') }}">Notice</a></li>
            <li class="breadcrumb-item active" aria-current="page">
               {{ $notice->title }}
            </li>
        </ol>
    </nav>
    <div class="news-notice-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-section">
                        <div class="notice-section">
                            <div class="notice-detail-wrapper">
                                <div class="main-title">
                                    {{ $notice->title }}
                                </div>
                                @if(isset($notice->image))
                                    <div class="noticeImage">
                                        <img class="noticeImage-img" src="{{asset($notice->image)}}" alt="">
                                    </div>
                                @endif
                                <div class="long-description">
                                    <p>
                                        {!! $notice->content  !!}
                                    </p>
                                </div>
                                <div class="date">
                                    {{ isset($notice->created_at) ? $notice->created_at->format('Y-m-d') : '' }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">Recent Notices</div>
                        @if($context->recent_notices->isNotEmpty())
                            <ul>
                                @foreach($context->recent_notices as $notice)
                                    <li>
                                        <a href="{{ route('front.singleNotice',[$notice->id, getNepaliDate($notice->created_at)]) }}">{{$notice->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent notices to show.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush