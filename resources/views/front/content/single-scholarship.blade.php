@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('scholarship-1') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}"><i class="fa fa-home"> </i> Home</a></li>

            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('scholarship-1') }}
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
                                    {{ $scholarship->title }}
                                </div>
                                <div class="long-description">
                                    <p>{!! $scholarship->content !!}</p>

                                </div>
                                <div class="download-title">
                                    File Attachment
                                </div>
                                <ul>
                                    @if(isset($scholarship->file))
                                        <li>
                                            <div class="document-name">
                                                This is the document that can be download.
                                            </div>
                                            <div class="download-icon">
                                                <a href="{{ asset($scholarship->file) }}" target="_blank"> <i class="fa fa-download"></i></a>
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
                                    Publish Date: {{ getNepaliDate($scholarship->created_at) }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar-section">
                        <div class="sidebar-title">Other Scholarships</div>
                        @if($context->recent_scholarships->isNotEmpty())
                            <ul>
                                @foreach($context->recent_scholarships as $scholar)
                                    <li>
                                        <a href="{{ route('front.singleScholarship',[$scholar->id,getNepaliDate($scholar->created_at)]) }}">{{$scholar->title}}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @else
                            <span>No recent scholarship to show.</span>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush