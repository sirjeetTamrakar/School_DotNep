@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

<style>
    .school-select{
        margin-top:20px;
        margin-bottom:20px;
    }
    .school-body{

    }
</style>

@endpush

@section('headers')

    {{--Heading and breadcrumbs--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item"><a href="#">Logs</a></li>
                </ol>
            </div>
            <h5 class="page-title"> Logs </h5>
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


                    <h4 class="mt-0 header-title">User Logs</h4>

                    <hr>
                    <div class="text-center school-select" style="display: none;">
                        <div class="school-header">
                            <h4>Select School:</h4>
                        </div>
                        <div class="school-body">
                            <select name="school_id" id="school_id" class="js-example-basic-single">
                                @foreach($schools as $school)
                                    <option value="{{$school->id}}">{{$school->title}}</option>
                                @endforeach
                            </select>
                        </div>
                        <hr>
                    </div>

                    <div class="modal fade edu-edit-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    </div>

                    <table id="datatable-students" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Type</th>
                            <th>Action</th>
                            <th>Date</th>
                            <th>Details</th>
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
{{--Page specific scripts--}}


<script>
    $(document).ready(function () {
        var school_id = $('#school_id').val();
        var url = "{{ route('admin.log.Json',':id') }}";
        url = url.replace(':id',school_id);
        load_datatable(url);
    });
    $('#school_id').on('change',function () {
        var school_id = $('#school_id').val();
        var url = "{{ route('admin.log.Json',':id') }}";
        url = url.replace(':id',school_id);
        $("#datatable-students").dataTable().fnDestroy();
        load_datatable(url);
    });
    function load_datatable(url) {
        $('#datatable-students').DataTable({
            aaSorting: [0, 'desc'],
            processing: true,
            serverSide: true,
            bPaginate: true,
            bLengthChange: true,
            bFilter: true,
            bInfo: false,
            bAutoWidth: false,
            ajax: url,
            columns: [
                {
                    data: 'count',
                    render: function (data, type, row) {
                        return row.count;
                    }
                },
                {
                    data: 'model',
                    render: function (data, type, row) {
                        return row.model;
                    }
                },
                {
                    data: 'description',
                    render: function (data, type, row) {
                        return row.description;
                    }
                },
                {
                    data: 'created_at',
                    render: function (data, type, row) {
                        return row.created_at;
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        var actions = '';
                        actions += "<button type='button'  class='btn btn-dark btn-icon-text mr-2 p-1 btn-edit-row' data-id=" + row.id + "><i class=' mdi mdi-eye btn-icon-prepend'></i></button>";
                        return actions;
                    }
                },
            ]
        });
    }
</script>


<script>
    $(document).on("click", ".btn-edit-row", function (e) {
        e.preventDefault();
        $this = $(this);
        var id = $this.attr('data-id');

        var tempEditUrl = "{{ route('admin.log.details', ':id') }}";
        tempEditUrl = tempEditUrl.replace(':id', id);
        console.log(tempEditUrl);
        var $modal = $('.edu-edit-new');
        $modal.load(tempEditUrl, function (response) {
            $modal.modal('show');
        });
    });

</script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2({ width: '100%' });
    });
</script>

@endpush