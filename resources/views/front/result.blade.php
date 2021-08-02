@extends('front.master')

@push('style')
@endpush

@section('content')


    <div class="sub-banner">
        <div class="img-container">
            <img src="{{ asset(isset($settings['bannerImage'])?$settings['bannerImage']:'') }}" alt="" />
            <div class="overlay">
                <div class="title">
                    {{ getFrontLanguage('result-1') }}
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('front.home') }}">{{ getFrontLanguage('home') }}</a></li>
            <li class="breadcrumb-item active" aria-current="page">
                {{ getFrontLanguage('result-1') }}
            </li>
        </ol>
    </nav>
    <div class="result-section">
        <div class="container">
            <ul class="nav nav-tabs">
                @foreach($exams as $exam)
                    <li class="nav-item">
                        <a class="nav-link @if($exams[0]->id == $exam->id) active @endif" data-toggle="tab" href="#term{{$exam->id}}">
                            {{$exam->title}}
                        </a>
                    </li>
                @endforeach
            </ul>

            <!-- Tab panes -->
            <div class="tab-content mb-5">
                @foreach($exams as $exam)
                    <div class="tab-pane @if($exams[0]->id == $exam->id) active @endif " id="term{{$exam->id}}">
                        <table class="table  table-bordered table-striped table-hover">
                            <thead class="bg-primary">
                            <tr>
                                <th>{{ getFrontLanguage('serial') }}</th>
                                <th>{{ getFrontLanguage('class-1') }}</th>
                                <th>{{ getFrontLanguage('download-1') }}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php $counter=1; @endphp
                            @foreach($exam->grades as $grade)
                                <tr>
                                    <td>{{$counter}}</td>
                                    <td>{{ getFrontLanguage('class-1') }} {{$grade->title}}</td>
                                    <td>
                                        @if($result = $grade->results->where('exam_id',$exam->id)->first())
                                            <a href="{{ asset($result->file) }}" target="_blank"><i class="fa fa-download"></i></a>
                                        @else
                                            No result
                                        @endif
                                    </td>
                                </tr>
                                @php $counter++; @endphp
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection

@push('script')
@endpush