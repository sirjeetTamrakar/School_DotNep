@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('event') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('event') }}
            </li>
        </ol>
    </nav>
    <div class="news-notice-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-section">
                        <div class="event-section">
                            @if($context->events->isNotEmpty())
                                @foreach($context->events as $event)
                                    <div class="row">
                                        <div class="col-md-4">
                                            <a href="{{ route('front.singleEvent',[$event->id,getNepaliDate($event->created_at)]) }}">
                                                <div class="img-container">
                                                    <img
                                                            src="{{ asset('thumbnail/'.$event->image) }}"
                                                            alt=""
                                                            class="img-fluid"
                                                    />
                                                </div>
                                            </a>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="title">
                                                <a href="{{ route('front.singleEvent',[$event->id, getNepaliDate($event->created_at)]) }}">
                                                    {{ $event->title }}
                                                </a>
                                            </div>
                                            <!--<div class="short-description">-->
                                            <!--    {!! substr($event->content,0,500) !!}-->
                                            <!--</div>-->
                                            <div class="date">{{ getNepaliDate($event->created_at) }}</div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
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
                                        <a href="{{ route('front.singleNotice',[$notice->id, getNepaliDate($notice->created_at)]) }}">{{$notice->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent news to show.</span>
                        @endif
                    </div>
                    <hr />
                    <div class="sidebar-section">
                        <div class="sidebar-title">{{ getFrontLanguage('recent') }} {{getFrontLanguage('news-1')}}</div>
                        @if($context->recent_news->isNotEmpty())
                            <ul>
                                @foreach($context->recent_news as $news)
                                    <li>
                                        <a href="{{ route('front.singleNews',[$news->id, getNepaliDate($news->created_at)]) }}">{{ $news->title }}</a>
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