@extends('admin.layouts.master')

@push('styles')
<script src="https://kit.fontawesome.com/3a77735fb2.js" crossorigin="anonymous"></script>
    {{--Page specific styles--}}

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Admin</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.subject.all') }}">Pop-ups</a></li>
                </ol>
            </div>
            <h5 class="page-title">Pop-up</h5>

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
                    <div class="row mb-2 mb-3">
                        <div class="col-md-6">
                            <h4 class="mt-2 header-title">All Pop-up</h4>
                        </div>
                        <div class="col-md-6 text-md-right">
                            <a href="{{ route('admin.popup.add') }}" class=" btn btn-primary">
                                ADD NEW
                            </a>
                        </div>
                    </div>

                    <table class="table table-bordered">
                        <thead class="thead-dark">
                        <tr>
                            <th>S.No</th>
                            <th>Pop-up Title</th>
                            <th>Pop-up Image</th>
                            <th>Pop-up position</th>
                            <th>Pop-up status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($allpopups as $popup)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <label for="">{{$popup->title}}</label>
                                </td>
                                <td>
                                    <img src="{{ asset($popup->image) }}"  height="100px" width="100px" alt="">
                                </td>

                                <td>
                                    <label for="">{!! $popup->position !!}</label>
                                </td>
                                <td>
                                    @if ($popup->status == "active")
                                    <h4 class="ml-5"><span class="badge badge-success">{{ $popup->status }}</span></h4>
                                    @else
                                    <h4 class="ml-5"><span class="badge badge-danger">{{ $popup->status }}</span></h4>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.popup.edit',$popup->id) }}" class="btn btn-primary">
                                        Edit
                                    </a>
                                    <a href="{{ route('admin.course.delete',$popup->id) }}" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                            {{ $allpopups->links() }}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>



@endsection

@push('scripts')

    {{--Page specific scripts--}}
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>

@endpush
