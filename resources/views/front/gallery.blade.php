@extends('front.master')

@push('style')
@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage']) ? $settings['bannerImage']: "") }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Gallery
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('gallery') }}
            </li>
        </ol>
    </nav>
    <div class="gallery-section">
        <div class="container">
            <div class="main-title">
                Albums
            </div>
            <div class="row">
                @if($albums->isNotEmpty())
                    @foreach($albums as $album)
                        <div class="col-md-4">
                            <div class="album-container">
                                <a href="{{ route('front.singleAlbum',$album->slug) }}">
                                    <div class="img-container">
                                        <img src="{{ asset(isset($album->gallerys) ? $album->gallerys->first()->image : 'front/assets/images/banner1.jpg') }}" alt="{{$album->title}}" />
                                    </div>
                                    <div class="overlay">
                                        <div class="view">
                                            <i class="fa fa-eye"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="album-title">
                                {{ $album->title }}
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-4">
                        <span>No Albums Present</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush