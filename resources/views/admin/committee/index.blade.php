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
                    <li class="breadcrumb-item"><a href="#">Committee</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> Committee </h5>
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


                    <h4 class="mt-0 header-title">Committee List<button type="button" class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-target=".edu-add-new">Add New</button></h4>
                        @include('admin.committee.add')
                    <div class="modal fade edu-edit-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    </div>
                    <table id="datatable-students" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Title</th>
                            <th>Degination</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Show in Front</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div> <!-- end row -->



@endsection

@push('scripts')

<!-- Required datatable js -->
<script src="{{ asset('admin/assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>

<!-- Datatable init js -->
<script src="{{ asset('admin/assets/pages/datatables.init.js') }}"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js" ></script>
{{--Page specific scripts--}}


<script>
    $(document).ready(function () {
        $('#datatable-students').DataTable({

            aaSorting: [0, 'desc'],
            processing: true,
            serverSide: true,
            bPaginate: true,
            bLengthChange: true,
            bFilter: true,
            bInfo: false,
            ordering:true,
            bAutoWidth: false,
            ajax: "{{ route('admin.committee.json') }}",
            columns: [
                {
                    data: 'count',
                    render: function (data, type, row) {
                        return row.count;
                    }
                },
                {
                    data: 'name',
                    render: function (data, type, row) {
                        return row.name;
                    }
                },
                {
                    data: 'degination',
                    render: function (data, type, row) {
                        return row.degination;
                    }
                },
                {
                    data: 'image',
                    render: function (data, type, row) {
                        return '<img style="width: 150px;" src=' + row.image + ' >';
                    }
                },
                {data: 'status',
                    render: function (data, type, row) {
                        return data == "Active" ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
                    }
                },
                {
                    data: 'show_in_front',
                    render: function (data, type, row) {
                        return parseInt(data) == 1 ? '<span class="badge badge-primary">Yes</span>' : '<span class="badge badge-info">No</span>';
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        var tempDeleteUrl = "{{ route('admin.committee.delete', ':id') }}";
                        tempDeleteUrl = tempDeleteUrl.replace(':id', data);
                        var actions = '';
                        actions += "<button type='button'  class='btn btn-dark btn-icon-text mr-2 p-1 btn-edit-row' data-id=" + row.id + "><i class=' mdi mdi-grease-pencil btn-icon-prepend'></i></button>";
                        actions += "<a href=" + tempDeleteUrl + " class='btn btn-danger btn-icon-text mr-2 p-1 btn-delete-row' data-id=" + row.id + "><i class=' mdi mdi-delete btn-icon-prepend'></i></a>";
                        return actions;
                    }
                },

            ],


        });
    });
</script>


<script>
    $(document).on("click", ".btn-edit-row", function (e) {
        e.preventDefault();
        $this = $(this);
        var id = $this.attr('data-id');

        var tempEditUrl = "{{ route('admin.committee.edit', ':id') }}";
        tempEditUrl = tempEditUrl.replace(':id', id);
        console.log(tempEditUrl);
        var $modal = $('.edu-edit-new');
        $modal.load(tempEditUrl, function (response) {
            $modal.modal('show');
        });
    });

</script>



@endpush