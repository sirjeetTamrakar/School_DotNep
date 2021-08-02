@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Exam</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> Students List </h5>
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

                    <h4 class="mt-0 header-title">Class {{ $grade->title }} Pass Student
                    <br>
                        <label class="">
                            <input type="checkbox" id="checkAll" >
                            Check All </label>
                    </h4>

                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <form method="post" action="{{ route('admin.exam.pass.student.student') }}">
                                {{ csrf_field() }}
                                <div class="row">
                                    @foreach($students as $student)
                                        <div class="col-sm-3">
                                            <div class="form-group">


                                                <label class="">
                                                    <input type="checkbox" class="studentcheck" name="student[]"  value="{{ $student->id }}">
                                                    {{ $student->name }} </label>

                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="form-group">
                                    <label>Upgrade to</label>
                                    <select class="form-control" name="grade_id">
                                        <option>Select Grade</option>
                                        @foreach($grades as $item)
                                            @if($item->id != $grade->id)
                                                <option value="{{ $item->id }}">
                                                    {{ $item->title }}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                            </form>
                        </div>
                    </div>



                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection

@push('scripts')
    <script>
        $('#checkAll').on('change', function(){
            if($(this).is(":checked")){
                console.log('test')
                $('.studentcheck').prop('checked',true);
            }
            else{
                $('.studentcheck').prop('checked',false);
            }
        });
    </script>
@endpush
