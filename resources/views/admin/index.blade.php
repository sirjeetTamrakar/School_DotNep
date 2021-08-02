@extends('admin.layouts.master')

@push('styles')

    <style>
        .quick-links{
            text-align: center;
            font-weight: 800 !important;
        }
    </style>

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                </ol>
            </div>
            <h5 class="page-title"> Dashboard </h5>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}

    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat m-b-30">
                <div class="p-3 bg-primary text-white">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-account-multiple float-right mb-0"></i>
                    </div>
                    <h6 class="text-uppercase mb-0">Total Student</h6>
                </div>
                <div class="card-body">
                    <div class="mt-4 text-muted">
                        <div class="float-right">
                            <p class="m-0"><a href="{{ route('admin.grade.students') }}">View</a></p>
                        </div>
                        <h5 class="m-0">{{ getAbout('total_student') }}</h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat m-b-30">
                <div class="p-3 bg-primary text-white">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-account-box-outline float-right mb-0"></i>
                    </div>
                    <h6 class="text-uppercase mb-0">Total Staff</h6>
                </div>
                <div class="card-body">
                    <div class="mt-4 text-muted">
                        <div class="float-right">
                            <p class="m-0"><a href="{{ route('admin.staff.all') }}">View More</a></p>
                        </div>
                        <h5 class="m-0">{{ $context->staff_count }}</h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat m-b-30">
                <div class="p-3 bg-primary text-white">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-gender-female float-right mb-0"></i>
                    </div>
                    <h6 class="text-uppercase mb-0">Total Male</h6>
                </div>
                <div class="card-body">
                    <div class="mt-4 text-muted">
                        <div class="float-right">
                            {{--<p class="m-0"><a href="#">View</a></p>--}}
                        </div>
                        <h5 class="m-0">{{ getAbout('male_student') }}</h5>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="card mini-stat m-b-30">
                <div class="p-3 bg-primary text-white">
                    <div class="mini-stat-icon">
                        <i class="mdi mdi-gender-male float-right mb-0"></i>
                    </div>
                    <h6 class="text-uppercase mb-0">Total Female</h6>
                </div>
                <div class="card-body">
                    <div class="mt-4 text-muted">
                        <div class="float-right">
                            {{--<p class="m-0"><a href="#">View</a></p>--}}
                        </div>
                        <h5 class="m-0">{{ getAbout('female_student') }}</h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end row -->

    <!-- Quick Links row -->
    <div class="row">
        <h5>Quick Links</h5>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <a href="{{ route('admin.notice.all') }}">
            <div class="card m-b-30 text-white bg-success">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p class="quick-links">School Notices.</p>
                        {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                        {{--</footer>--}}
                    </blockquote>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('admin.news.all') }}">
            <div class="card m-b-30 text-white bg-info">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p class="quick-links">School News.</p>
                        {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                        {{--</footer>--}}
                    </blockquote>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('admin.event.all') }}">
            <div class="card m-b-30 text-white bg-danger">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p class="quick-links">School Events.</p>
                        {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                        {{--</footer>--}}
                    </blockquote>
                </div>
            </div>
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('admin.tender.all') }}">
            <div class="card m-b-30 text-white bg-warning">
                <div class="card-body">
                    <blockquote class="card-bodyquote mb-0">
                        <p class="quick-links">School Tenders.</p>
                        {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                        {{--</footer>--}}
                    </blockquote>
                </div>
            </div>
            </a>
        </div>
    </div>
    <!-- End Quick Links-->

    <!-- Site Management Links-->
    <div class="row">
        <h5>FrontPage Management Links</h5>
    </div>
    <div class="row">
        <div class="col-xl-3">
            <a href="{{ route('admin.sliders') }}">
                <div class="card m-b-30 text-white bg-success">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <p class="quick-links">HomePage Sliders.</p>
                            {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                            {{--</footer>--}}
                        </blockquote>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('admin.album.all') }}">
                <div class="card m-b-30 text-white bg-info">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <p class="quick-links">School Album.</p>
                            {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                            {{--</footer>--}}
                        </blockquote>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('admin.welcome.message') }}">
                <div class="card m-b-30 text-white bg-danger">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <p class="quick-links">School Message.</p>
                            {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                            {{--</footer>--}}
                        </blockquote>
                    </div>
                </div>
            </a>
        </div>
        <div class="col-xl-3">
            <a href="{{ route('admin.about') }}">
                <div class="card m-b-30 text-white bg-warning">
                    <div class="card-body">
                        <blockquote class="card-bodyquote mb-0">
                            <p class="quick-links">Page Settings.</p>
                            {{--<footer class="blockquote-footer text-white font-14">--}}
                            {{--Someone famous in <cite title="Source Title">Source Title</cite>--}}
                            {{--</footer>--}}
                        </blockquote>
                    </div>
                </div>
            </a>
        </div>
    </div>
    <!-- End Links-->

    {{-- <div class="row" id="gender-bargraph" style="display: none;">
        <div class="col-md-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Student By Grades</h4>

                    <ul class="list-inline widget-chart m-t-20 text-center">
                        <li>
                            <h4 class=""><b>5248</b></h4>
                            <p class="text-muted m-b-0">Marketplace</p>
                        </li>
                        <li>
                            <h4 class=""><b>321</b></h4>
                            <p class="text-muted m-b-0">Last week</p>
                        </li>
                        <li>
                            <h4 class=""><b>964</b></h4>
                            <p class="text-muted m-b-0">Last Month</p>
                        </li>
                    </ul>
                    <div id="morris-bar-example" style="height: 300px"></div>
                </div>
            </div>
        </div>
    </div> --}}

    {{--<div class="row">--}}
        {{--<div class="col-xl-12">--}}
            {{--<div class="card m-b-30">--}}
                {{--<div class="card-body">--}}
                    {{--<h4 class="mt-0 header-title mb-4">Recent Activity</h4>--}}
                    {{--<div class="table-responsive">--}}
                        {{--<table class="table table-hover mb-0">--}}
                            {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Name</th>--}}
                                    {{--<th>Position</th>--}}
                                    {{--<th>Office</th>--}}
                                    {{--<th>Age</th>--}}
                                    {{--<th>Start date</th>--}}
                                    {{--<th>Salary</th>--}}
                                {{--</tr>--}}

                            {{--</thead>--}}
                            {{--<tbody>--}}
                                {{--<tr>--}}
                                    {{--<td>Tiger Nixon</td>--}}
                                    {{--<td>System Architect</td>--}}
                                    {{--<td>Edinburgh</td>--}}
                                    {{--<td>61</td>--}}
                                    {{--<td>2017/04/25</td>--}}
                                    {{--<td>$320,800</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Garrett Winters</td>--}}
                                    {{--<td>Accountant</td>--}}
                                    {{--<td>Tokyo</td>--}}
                                    {{--<td>63</td>--}}
                                    {{--<td>2017/07/25</td>--}}
                                    {{--<td>$170,750</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Ashton Cox</td>--}}
                                    {{--<td>Junior Technical Author</td>--}}
                                    {{--<td>San Francisco</td>--}}
                                    {{--<td>66</td>--}}
                                    {{--<td>2015/01/12</td>--}}
                                    {{--<td>$86,000</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Cedric Kelly</td>--}}
                                    {{--<td>Senior Javascript Developer</td>--}}
                                    {{--<td>Edinburgh</td>--}}
                                    {{--<td>22</td>--}}
                                    {{--<td>2018/03/29</td>--}}
                                    {{--<td>$433,060</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Airi Satou</td>--}}
                                    {{--<td>Accountant</td>--}}
                                    {{--<td>Tokyo</td>--}}
                                    {{--<td>33</td>--}}
                                    {{--<td>2014/11/28</td>--}}
                                    {{--<td>$162,700</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Brielle Williamson</td>--}}
                                    {{--<td>Integration Specialist</td>--}}
                                    {{--<td>New York</td>--}}
                                    {{--<td>61</td>--}}
                                    {{--<td>2018/12/02</td>--}}
                                    {{--<td>$372,000</td>--}}
                                {{--</tr>--}}
                                {{--<tr>--}}
                                    {{--<td>Herrod Chandler</td>--}}
                                    {{--<td>Sales Assistant</td>--}}
                                    {{--<td>San Francisco</td>--}}
                                    {{--<td>59</td>--}}
                                    {{--<td>2018/08/06</td>--}}
                                    {{--<td>$137,500</td>--}}
                                {{--</tr>--}}

                            {{--</tbody>--}}
                        {{--</table>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



@endsection

@push('scripts')

    <script>
        function get_bar_chart_data(){
            return $.ajax({
                url: '{{ route('admin.genderByClass') }}',
                contentType : false,
                processData : false,
                method: 'get',
                async: !1,
                // data: formData,
                success: function(result) {
                    console.log(result);
                    $('#gender-bargraph').show();
                },
                error: function (data) {
                    $('#gender-bargraph').hide();
                }
            });
        }
        !function ($) {
            "use strict";

            var Dashboard = function () {
            };
                //creates area chart
                Dashboard.prototype.createBarChart  = function(element, data, xkey, ykeys, labels, lineColors) {
                    Morris.Bar({
                        element: element,
                        data: data,
                        xkey: xkey,
                        ykeys: ykeys,
                        labels: labels,
                        gridLineColor: '#eef0f2',
                        barSizeRatio: 0.4,
                        resize: true,
                        hideHover: 'auto',
                        barColors: lineColors
                    });
                },

            Dashboard.prototype.init = function () {

                //creating bar chart
                var $barData = get_bar_chart_data().responseJSON;
                this.createBarChart('morris-bar-example', $barData, 'grade', ['male', 'female'], ['Male', 'Female'], [ '#fcc24c', '#54cc96']);

            },
                //init
                $.Dashboard = new Dashboard, $.Dashboard.Constructor = Dashboard
        }(window.jQuery),

//initializing
            function ($) {
                "use strict";
                $.Dashboard.init();
            }(window.jQuery);
    </script>

@endpush
