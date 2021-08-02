@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Events
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('front.events') }}">Events</a></li>

            <li class="breadcrumb-item active" aria-current="page">
                {{ $event->title }}
            </li>
        </ol>
    </nav>
    <div class="news-notice-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-section">
                        <div class="event-section">
                            <div class="event-wrapper">
                                <!--<div class="img-container">-->
                                <!--    <img-->
                                <!--            src="{{ asset($event->image) }}"-->
                                <!--            alt=""-->
                                <!--            class="img-fluid"-->
                                <!--    />-->
                                <!--</div>-->
                                <div class="title">
                                    {{ $event->title }}
                                </div>
                                <div class="long-description">
                                    <p>{!! $event->content !!} </p>
                                </div>
                                <div class="date">
                                    {{ $event->event_date }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">Recent Events</div>
                        @if($context->recent_events->isNotEmpty())
                            <ul>
                                @foreach($context->recent_events as $event)
                                    <li>
                                        <a href="{{ route('front.singleEvent', [$event->id,getNepaliDate($event->created_at)]) }}">{{ $event->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush