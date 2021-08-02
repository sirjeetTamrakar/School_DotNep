@extends('admin.layouts.master')

@push('styles')

{{--Page specific styles--}}
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://kit.fontawesome.com/3a77735fb2.js" crossorigin="anonymous"></script>
<style>
    .select2-container {
        width: 100% !important;
        padding: 0;
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
                    <li class="breadcrumb-item"><a href="#">Exam</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('exam') }} </h5>
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
                        {{ getLanguage('exam').' '.getLanguage('list') }}
                        <button type="button" id="add_exam" class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-target=".edu-add-new">
                            {{ getLanguage('add-new').' '.getLanguage('exam') }}
                        </button>
                    </h4>
                        @include('admin.exam.add')
                    <div class="modal fade edu-edit-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    </div>

                    <div class="modal fade edu-result-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    </div>
                    <table id="datatable" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>{{ getLanguage('serial') }}</th>
                            <th>{{ getLanguage('exam').' '.getLanguage('title') }}</th>
                            <th>{{ getLanguage('exam-start-date') }}</th>
                            <th>{{ getLanguage('grade') }}</th>
                            <th>{{ getLanguage('action') }}</th>
                        </tr>
                        </thead>

                        @foreach($exams as $exam)
                            <tr>
                                <td>{{ $exam->count }}</td>
                                <td>{{ $exam->title }}</td>
                                <td>{{ $exam->start_date }}</td>
                                <td>

                                    <table width="100%" border="0" bgcolor="" cellspacing="0">
                                        <tr>
                                            <th>
                                                {{ getLanguage('grade') }}
                                            </th>
                                            <th>
                                                {{ getLanguage('action') }}
                                            </th>
                                        </tr>
                                        @if($exam->grades)
                                            @foreach($exam->grades as $grade)
                                                <tr>
                                                    <td>
                                                        {{ getLanguage('grade') }} {{ $grade->title }}

                                                        @if($grade->results->isNotEmpty())
                                                        <i class="fas fa-check-circle" style="color: green"></i>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button type='button'  class='btn btn-primary btn-icon-text mr-2 p-1 btn-result-row' grade-id="{{ $grade->id }}" data-id="{{ $exam->id }}"><i class=" mdi mdi-plus btn-icon-prepend"></i>{{ getLanguage('result') }}</button>
                                                        @if($exam->month >= 9)
                                                        <a href='{{ route('admin.exam.pass.student', $grade->id) }}'  class='btn btn-success btn-icon-text mr-2 p-1'><i class=" mdi mdi-plus btn-icon-prepend"></i>Upgrade Student</a>
                                                            @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </table>

                                </td>
                                <td>
                                    <button type="button" id="edit_exam" class="btn btn-dark btn-icon-text mr-2 p-1 btn-edit-row" data-id="{{ $exam->id }}" ><i class=" mdi mdi-grease-pencil btn-icon-prepend"></i>{{ getLanguage('exam').' '.getLanguage('edit') }}</button>
                                    <a href="{{ route('admin.exam.delete', $exam->id) }}" class="btn btn-danger btn-icon-text mr-2 p-1 btn-delete-row" data-id="1"><i class=" mdi mdi-delete btn-icon-prepend"></i>{{ getLanguage('exam').' '.getLanguage('delete') }}</a>
                                </td>
                            </tr>
                        @endforeach


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


<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>
{{--Select 2 INIT--}}
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>



<script>
    $(document).on("click", ".btn-edit-row", function (e) {
        e.preventDefault();
        $this = $(this);
        var id = $this.attr('data-id');

        var tempEditUrl = "{{ route('admin.exam.edit', ':id') }}";
        tempEditUrl = tempEditUrl.replace(':id', id);
        console.log(tempEditUrl);
        var $modal = $('.edu-edit-new');
        $modal.load(tempEditUrl, function (response) {
            $modal.modal('show');
        });
    });

</script>


<script>
    $(document).on("click", ".btn-result-row", function (e) {
        e.preventDefault();
        $this = $(this);
        var id = $this.attr('data-id');
        var grade_id = $this.attr('grade-id');

        var tempResultUrl = "{{ route('admin.exam.result', [':id', ':grade_id']) }}";
        tempResultUrl = tempResultUrl.replace(':id', id);
        tempResultUrl = tempResultUrl.replace(':grade_id', grade_id);
        console.log(tempResultUrl);
        var $modal = $('.edu-result-new');
        $modal.load(tempResultUrl, function (response) {
            $modal.modal('show');
        });
    });







</script>

<script>
     $(document).on("click", ".res_update", function (e) {
        e.preventDefault();
        $this = $(this);
        alert($this);
        });


</script>

<!-- <script>
     var mainInput =  $(".nepali-datepicker");

       /* Initialize Datepicker with options */
    mainInput.nepaliDatePicker({
        dateFormat: "MM/DD/YYYY"
    });

    var apple = NepaliFunctions.GetCurrentBsDate();
    console.log(NepaliFunctions.ConvertDateFormat(apple, "MM/DD/YYYY"))
</script> -->



@endpush
