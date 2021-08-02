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
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('students') }} </h5>
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

                    <h4 class="mt-0 header-title">{{ getLanguage('grade') }} {{ $grade->title }} {{ getLanguage('student') }} {{ getLanguage('list') }}<a href="{{ route('admin.student.create') }}" class="btn btn-primary waves-effect waves-light float-right">{{ getLanguage('add-new') }} {{ getLanguage('student') }}</a></h4>


                    <table id="datatable-students" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>{{ getLanguage('name') }}</th>
                            <th>{{ getLanguage('image') }}</th>
                            <th>{{ getLanguage('grade') }}</th>
                            <th>{{ getLanguage('birth-date') }}</th>
                            <th>{{ getLanguage('gender') }}</th>
                            <th>{{ getLanguage('action') }}</th>
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
        $('#datatable-students').DataTable({
            aaSorting: [0, 'desc'],
            processing: true,
            serverSide: true,
            bPaginate: true,
            bLengthChange: true,
            bFilter: true,
            bInfo: false,
            bAutoWidth: false,
            ajax: "{{ route('admin.students.json', $grade->id) }}",
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
                    data: 'image',
                    render: function (data, type, row) {
                        return '<img src=' + row.image + ' >';
                    }
                },
                {
                    data: 'grade_id',
                    render: function (data, type, row) {
                        return row.grade_name;
                    }
                },
                {
                    data: 'age',
                    render: function (data, type, row) {
                        return row.age;
                    }
                },
                {
                    data: 'gender',
                    render: function (data, type, row) {
                        return row.gender;
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        var tempEditUrl = "{{ route('admin.student.edit', ':id') }}";
                        tempEditUrl = tempEditUrl.replace(':id', data);
                        var tempDeleteUrl = "{{ route('admin.student.delete', ':id') }}";
                        tempDeleteUrl = tempDeleteUrl.replace(':id', data);
                        var actions = '';
                        actions += "<a href=" + tempEditUrl + " class='btn btn-dark btn-icon-text mr-2 p-1 btn-edit-row' data-id=" + row.id + "><i class=' mdi mdi-grease-pencil btn-icon-prepend'></i>{{ getLanguage('edit') }}</a>";
                        actions += "<a href=" + tempDeleteUrl + " class='btn btn-danger btn-icon-text mr-2 p-1 btn-delete-row' data-id=" + row.id + "><i class=' mdi mdi-delete btn-icon-prepend'></i>{{ getLanguage('delete') }}</a>";
                        return actions;
                    }
                },
            ]
        });
    });
</script>

@endpush