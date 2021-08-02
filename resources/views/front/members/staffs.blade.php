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
            <li class="active" style="color: black;">Staffs</li>
        </ol>
    </div>

    <section class="main-inner-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-6">
                    <div class="inner-container">
                        <h1 class="inner-page-tite">{{ $context->staffType->title }}</h1>
                        <p>
                            {{ $context->staffType->remarks }}
                        </p>
                        <div class="inner--container">
                            <div class="row">
                                @if($context->staffs->isNotEmpty())
                                    @foreach($context->staffs as $staff)

                                    <div class="col-md-4 col-6">
                                        <div class="single-item">

                                            <div
                                                    class="single-item-img"
                                                    style="
                                                        background-image: url('{{asset('thumbnail/'.$staff->image)}}');
                                                    "
                                            ></div>
                                            <div class="content-title">
                                                {{ $staff->name }}
                                            </div>
                                            <div class="morebtn">
                                                <a href="{{ route('front.staffDetail',[$staff->id,$context->staffType->slug]) }}">
                                                    View More
                                                </a>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>

                        {{--<nav aria-label="Page navigation example text-center">--}}
                            {{--<ul class="pagination justify-content-center">--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link" href="#">Previous</a>--}}
                                {{--</li>--}}
                                {{--<li class="page-item"><a class="page-link" href="#">1</a></li>--}}
                                {{--<li class="page-item"><a class="page-link" href="#">2</a></li>--}}
                                {{--<li class="page-item"><a class="page-link" href="#">3</a></li>--}}
                                {{--<li class="page-item">--}}
                                    {{--<a class="page-link" href="#">Next</a>--}}
                                {{--</li>--}}
                            {{--</ul>--}}
                        {{--</nav>--}}
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="eventTemplate">
                        <div class="main-title">
                            Notice
                        </div>

                        <div class="tab-pane container active">
                            <div class="tab-detail">
                            @if($context->recent_notices->isNotEMpty())
                                @foreach($context->recent_notices as $notice)
                                    <div class="tab-item">
                                        <div class="title">
                                            <a href="">
                                                {{ $notice->title }}
                                            </a>
                                        </div>
                                        <div class="info">
                                            <div class="date">{{ $notice->created_at->format('Y-m-d') }}</div>
                                            <div class="morebtn">
                                                <a href="{{ route('front.singleNotice',[$notice->id,getNepaliDate($notice->created_at)]) }}"> View <i class="fa fa-arrow-right"></i> </a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="morebtn">
                                    <a href="{{ route('front.notice') }}">
                                        View More <i class="fa fa-arrow-right"></i>
                                    </a>
                                </div>
                            @else
                                <div class="tab-item">
                                    <div class="title">
                                        <a href="">
                                            No Recent Notice Present.
                                        </a>
                                    </div>
                                </div>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('script')
@endpush