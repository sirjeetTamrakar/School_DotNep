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
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('admin.users') }}">User</a></li>
                    <li class="breadcrumb-item active">Add</li>
                </ol>
            </div>
            <h5 class="page-title"> Add User</h5>
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

                    <h4 class="mt-0 header-title">Add User</h4>


                    <form class="" action="{{ route('admin.user.store') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" required placeholder="Full Name"/>
                                </div>


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" required placeholder="Email"/>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" value="{{ old('phone') }}" name="phone" class="form-control" required placeholder="Phone Number"/>
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        <option>Select Role</option>
                                        @foreach($roles as $role)
                                            <option @if(old('role') == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                            @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Student Image</label><br>
                                    <div class="img-preview">
                                        <img src=""  id="user_image" height="100px" width="100px" alt=""><br><br>
                                    </div>
                                    <input type="file" name="image" id="image" class="form-control" />
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>password</label>
                                            <input type="password" name="password" class="form-control" required placeholder="Enter Password"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Confrim Password</label>
                                            <input type="password" name="password_confrimation" class="form-control" required placeholder="Enter Password"/>
                                        </div>
                                    </div>
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

<script>
$('.img-preview').hide();
$(document).ready(function (e) {


$('#image').change(function(){

 let reader = new FileReader();

 reader.onload = (e) => {

   $('#user_image').attr('src', e.target.result);
   $('.img-preview').show();
 }

 reader.readAsDataURL(this.files[0]);

});

});
</script>

<!-- Required datatable js -->

{{--Page specific scripts--}}

@endpush
