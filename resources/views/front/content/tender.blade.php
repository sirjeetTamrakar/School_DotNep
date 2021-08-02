@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('tender-1')."  ".getFrontLanguage('notice-1') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="{{ route('front.home') }}"><i class="fa fa-home"> </i>{{ getFrontLanguage('home') }}</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('tender-1') }}
            </li>
        </ol>
    </nav>
    <div class="news-notice-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-section">
                        @if($context->tenders->isNotEmpty())
                            <div class="notice-section">
                            @foreach($context->tenders as $tender)
                                    <div class="notice-wrapper">
                                        <div class="title">
                                            {{ $tender->title }}
                                        </div>
                                        {{--<div class="short-description">--}}
                                            {{--{!! substr($tender->content,0,300) !!}--}}
                                        {{--</div>--}}
                                        <div class="date">
                                            Publish Date: {{ getNepaliDate($tender->created_at) }}
                                        </div>
                                        <div class="button-container">
                                            <a href="{{ route('front.singleTender',[$tender->id, getNepaliDate($tender->created_at)]) }}">{{ getFrontLanguage('view-detail') }}</a>
                                        </div>
                                    </div>
                            @endforeach
                            </div>
                        @endif
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">{{ getFrontLanguage('recent') }} {{getFrontLanguage('news-1')}}</div>
                        @if($context->recent_news->isNotEmpty())
                            <ul>
                                @foreach($context->recent_news as $news)
                                    <li>
                                        <a href="{{ route('front.singleNews',[$news->id,getNepaliDate($news->created_at)]) }}">{{$news->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent news to show.</span>
                        @endif
                    </div>
                        <hr />
                    <div class="sidebar-section">
                        <div class="sidebar-title">{{ getFrontLanguage('recent') }} {{getFrontLanguage('event')}}</div>
                        @if($context->recent_events->isNotEmpty())
                            <ul>
                                @foreach($context->recent_events as $event)
                                    <li>
                                        <a href="{{ route('front.singleEvent',[$event->id,getNepaliDate($event->created_at)]) }}">{{ $event->title }}</a>
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