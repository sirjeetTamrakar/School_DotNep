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
                    <li class="breadcrumb-item active">Edit</li>
                </ol>
            </div>
            <h5 class="page-title"> Edit User</h5>
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

                    <h4 class="mt-0 header-title">Edit User</h4>


                    <form class="" action="{{ route('admin.user.update') }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}
                        <input type="hidden" name="user_id" value="{{ $user->id }}">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Full Name</label>
                                    <input type="text" name="name" value="{{ $user->name }}" class="form-control" required placeholder="Full Name"/>
                                </div>


                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" value="{{ $user->email }}" class="form-control" required placeholder="Email"/>
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" value="{{ $user->phone }}" name="phone" class="form-control" required placeholder="Phone Number"/>
                                </div>

                                <div class="form-group">
                                    <label>Role</label>
                                    <select class="form-control" name="role">
                                        <option>Select Role</option>
                                        @foreach($roles as $role)
                                            <option @if($user->role_id == $role->id) selected @endif value="{{ $role->id }}">{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Student Image</label>
                                    <input type="file" name="image" class="form-control" id="image"/>

                                    @if($user->image)
                                        <img src="{{ asset('/thumbnail/'.$user->image) }}" id="user_image" style="width: 100px;">
                                    @endif
                                </div>

                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>password</label>
                                            <input type="password" name="password" class="form-control" placeholder="Enter Password"/>
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Confrim Password</label>
                                            <input type="password" name="password_confrimation" class="form-control" placeholder="Enter Password"/>
                                        </div>
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
<script>

$(document).ready(function (e) {


 $('#image').change(function(){

  let reader = new FileReader();

  reader.onload = (e) => {

    $('#user_image').attr('src', e.target.result);
  }

  reader.readAsDataURL(this.files[0]);

 });

});
</script>
<!-- Required datatable js -->

{{--Page specific scripts--}}

@endpush
