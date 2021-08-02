@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('download') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}"><i class="fa fa-home"> </i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('download') }}
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
                                    {{ $download->title }}
                                </div>
                                <div class="long-description">
                                    <p>{!! $download->content !!}</p>

                                </div>
                                <div class="download-title">
                                    {{ getFrontLanguage('file-attachment') }}
                                </div>
                                <ul>
                                    @if(isset($download->file))
                                        <li>
                                            <div class="document-name">
                                                This is the document that can be downloaded.
                                            </div>
                                            <div class="download-icon">
                                                <a href="{{ asset($download->file) }}" target="_blank"> <i class="fa fa-download"></i></a>
                                            </div>
                                        </li>
                                    @else
                                        <li>
                                            <div class="document-name">
                                                No Attachments Available.
                                            </div>
                                        </li>
                                    @endif
                                </ul>
                                <div class="date">
                                    Publish Date: {{ getNepaliDate($download->created_at) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">{{ getFrontLanguage('recent') }} {{ getFrontLanguage('download') }}</div>
                        @if($context->recent_downloads->isNotEmpty())
                            <ul>
                                @foreach($context->recent_downloads as $down)
                                    <li>
                                        <a href="{{ route('front.singleTender',[$down->id,getNepaliDate($down->created_at)]) }}">{{$down->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent downloads to show.</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush