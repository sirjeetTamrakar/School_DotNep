@extends('admin.layouts.master')

@push('styles')

    <style>
        .calendar{
            margin: 30px 30px auto;
            text-align: center;
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
                    <li class="breadcrumb-item"><a href="#">Students</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('students') }} </h5>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">

                    <h4 class="mt-0 header-title">{{ getLanguage('select') }} {{ getLanguage('grade') }}<a href="{{ route('admin.student.create') }}" class="btn btn-primary waves-effect waves-light float-right">{{ getLanguage('add-new') }} {{ getLanguage('student') }}</a></h4>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="row">
                                @foreach($grades as $grade)
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <a class="btn btn-primary" href="{{ route('admin.students', $grade->id) }}">{{ $grade->title }}</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="calendar">
                        <iframe src="https://www.hamropatro.com/widgets/calender-full.php" frameborder="0" scrolling="no" marginwidth="0" marginheight="0"
                                style="border:none; overflow:hidden; width:800px; height:840px;" allowtransparency="true"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection
