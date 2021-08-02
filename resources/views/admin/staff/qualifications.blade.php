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
                    <li class="breadcrumb-item "><a href="{{ route('admin.staff.all') }}">Staffs</a></li>
                    <li class="breadcrumb-item "><a href="{{ route('admin.staff.details',$staff->slug) }}">{{ $staff->name }}</a></li>
                    <li class="breadcrumb-item active"><a href="{{ route('admin.staff.qualifications',$staff->slug) }}">Qualifications</a></li>
                </ol>
            </div>
            <h5 class="page-title">{{ getLanguage('staff').' '.getLanguage('name') }} : {{$staff->name}}</h5>
        </div>
    </div>
    <!-- end row -->

@endsection

@section('contents')

    {{--Page Specific Content--}}
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <h5 class="text-center">{{ getLanguage('qualifications') }}</h5>

                    <form action="{{ route('admin.staff.qualifications_update',$staff->slug) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-qualifications">
                                    <thead>
                                    <tr>
                                        <th>{{ getLanguage('serial-1') }}</th>
                                        <th>{{ getLanguage('details') }}</th>
                                        <th>{{ getLanguage('action') }}</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @php $count=1; @endphp
                                    @foreach($staff->expriences as $exp)
                                        <tr data-row="{{ $count }}">
                                            <td>{{ $count }}</td>
                                            <td>
                                                <label for="">{{ getLanguage('organization-s-name') }}</label>
                                                <input type="text" placeholder="Organization Name"
                                                       name="exp[organization_name][{{$exp->id}}]"
                                                       value="{{$exp->organization_name}}" class="form-control"
                                                       required>
                                                <label for="">{{ getLanguage('job-title') }}</label>
                                                <input type="text" placeholder="Job Title"
                                                       name="exp[job_title][{{$exp->id}}]" value="{{$exp->job_title}}"
                                                       class="form-control" required>
                                                <label for="">{{ getLanguage('job-location') }}</label>
                                                <input type="text" placeholder="Job Location"
                                                       name="exp[job_location][{{$exp->id}}]"
                                                       value="{{$exp->job_location}}" class="form-control">
                                                <label>{{ getLanguage('job-start-date') }}:</label><input type="date" placeholder="Start Date"
                                                                                 name="exp[start_date][{{$exp->id}}]"
                                                                                 value="{{$exp->start_date}}"
                                                                                 class="form-control" required>
                                                <label>{{ getLanguage('job- end-date') }}:</label><input type="date" placeholder="End Date"
                                                                               name="exp[end_date][{{$exp->id}}]"
                                                                               value="{{$exp->end_date}}"
                                                                               class="form-control">
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-danger btn-sm btn-delete-qualifications"
                                                        data-feature=""><i class="fa fa-minus-circle"></i></button>
                                            </td>
                                        </tr>
                                        @php $count++; @endphp
                                    @endforeach
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th>
                                            <button class="btn btn-primary btn-sm btn-add-qualifications">
                                                {{ getLanguage('add-new') }}
                                            </button>
                                        </th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-primary">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('scripts')

{{--Page specific scripts--}}
<script>
    function generateRandomInteger() {
        return Math.floor(Math.random() * 90000) + 10000;
    }

    jQuery(document).on('click', '.btn-delete-qualifications', function (e) {
        e.preventDefault();
        var $this = $(this);
        $this.closest("tr").remove();
    });

    jQuery(document).on('click', '.btn-add-qualifications', function (e) {
        e.preventDefault();
        // console.log('tgd');
        var lastRow = $('table.table-qualifications > tbody > tr').last().attr('data-row');
        var counter = lastRow ? parseInt(lastRow) + 1 : 1;
        var randomInteger = generateRandomInteger();

        var newRow = jQuery('<tr data-row="' + counter + '">' +
            '<td>' + counter + '</td>' +
            '<td>' +
            '<label for="">{{ getLanguage('organization-s-name') }}</label>' +
            '<input type="text" placeholder="Organization Name" name="exp[organization_name][' + randomInteger + ']" class="form-control" required>' +
            '<label for="">{{ getLanguage('job-title') }}</label>' +
            '<input type="text" placeholder="Job Title" name="exp[job_title][' + randomInteger + ']" class="form-control" required>' +
            '<label for="">{{ getLanguage('job-location') }}</label>' +
            '<input type="text" placeholder="Job Location" name="exp[job_location][' + randomInteger + ']" class="form-control" required>' +
            '<label>{{ getLanguage('job-start-date') }}:</label><input type="date" placeholder="Start Date" name="exp[start_date][' + randomInteger + ']" class="form-control" required>' +
            '<label>{{ getLanguage('job-end-date') }}:</label><input type="date" placeholder="End Date" name="exp[end_date][' + randomInteger + ']" class="form-control" required>' +
            '</td>' +
            '<td><button type="button" class="btn btn-danger btn-sm btn-delete-qualifications" data-feature=""><i class="fa fa-minus-circle"></i>&nbsp;{{ getLanguage('delete') }}</button></td>' +
            '</tr>');
        jQuery('table.table-qualifications').append(newRow);
    });


</script>

@endpush