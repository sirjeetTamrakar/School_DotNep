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
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('add-new') }} {{ getLanguage('student') }}</h5>
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

                    <h4 class="mt-0 header-title">{{ getLanguage('student') }} {{ getLanguage('information') }}</h4>


                    <form class="" action="{{ route('admin.student.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>{{ getLanguage('full-name') }}</label>
                                    <input type="text" name="name" class="form-control" required placeholder="{{ getLanguage('full-name') }}"/>
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>{{ getLanguage('grade') }}</label>
                                            <select class="form-control" name="grade_id">
                                                <option>{{ getLanguage('grade') }} {{getLanguage('select')}}</option>
                                                @foreach($grades as $grade)
                                                    <option value="{{ $grade->id }}">
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
                                                    <option value="{{ $ethnicity->id }}">
                                                        {{ $ethnicity->title }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('address') }}</label>
                                    <input type="text" name="address" class="form-control" required placeholder="{{ getLanguage('student') }} {{getLanguage('address')}}"/>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('fathers') }} {{ getLanguage('name') }}</label>
                                    <input type="text" name="father_name" class="form-control" required placeholder="{{ getLanguage('mothers') }} {{ getLanguage('name') }}"/>
                                </div>
                                <div class="form-group">
                                    <label>{{ getLanguage('mothers') }} {{ getLanguage('name') }}</label>
                                    <input type="text" name="mother_name" class="form-control" required placeholder="{{ getLanguage('fathers') }} {{ getLanguage('name') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('guardian') }} {{ getLanguage('address') }}</label>
                                    <input type="text" name="guardian_phone" class="form-control" placeholder="{{ getLanguage('guardian') }} {{ getLanguage('address') }}"/>
                                </div>

                                <div class="form-group">
                                    <label>{{ getLanguage('guardian') }} {{ getLanguage('phone') }}</label>
                                    <input type="text" name="guardian_phone" class="form-control" placeholder="{{ getLanguage('guardian') }} {{ getLanguage('phone') }}"/>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label>{{ getLanguage('guardian') }} {{ getLanguage('occupation') }}</label>
                                            {{--<button class="btn btn-sm btn-primary waves-effect waves-light float-right">Add New</button>--}}
                                            <select class="form-control" name="occupation_id">
                                                <option> {{ getLanguage('occupation') }} {{ getLanguage('select') }}</option>
                                                @foreach($occupations as $occupation)
                                                    <option value="{{ $occupation->id }}">
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
                                    <label>{{  getLanguage('gender') }}</label>
                                    <select class="form-control" name="gender">
                                        <option>{{ getLanguage('gender') }} {{ getLanguage('select') }}</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>{{ getLanguage('disablity') }}</label>
                                    <select class="form-control" name="disability">
                                        <option>{{ getLanguage('select') }}</option>
                                        <option value="No" selected>No</option>
                                        <option value="Yes">Yes</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label> {{ getLanguage('religion') }}</label>
                                    <select class="form-control" name="religion">
                                        <option> {{ getLanguage('religion') }}  {{ getLanguage('select') }}</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Christian">Christian</option>
                                        <option value="Buddhism">Buddhism</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Other">Other</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label> {{ getLanguage('birth-date') }}</label>
                                    <input type="text" id="dob" name="DOB" class="nepali-calendar form-control" required/>
                                </div>

                                <div class="form-group">
                                    <label> {{ getLanguage('student') }}  {{ getLanguage('image') }}</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>


                            </div>
                        </div>


                        <button type="submit" class="btn btn-success waves-effect waves-light float-right">Save</button>
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