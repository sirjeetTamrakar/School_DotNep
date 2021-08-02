@extends('front.master')

@push('style')
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css"
            {{--integrity="sha256-UK1EiopXIL+KVhfbFa8xrmAWPeBjMVdvYMYkTAEv/HI="--}}
            crossorigin="anonymous"
    />
    <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css"
            {{--integrity="sha256-4hqlsNP9KM6+2eA8VUT0kk4RsMRTeS7QGHIM+MZ5sLY="--}}
    />
@endpush

@section('content')

    <div class="computer-lab-section">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="slider-for">
                        @if(count($images) > 0)
                            @foreach($images as $img)
                            <div>
                                <div class="img-container">
                                    <img
                                            src="{{asset($img)}}"
                                            alt=""
                                            class="img-fluid"
                                    />
                                </div>
                            </div>
                            @endforeach
                        @else
                            <div>
                                <div class="img-container">
                                    <img
                                            src="{{asset('front/assets/images/banner2.jpg')}}"
                                            alt=""
                                            class="img-fluid"
                                    />
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="slider-nav">
                        @if(count($images) > 0)
                            @foreach($images as $img)
                                <div>
                                    <div class="img-container">
                                        <img
                                                src="{{asset($img)}}"
                                                alt=""
                                                class="img-fluid"
                                        />
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-title">
                        {{ $asset_category->title }}
                    </div>
                    <div class="brief-description">
                        <p>
                           {{ $asset_category->remarks }}
                        </p>
                    </div>
                </div>
            </div>
            {{--<div class="sub-title">--}}
                {{--Detail Overview--}}
            {{--</div>--}}
            {{--<div class="detail-overview">--}}
                {{--<p>--}}
                    {{--Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
                    {{--Veritatis, amet unde. Quod velit ratione minus alias obcaecati--}}
                    {{--mollitia placeat ad iste accusamus expedita, architecto vel--}}
                    {{--laudantium beatae similique quos reiciendis? Lorem ipsum dolor sit--}}
                    {{--amet consectetur adipisicing elit. Tempora tempore et hic neque--}}
                    {{--saepe inventore temporibus eius ipsum, earum eveniet repellat--}}
                    {{--fugit. Doloremque fuga nisi ea nam dicta saepe amet.--}}
                {{--</p>--}}
                {{--<p>--}}
                    {{--Lorem ipsum dolor sit amet consectetur adipisicing elit.--}}
                    {{--Veritatis, amet unde. Quod velit ratione minus alias obcaecati--}}
                    {{--mollitia placeat ad iste accusamus expedita, architecto vel--}}
                    {{--laudantium beatae similique quos reiciendis? Lorem ipsum dolor sit--}}
                    {{--amet consectetur adipisicing elit. Tempora tempore et hic neque--}}
                    {{--saepe inventore temporibus eius ipsum, earum eveniet repellat--}}
                    {{--fugit. Doloremque fuga nisi ea nam dicta saepe amet.--}}
                {{--</p>--}}
            {{--</div>--}}
            <div class="sub-title text-center">
                Items Available
            </div>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>Serial Number</th>
                        <th>Item Name</th>
                        <th>Quantity</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(isset($assets))
                        @foreach($assets as $key=>$asset)
                            <tr>
                                <td>{{ (int)$key + 1 }}</td>
                                <td>{{ $asset->title }}</td>
                                <td>{{ $asset->quantity }}</td>
                            </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection

@push('script')
    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"
            integrity="sha256-NXRS8qVcmZ3dOv3LziwznUHPegFhPZ1F/4inU7uC8h0="
            crossorigin="anonymous"
    ></script>
    <script>
        $(".slider-for").slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: true,
            asNavFor: ".slider-nav"
        });
        $(".slider-nav").slick({
            slidesToShow: 3,
            slidesToScroll: 1,
            asNavFor: ".slider-for",
            dots: true,
            centerMode: true,
            focusOnSelect: true
        });
    </script>

@endpush