@extends('front.master')

@push('style')
@endpush

@section('content')


    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('news-1') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('news-1') }}
            </li>
        </ol>
    </nav>
    <div class="news-notice-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-section">
                        <div class="news-section">
                            <div class="row">
                                @if($context->news->isNotEmpty())
                                    @foreach($context->news as $news)
                                        <div class="col-md-6">
                                            <a href="{{ route('front.singleNews',[$news->id, getNepaliDate($news->created_at)]) }}">
                                                <div class="img-container">
                                                    <img
                                                            src="{{ asset(isset($news->image)? $news->image:"front/assets/images/banner1.jpg") }}"
                                                            alt=""
                                                            class="img-fluid"
                                                    />
                                                    <div class="overlay">
                                                        <div class="title">
                                                            {{$news->title}}
                                                        </div>
                                                        <div class="date">March 03, 2020</div>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    @endforeach
                                @else
                                    <div>
                                        No News To Display !!
                                    </div>
                                @endif

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">{{ getFrontLanguage('recent') }} {{getFrontLanguage('notice-1')}}</div>
                        @if($context->recent_notices->isNotEmpty())
                            <ul>
                                @foreach($context->recent_notices as $notice)
                                    <li>
                                        <a href="{{ route('front.singleNews',[$notice->id, getNepaliDate($notice->created_at)]) }}">{{$notice->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent notices to show.</span>
                        @endif
                    </div>
                        <hr />
                    <div class="sidebar-section">
                        <div class="sidebar-title">{{ getFrontLanguage('recent') }} {{getFrontLanguage('event')}}</div>
                        @if($context->recent_events->isNotEmpty())
                            <ul>
                                @foreach($context->recent_events as $event)
                                    <li>
                                        <a href="{{ route('front.singleEvent',[$event->id, getNepaliDate($event->created_at)]) }}">{{ $event->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent events to show.</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush