@extends('front.master')

@push('style')

    <style>
        .calendar{
            margin: 30px 30px auto;
            text-align: center;
        }

        .calendar .medium-calendar, .calendar .small-calendar{
            display:none;
        }

        @media (min-width: 400px) and (max-width: 992px) {
            .calendar .full-calendar, .calendar .small-calendar{
                display:none;
            }
            .calendar .medium-calendar{
                display:inline-block;
            }
        }

        @media (min-width: 0px) and (max-width: 400px) {
            .calendar .full-calendar, .calendar .medium-calendar{
                display:none;
            }
            .calendar .small-calendar{
                display:inline-block;
            }
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
        <iframe class="full-calendar" src="https://www.hamropatro.com/widgets/calender-full.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
                style="border:none; overflow:hidden; width:800px; height:840px;" allowtransparency="true"></iframe>
        <iframe class="medium-calendar" src="https://www.hamropatro.com/widgets/calender-medium.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:295px; height:385px;" allowtransparency="true"></iframe>
        <iframe class="small-calendar" src="https://www.hamropatro.com/widgets/calender-small.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0" style="border:none; overflow:hidden; width:200px; height:290px;" allowtransparency="true"></iframe>
    </div>
@endsection

@push('script')
@endpush