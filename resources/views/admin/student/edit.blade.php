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
                    <li class="breadcrumb-item"><a href="#">Students</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('student') }}  {{ getLanguage('edit') }}</h5>
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

                    <h4 class="mt-0 header-title">{{ getLanguage('student') }} {{ getLanguage('edit') }}</h4>


                    <form class="" action="{{ route('admin.student.update') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="hidden" name="student_id" value="{{ $student->id }}">
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>{{ getLanguage('full-name') }}</label>
                                    <input type="text" value="{{ $student->name }}" name="name" class="form-control" required placeholder="{{ getLanguage('full-name') }}"/>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ getLanguage('grade') }}</label>
                                            <select class="form-control" name="grade_id">
                                                <option>{{ getLanguage('grade') }} {{ getLanguage('select') }}</option>
                                                @foreach($grades as $grade)
                                                    <option @if($grade->id == $student->grade_id) selected @endif value="{{ $grade->id }}">
                                                        {{ $grade->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ getLanguage('ethnicity') }}</label>
                                            <select class="form-control" name="ethnicity_id" required>
                                                <option value="">{{ getLanguage('ethnicity') }} {{ getLanguage('select') }}</option>
                                                @foreach($ethnicitys as $ethnicity)
                                                    <option @if($ethnicity->id == $student->ethnicity_id) selected @endif value="{{ $ethnicity->id }}">
                                                        {{ $ethnicity->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('address') }}</label>
                                    <input type="text" value="{{ $student->address }}" name="address" class="form-control" required placeholder="{{ getLanguage('student') }} {{ getLanguage('address') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('fathers') }} {{ getLanguage('name') }}</label>
                                    <input type="text" name="father_name" value="{{$student->father_name}}" class="form-control" required placeholder="{{ getLanguage('mothers') }} {{ getLanguage('name') }}"/>
                                </div>
                                <div class="form-group">
                                    <label>{{ getLanguage('mothers') }} {{ getLanguage('name') }}</label>
                                    <input type="text" name="mother_name" value="{{$student->mother_name}}" class="form-control" required placeholder="{{ getLanguage('fathers') }} {{ getLanguage('name') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('guardian') }} {{ getLanguage('address') }}</label>
                                    <input type="text" name="guardian_phone" value="{{$student->guardian_address}}" class="form-control" placeholder="{{ getLanguage('guardian') }} {{ getLanguage('address') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('guardian') }} {{ getLanguage('phone') }}</label>
                                    <input type="text" value="{{ $student->guardian_phone }}" name="guardian_phone" class="form-control" placeholder="{{ getLanguage('phone') }}"/>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ getLanguage('guardian') }} {{ getLanguage('occupation') }}</label>
                                            {{--<button class="btn btn-sm btn-primary waves-effect waves-light float-right">Add New</button>--}}
                                            <select class="form-control" name="occupation_id">
                                                <option>{{ getLanguage('occupation') }} {{ getLanguage('select') }}</option>
                                                @foreach($occupations as $occupation)
                                                    <option @if($occupation->id == $student->occupation_id) selected @endif value="{{ $occupation->id }}">
                                                        {{ $occupation->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-3">

                                <div class="form-group">
                                    <label>{{ getLanguage('gender') }}</label>
                                    <select class="form-control" name="gender">
                                        <option>{{ getLanguage('gender') }} {{ getLanguage('select') }}</option>
                                        <option value="Male" @if($student->gender == "Male") selected @endif >Male</option>
                                        <option value="Female" @if($student->gender == "Female") selected @endif >Female</option>
                                        <option value="Other" @if($student->gender == "Other") selected @endif >Other</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label>{{ getLanguage('disablity') }}</label>
                                    <select class="form-control" name="disability">
                                        <option>{{ getLanguage('disablity') }} ?</option>
                                        <option value="No" @if($student->disability == "No") selected @endif >No</option>
                                        <option value="Yes" @if($student->gender == "Yes") selected @endif >Yes</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('religion') }}</label>
                                    <select class="form-control" name="religion">
                                        <option>{{ getLanguage('religion') }} {{ getLanguage('select') }}</option>
                                        <option value="Hindu" @if($student->religion == "Hindu") selected @endif >Hindu</option>
                                        <option value="Christian" @if($student->religion == "Christian") selected @endif >Christian</option>
                                        <option value="Buddhism" @if($student->religion == "Buddhism") selected @endif >Buddhism</option>
                                        <option value="Islam" @if($student->religion == "Islam") selected @endif >Islam</option>
                                        <option value="Other" @if($student->religion == "Other") selected @endif >Other</option>
                                    </select>
                                </div>



                                <div class="form-group">
                                    <label>{{ getLanguage('birth-date') }}</label>
                                    <input type="text" value="{{ $student->DOB }}" id="dob" name="DOB" class="form-control nepali-calendar" />
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('student') }} {{ getLanguage('image') }}</label>
                                    <input type="file" name="image" class="form-control" />

                                    @if($student->image)
                                    <img src="{{ asset('/thumbnail/'.$student->image) }}">
                                        @endif
                                </div>


                            </div>
                        </div>


                        <button type="submit" class="btn btn-success waves-effect waves-light float-right">Update</button>
                    </form>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection

@push('scripts')

<!-- Required datatable js -->

{{--Page specific scripts--}}

@endpush