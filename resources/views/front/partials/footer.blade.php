<div class="footer ">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="img-logo-container ">
                    <img
                            src="{{ asset(isset($settings['logo']) ? $settings['logo'] : 'front/assets/images/school-logo.png') }}"
                            class="img-fluid"
                            alt=""
                    />
                </div>
                <div class="company_name text-center">{{ isset($settings['name']) ? $settings['name'] : "High School" }} </div>
                <div class="company_address">{{ isset($settings['address']) ? $settings['address'] : "Jamal, Kathmandu" }}</div>
            </div>

            <div class="col-lg-3 col-md-6 ">
                <div class="link-container">
                    <div class="link-title">{{ getFrontLanguage('important-links') }}</div>
                    <ul>
                        <li>
                            <a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.about') }}">{{ getFrontLanguage('about-us') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.contact') }}">{{ getFrontLanguage('contact-us') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.gallery') }}">{{ getFrontLanguage('gallery') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <div class="link-container">
                    <div class="link-title">{{ getFrontLanguage('similar-websites') }}</div>
                    <ul>
                        <li>
                            <a href="http://knpmavirayapur.edu.np/"
                            >श्री कन्छु नरप्रताप मा.वि. नकटी रायपुर</a
                            >
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 ">
                <div class="link-container">
                    <div class="link-title">{{ getFrontLanguage('information') }}</div>
                    <ul>
                        <li>
                            <a href="{{ route('front.download') }}">{{ getFrontLanguage('download') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.news') }}">{{ getFrontLanguage('news-1') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.notice') }}">{{ getFrontLanguage('notice-1') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('front.events') }}">{{ getFrontLanguage('event') }}</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="top-footer">
            {{--<form action="">--}}
                {{--<input--}}
                        {{--type="email"--}}
                        {{--class="form-control"--}}
                        {{--placeholder="Your Email Address"--}}
                {{--/>--}}
                {{--<input--}}
                        {{--type="submit"--}}
                        {{--class="btn btn-primary form-control"--}}
                        {{--value="Subscribe"--}}
                {{--/>--}}
            {{--</form>--}}
            <div class="social-icon">
                <ul>
                    <li>
                        <a href="{{ isset($settings['facebook_link']) ? $settings['facebook_link'] : "#" }}" style=" background: #3b5a9b">
                            <i class="fab fa-facebook"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ isset($settings['twitter_link']) ? $settings['twitter_link'] : "#" }}" style="background: #2a98ef">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ isset($settings['youtube_link']) ? $settings['youtube_link'] : "#" }}" style="background: #db2814">
                            <i class="fab fa-youtube"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <hr style="background: #dbdbdb" />
        <div class="bottom-footer d-flex justify-content-between">
            <div class="copywrite">
                Copyright &copy; 2020 {{ isset($settings['name']) ? $settings['name'] : "High School" }}. All Rights Reserved.
            </div>
        </div>
    </div>
</div>
