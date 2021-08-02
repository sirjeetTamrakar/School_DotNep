
<div id="myNav" class="overlay">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"
				>&times;</a
			>

    <div class="overlay-content">
        <a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a>

        <div class="mobile-nav">
            <button>
                {{ getFrontLanguage('school-overview')}} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                <a href="{{ route('front.about') }}">{{ getFrontLanguage('about-us') }}</a>
                {{--<a href="{{ route('front.mission-vision') }}">Vision & Mission</a>--}}
                <a href="{{ route('front.principal-note') }}">{{ getFrontLanguage('administration-note') }}</a>
                <a href="{{ route('front.gallery') }}">{{ getFrontLanguage('gallery') }}</a>
            </div>
        </div>

        {{--<div class="dropdown">--}}
            {{--<button class="dropbtn">--}}
                {{--{{ getFrontLanguage('facilities')}} <i class="fa fa-caret-down"></i>--}}
            {{--</button>--}}
            {{--<div class="dropdown-content">--}}
                    {{--@foreach(get_asset_categories(1) as $category)--}}
                        {{--<a href="{{ route('front.asset_category', [$category->id,getNepaliDate($category->created_at)]) }}">{{$category->title}}</a>--}}
                    {{--@endforeach--}}
            {{--</div>--}}
        {{--</div>--}}
        <div class="mobile-nav">
            <button >
                {{ getFrontLanguage('members-enrolled')}} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                @foreach(get_staff_types(1) as $type)
                    <a href="{{ route('front.staffs',$type->slug) }}">{{$type->title}}</a>
                @endforeach
            </div>
        </div>
        <a href="{{ route('front.students') }}">{{ getFrontLanguage('student-detail')}}</a>
        <div class="mobile-nav">
            <button >
                {{ getFrontLanguage('information')}} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                <a href="{{ route('front.notice') }}">{{ getFrontLanguage('notice-1') }}</a>
                <a href="{{ route('front.news') }}">{{ getFrontLanguage('news-1') }}</a>
                <a href="{{ route('front.events') }}">{{ getFrontLanguage('event') }}</a>
                <a href="{{route('front.tender')}}">{{ getFrontLanguage('tender-1') }}</a>
                <a href="{{ route('front.download') }}">{{ getFrontLanguage('download') }}</a>
            </div>
        </div>
        <a href="{{ route('front.calendar') }}">{{ getFrontLanguage('calendar')}}</a>
        <div class="mobile-nav">
            <button >
                {{ getFrontLanguage('result-1')}} <i class="fa fa-caret-down"></i>
            </button>
            <div class="mobile-nav-wrapper">
                @foreach(get_result_years() as $result_year)
                    <a href="{{ route('front.result',$result_year) }}">{{$result_year}}</a>
                @endforeach
            </div>
        </div>

        <a href="{{ route('front.contact') }}">{{ getFrontLanguage('contact-us')}}</a>

    </div>
</div>
<div class="navbar">
    <div class="navbar-container container">
        <a href="{{ url('/') }}" class="logo-container">
            <img src="{{ asset(isset($settings['logo']) ? $settings['logo'] : "front/assets/images/logo.png") }}" class="img-fluid" alt="" />
        </a>
        <div class="company-container">
            <div class="province" >
                प्रदेश सरकार
            </div>
            <div class="company-name pt-2 pb-2">
                {{ isset($settings['name']) ? $settings['name'] : "High School" }}
            </div>
            <div class="province_name">
                {{ isset($settings['address']) ? $settings['address'] : "" }}
            </div>
        </div>
        <div class="flag-container">
            <img src="{{ asset('images/flagNepal.gif') }}" class="img-fluid" alt="" />
        </div>
    </div>
</div>
<div class="container"></div>
<div class="secondary-navbar collapses">
    <div class="container">

 <ul class="d-none d-lg-flex">
<li>
    <a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a>

     </li>
     <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
        {{ getFrontLanguage('school-overview')}}</a>

        <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
            <a href="{{ route('front.about') }}">{{ getFrontLanguage('about-us') }}</a>
            {{--<a href="{{ route('front.mission-vision') }}">Vision & Mission</a>--}}
            <a href="{{ route('front.principal-note') }}">{{ getFrontLanguage('administration-note') }}</a>
            <a href="{{ route('front.gallery') }}">{{ getFrontLanguage('gallery') }}</a>
        </div>
     </li>
     <li class=" nav-item dropdown">
         <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" id="navbar-dropdown-menu-link-239" >
        {{ getFrontLanguage('members-enrolled')}} </a>

        <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
            @foreach(get_staff_types(1) as $type)
            <a href="{{ route('front.staffs',$type->slug) }}">{{$type->title}}</a>
            @endforeach
        </div>
     </li>
     <li>
         <a href="{{ route('front.students') }}">{{ getFrontLanguage('student-detail')}}</a>
     </li>
     <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
        {{ getFrontLanguage('information')}}</a>

        <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
            <a href="{{ route('front.notice') }}">{{ getFrontLanguage('notice-1') }}</a>
            <a href="{{ route('front.news') }}">{{ getFrontLanguage('news-1') }}</a>
            <a href="{{ route('front.events') }}">{{ getFrontLanguage('event') }}</a>
            <a href="{{ route('front.tender') }}">{{ getFrontLanguage('tender-1') }}</a>
            <a href="{{ route('front.download') }}">{{ getFrontLanguage('download') }}</a>
        </div>
     </li>
     <li>
         <a href="{{ route('front.calendar') }}">{{ getFrontLanguage('calendar')}}</a>
     </li>
     <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
        {{ getFrontLanguage('result-1')}}</a>

        <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
            @foreach(get_result_years() as $result_year)
                <a href="{{ route('front.result',$result_year) }}">{{$result_year}}</a>
            @endforeach
        </div>
     </li>

     <li>
         <a href="{{ route('front.contact') }}">{{ getFrontLanguage('contact-us')}}</a>
     </li>
     <li class=" nav-item dropdown"><a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"id="navbar-dropdown-menu-link-239" aria-haspopup="true" aria-expanded="false">
        पाठ्यक्रम</a>

        <div class="dropdown-menu" aria-labelledby="navbar-dropdown-menu-link-239">
            @foreach(get_courses() as $course)
            <a href="{{ route('front.courses',$course->slug) }}">{{$course->title}}</a>
            @endforeach
        </div>
     </li>


    </ul>
    </div>
    <div class="sidetoggle d-block d-lg-none">
        <span onclick="openNav()"><i class="fa fa-bars"></i></span>
    </div>
</div>
<div class="marquee-container">
    <div class="marquee_notice container">
        <div class="notice_title">
            ताजा जानकारी
        </div>
        <div class="notice_content">
            <marquee loop="true" behavior="scroll">

                @foreach (get_notices() as $notice)

                <a href="">{{ $notice->title }}</a>
                @endforeach


            </marquee>
        </div>
    </div>
</div>
