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
                    <li class="breadcrumb-item"><a href="#">School</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('basic').' '.getLanguage('information-1') }}</h5>
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

                    <h4 class="mt-0 header-title">{{ getLanguage('school').' '.getLanguage('information-1') }}</h4>


                    <form class="" action="{{ route('admin.about.update') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}


                        <div class="row">
                            <div class="col-md-12">

                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">{{ getLanguage('welcome-message') }}</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#profile-1" role="tab">{{ getLanguage('vdc-municipality-adhyaksh-message') }}</a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#messages-1" role="tab">{{ getLanguage('princiapal-message') }}</a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div class="tab-pane active p-3" id="home-1" role="tabpanel">
                                        <div class="form-group">
                                            <label>{{ getLanguage('welcome-message') }}</label>
                                            <textarea name="welcome_message" style="height: 500px;" class="summernote">
                                                {{ getAbout('welcome_message') }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-3" id="profile-1" role="tabpanel">
                                        <div class="form-group">
                                            <label>{{ getLanguage('adhyaksha').' '. getLanguage('name')}}</label>
                                            <input type="text" name="adhyaksh_name"
                                                   value="@if(getAbout('adhyaksh_name')) {{getAbout('adhyaksh_name')}} @endif"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ getLanguage('adhyaksha').' '.getLanguage('image') }}</label>
                                            <input type="file" name="adhyaksh_image" class="form-control">
                                            @if(getAbout('adhyaksh_image'))
                                                <img src="{{ asset('/thumbnail/'.getAbout('adhyaksh_image')) }}" style="width: 100px;">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>{{ getLanguage('adhyaksha').' '.getLanguage('message') }}</label>
                                            <textarea name="adhyaksh_message" style="height: 500px;" class="summernote">
                                                {{ getAbout('adhyaksh_message') }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-3" id="messages-1" role="tabpanel">
                                        <div class="form-group">
                                            <label>{{ getLanguage('principal-1').' '.getLanguage('name') }}</label>
                                            <input type="text" name="principal_name"
                                                   value="@if(getAbout('principal_name')) {{getAbout('principal_name')}} @endif"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label>{{ getLanguage('principal-1').' '.getLanguage('image') }}</label>
                                            <input type="file" name="principal_image" class="form-control">
                                            @if(getAbout('principal_image'))
                                                <img src="{{ asset('/thumbnail/'.getAbout('principal_image')) }}" style="width: 100px;">
                                            @endif
                                        </div>
                                        <div class="form-group">
                                            <label>{{ getLanguage('principal-1').' '.getLanguage('message') }}</label>
                                            <textarea name="principal_message" style="height: 500px;" class="summernote">
                                                {{ getAbout('principal_message') }}
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="tab-pane p-3" id="settings-1" role="tabpanel">
                                        <p class="font-14 mb-0">
                                            Trust fund seitan letterpress, keytar raw denim keffiyeh etsy
                                            art party before they sold out master cleanse gluten-free squid
                                            scenester freegan cosby sweater. Fanny pack portland seitan DIY,
                                            art party locavore wolf cliche high life echo park Austin. Cred
                                            vinyl keffiyeh DIY salvia PBR, banh mi before they sold out
                                            farm-to-table VHS viral locavore cosby sweater. Lomo wolf viral,
                                            mustache readymade thundercats keffiyeh craft beer marfa
                                            ethical. Wolf salvia freegan, sartorial keffiyeh echo park
                                            vegan.
                                        </p>
                                    </div>
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
<script src="{{ asset('admin/assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 500,                 // set editor height
            minHeight: 500,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                 // set focus to editable area after initializing summernote
        });
    });
</script>

@endpush