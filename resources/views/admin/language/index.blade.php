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
                    <li class="breadcrumb-item"><a href="#">Langauge</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> Language </h5>
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


                    <h4 class="mt-0 header-title">
                        {{ getLanguage('dashboardLanguage') }}
                        @if(Auth::user()->role_id == 1)
                            <button type="button" class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-target=".edu-add-new">
                                Add New
                            </button>
                        @endif
                    </h4>

                        @include('admin.language.add')
                    <div class="modal fade edu-edit-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    </div>
                    <table id="datatable-students" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>S.N</th>
                            <th>Name</th>
                            <th>English Name</th>
                            <th>Nepali Name</th>
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
            ajax: "{{ route('admin.language.json') }}",
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
                    data: 'english_name',
                    render: function (data, type, row) {
                        return row.english_name;
                    }
                },
                {
                    data: 'nepali_name',
                    render: function (data, type, row) {
                        return row.nepali_name;
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        var tempDeleteUrl = "{{ route('admin.language.delete', ':id') }}";
                        tempDeleteUrl = tempDeleteUrl.replace(':id', data);
                        var actions = '';
                        actions += "<button type='button'  class='btn btn-dark btn-icon-text mr-2 p-1 btn-edit-row' data-id=" + row.id + "><i class=' mdi mdi-grease-pencil btn-icon-prepend'></i></button>";
//                        actions += "<a href=" + tempDeleteUrl + " class='btn btn-danger btn-icon-text mr-2 p-1 btn-delete-row' data-id=" + row.id + "><i class=' mdi mdi-delete btn-icon-prepend'></i></a>";
                        return actions;
                    }
                },
            ]
        });
    });
</script>


<script>
    $(document).on("click", ".btn-edit-row", function (e) {
        e.preventDefault();
        $this = $(this);
        var id = $this.attr('data-id');

        var tempEditUrl = "{{ route('admin.language.edit', ':id') }}";
        tempEditUrl = tempEditUrl.replace(':id', id);
        console.log(tempEditUrl);
        var $modal = $('.edu-edit-new');
        $modal.load(tempEditUrl, function (response) {
            $modal.modal('show');
        });
    });

</script>


<script>
    $(document).on('submit', '#languageForm', function (e) {
        e.preventDefault();
        $(this).attr('disabled');
        var form = new FormData($('#languageForm')[0]);
        var params = $('#languageForm').serializeArray();

        var myUrl = "{{ route('admin.language.store') }}";

        $.each(params, function (i, val) {
            form.append(val.name, val.value)
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "POST",
            url: myUrl,
            contentType: false,
            processData: false,
            data: form,
            beforeSend: function (data) {
            },
            success: function (data) {
//                Swal.fire({
//                    position: 'top-end',
//                    type: data.status,
//                    title: data.message,
//                    showConfirmButton: false,
//                    timer: 1500
//                });

                $('#languageForm')[0].reset();

                $('#datatable-students').DataTable().ajax.reload();;

//                $('.edu-add-new').modal('hide');
            },
            error: function (err) {
                if (err.status == 422) {
                    $.each(err.responseJSON.errors, function (i, error) {
                        var el = $(document).find('[name="' + i + '"]');
                        el.after($('<span style="color: red;">' + error[0] + '</span>').fadeOut(15000));
                    });
                }
            }
        });
    });
</script>

@endpush