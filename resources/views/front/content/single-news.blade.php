@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getLanguage('news') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('front.news') }}">News</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                News Title
            </li>
        </ol>
    </nav>
    <div class="news-notice-section">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-section">
                        <div class="news-section">

                            <div class="news-wrapper">
                                <div class="img-container">
                                    <img
                                            src="{{ asset($news->image) }}"
                                            alt=""
                                            class="img-fluid"
                                    />
                                </div>
                                <div class="title">
                                    {{ $news->title }}
                                </div>
                                <div class="long-description">
                                    <p>{!! $news->content !!}</p>
                                </div>
                                <div class="date">
                                    March 10, 2020
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">Recent News</div>
                        @if($context->recent_news->isNotEmpty())
                            <ul>
                                @foreach($context->recent_news as $news)
                                    <li>
                                        <a href="{{ route('front.singleNews',[$news->id, getNepaliDate($news->created_at)]) }}">{{$news->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent news to show.</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush