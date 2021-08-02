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
                    <li class="breadcrumb-item"><a href="#">Slider</a></li>
                    <li class="breadcrumb-item active">Index</li>
                </ol>
            </div>
            <h5 class="page-title"> {{ getLanguage('slider') }} </h5>
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


                    <h4 class="mt-0 header-title">{{ getLanguage('slider') }} {{ getLanguage('list') }}
                        <button type="button" class="btn btn-primary waves-effect waves-light float-right" data-toggle="modal" data-target=".edu-add-new">
                            {{ getLanguage('add-new') }}
                        </button>
                    </h4>

                        @include('admin.slider.add')

                    <div class="modal fade edu-edit-new" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    </div>
                    <table id="datatable-students" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>

                            <th>S.N</th>
                            <th>Slider {{ getLanguage('title') }}</th>
                            <th>Slider {{ getLanguage('image') }}</th>
                            <th>{{ getLanguage('status') }}</th>
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
    <div class="row">
        <div class="col-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4>All Page Heading Banner</h4>
                    <div class="image-container">
                        <img src="{{ asset(getAbout('bannerImage')) }}" id="preview_image" alt="Banner Image" style="height: 500px; width: 100%;">
                    </div>
                    <br>
                    <form action="{{ route('admin.about.bannerImage') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Banner Image</label>
                            <input type="file" name="bannerImage" id="bannerImageInput">
                        </div>
                        <button class="btn btn-success pull-right">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-6">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4>Contact Us Banner</h4>
                    <div class="image-container">
                        <img src="{{ asset(getAbout('contactImage')) }}" id="preview_image2" alt="Banner Image" style="height: 500px; width: 100%;">
                    </div>
                    <br>
                    <form action="{{ route('admin.about.bannerImage') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="">Contact Image</label>
                            <input type="file" name="contactImage" id="bannerImageInput2">
                        </div>
                        <button class="btn btn-success pull-right">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>



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
            ajax: "{{ route('admin.slider.json') }}",
            columns: [
                {
                    data: 'count',
                    render: function (data, type, row) {
                        return row.count;
                    }
                },
                {
                    data: 'title',
                    render: function (data, type, row) {
                        return row.title;
                    }
                },
                {
                    data: 'image',
                    render: function (data, type, row) {

                        return '<img style="width: 150px;height:100px;margin-left:40px;" src=' + row.image + ' >';
                    }
                },
                {data: 'status',
                    render: function (data, type, row) {
                        return data == "Active" ? '<h4 class="ml-5"><span class="badge badge-success">{{ getLanguage("active") }}</span></h4>' : '<span class="badge badge-danger">{{ getLanguage("inactive") }}</span>';
                    }
                },
                {
                    data: 'id',
                    orderable: false,
                    render: function (data, type, row) {
                        var tempDeleteUrl = "{{ route('admin.slider.delete', ':id') }}";
                        tempDeleteUrl = tempDeleteUrl.replace(':id', data);
                        var actions = '';
                        actions += "<button type='button'  class='btn btn-dark btn-icon-text mr-2 p-1 btn-edit-row' data-id=" + row.id + "><i class=' mdi mdi-grease-pencil btn-icon-prepend'></i>{{ getLanguage('edit') }}</button>";
                        actions += "<a href=" + tempDeleteUrl + " class='btn btn-danger btn-icon-text mr-2 p-1 btn-delete-row' data-id=" + row.id + "><i class=' mdi mdi-delete btn-icon-prepend'></i>{{ getLanguage('delete') }}</a>";
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

        var tempEditUrl = "{{ route('admin.slider.edit', ':id') }}";
        tempEditUrl = tempEditUrl.replace(':id', id);
        console.log(tempEditUrl);
        var $modal = $('.edu-edit-new');
        $modal.load(tempEditUrl, function (response) {
            $modal.modal('show');
        });
    });

</script>

<script>
    $('#bannerImageInput').on('change', function(e){
        $this = $(this);
        uploadimages(e, this)
    });

    function uploadimages(e){
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.addEventListener('load',function(){

                const previewImage = document.querySelector('#preview_image')
                console.log(previewImage)
                previewImage.setAttribute("src",reader.result)
            });
            reader.readAsDataURL(file);
        }
    }
</script>

<script>
    $('#bannerImageInput2').on('change', function(e){
        $this = $(this);
        uploadimages2(e, this)
    });

    function uploadimages2(e){
        const file = e.target.files[0];
        if(file){
            const reader = new FileReader();
            reader.addEventListener('load',function(){

                const previewImage = document.querySelector('#preview_image2')
                console.log(previewImage)
                previewImage.setAttribute("src",reader.result)
            });
            reader.readAsDataURL(file);
        }
    }
</script>


@endpush
