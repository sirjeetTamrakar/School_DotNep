@extends('front.master')

@push('style')
@endpush

@section('content')


    <div class="student-section">
        <div class="container">
            <div class="student-title">
                {{ getFrontLanguage('student-detail')}}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ getFrontLanguage('serial') }}</th>
                                <th>{{ getFrontLanguage('class-1') }}</th>
                                @foreach($ethnicities as $ethnicity)
                                    <th>{{$ethnicity->title}}</th>
                                @endforeach
                                <th>{{ getFrontLanguage('total-students') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contents as $content)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ getFrontLanguage('class-1') }} {{$content->title}}</td>
                                    @foreach($ethnicities as $ethnicity)
                                        <td>
                                            {{ getFrontLanguage('male-1') }}: {{isset($content->male[$ethnicity->id])? $content->male[$ethnicity->id]:0 }}
                                            <br>{{ getFrontLanguage('female-1') }}: {{isset($content->female[$ethnicity->id])? $content->female[$ethnicity->id]:0 }}
                                        </td>
                                    @endforeach
                                    <td> {{$content->total_students}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="student-section">
        <div class="container">
            <div class="student-title">
                {{ getFrontLanguage('total-ethnicity-wise-details') }}
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>{{ getFrontLanguage('serial') }}</th>
                                <th>{{ getFrontLanguage('ethnicity-1') }}</th>
                                <th>{{ getFrontLanguage('male-1') }}</th>
                                <th>{{ getFrontLanguage('female-1') }}</th>
                                <th>{{ getFrontLanguage('total-students') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ethnicities as $ethnicity)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $ethnicity->title }}</td>
                                    <td>{{ $ethnicity->male }}</td>
                                    <td>{{ $ethnicity->female }}</td>
                                    <td> {{$ethnicity->total}}</td>
                                </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td></td>
                                    <td><strong>{{ getFrontLanguage('total-1') }}</strong></td>
                                    <td><strong>{{ $ethnicity_total_male }}</strong></td>
                                    <td><strong>{{ $ethnicity_total_female }}</strong></td>
                                    <td><strong>{{ $ethnicity_total_students }}</strong></td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@if($student_count > 0)
    <div class="student-section">
        <div class="container">
            <div class="student-title">
                {{ getFrontLanguage('student-list') }}
            </div>
            <div class="row">
                <div class="col-md-3">
                    <div class="sidebar">
                        <div class="sidebar-title">
                            {{ getFrontLanguage('class-1') }}
                        </div>
                        <ul class="nav nav-tabs">
                            @php $count =1; @endphp
                            @foreach($contents as $content)
                                @if($content->students->count() > 0)
                                    <li class="nav-item">
                                        <a class="nav-link @if($count == 1) active  @endif "
                                           data-toggle="tab" href="#class{{$content->id}}"> {{ getFrontLanguage('class-1') }} {{ $content->title }}</a>
                                    </li>
                                     @php $count++; @endphp
                                @endif
                               
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        @php $count =1; @endphp
                        @foreach($contents as $content)
                            @if($content->students->count() > 0)
                                <div class="tab-pane container @if($count == 1) active  @endif " id="class{{$content->id}}">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                            <tr>
                                                <th>{{ getFrontLanguage('serial') }}</th>
                                                <th>{{ getFrontLanguage('name-1') }}</th>
                                                <th>{{ getFrontLanguage('father-s').' '.getFrontLanguage('name-1') }}</th>
                                                <th>{{ getFrontLanguage('mother-s').' '.getFrontLanguage('name-1') }}</th>
                                                <th>{{ getFrontLanguage('birth-date-1') }}</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($content->students as $student)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $student->name }}</td>
                                                    <td>{{ $student->father_name }}</td>
                                                    <td>{{ $student->mother_name }}</td>
                                                    <td>{{ $student->dob }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                @php $count++; @endphp
                            @endif
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
@endif

@endsection

@push('script')
@endpush
