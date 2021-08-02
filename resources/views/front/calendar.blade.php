@extends('front.master')

@push('style')

    <style>
        .calendar{
            margin: 30px 30px auto;
            text-align: center;
        }
    </style>

@endpush

@section('content')

    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    Calendar
                </div>
            </div>
        </div>
    </div>
    <div class="calendar">
        <iframe src="https://www.hamropatro.com/widgets/calender-full.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
                style="border:none; overflow:hidden; width:800px; height:840px;" allowtransparency="true"></iframe>
    </div>
@endsection

@push('script')
@endpush