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
                    <li class="breadcrumb-item active"><a href="{{ route('admin.download.all') }}">Download</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('contact-messages') }}</h5>
            
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

                    <h4 class="mt-0 header-title text-center">{{ getLanguage('school') }} {{ getLanguage('contact-messages') }}</h4>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ getLanguage('serial-1') }}</th>
                            <th>{{ getLanguage('name') }}</th>
                            <th>{{ getLanguage('email') }}</th>
                            <th>{{ getLanguage('subject') }}</th>
                            <th>{{ getLanguage('status') }}</th>
                            <th>{{ getLanguage('action') }}</th>
                        </tr>
                        </thead>


                        <tbody>
                            @foreach($contents as $content)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{$content->name}}</td>
                                <td>{{$content->email}}</td>
                                <td>{{$content->subject}}</td>
                                <td>{{ $content->view == 1 ? "Read": "Unread" }}</td>
                                <td>
                                    <button class="btn btn-primary btn-icon-text mr-2 p-1 btn-view-row" data-id="{{$content->id}}" title="View Details">
                                        <i class="fa fa-eye"></i>
                                        {{ getLanguage('details') }}
                                    </button>

                                    <button class="btn btn-danger btn-icon-text mr-2 p-1"
                                            data-toggle="modal" data-target="#delete_content{{$content->id}}" title="Delete">
                                        <i class="fa fa-trash"></i>
                                        {{ getLanguage('delete') }}
                                    </button>
                                    @include('admin.contact.delete')

                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade edu-view-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
    </div>




@endsection

@push('scripts')

    {{--Page specific scripts--}}
    <!-- Required datatable js -->
    <script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Datatable init js -->
    <script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>

    <script>
        $(document).on("click", ".btn-view-row", function (e) {
            e.preventDefault();
            $this = $(this);
            var id = $this.attr('data-id');

            var tempEditUrl = "{{ route('admin.contact.view', ':id') }}";
            tempEditUrl = tempEditUrl.replace(':id', id);
            console.log(tempEditUrl);
            var $modal = $('.edu-view-new');
            $modal.load(tempEditUrl, function (response) {
                $modal.modal('show');
            });
        });

    </script>

@endpush