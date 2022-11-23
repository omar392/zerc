@extends('admin.layouts.master')

@section('content')
    <div class="content">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('admin.banners') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">{{ __('admin.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin.banners') }}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <br>
            <div class="row align-items-center">

                <div class="text-center">
                    <!-- Large modal -->
                    @if (Auth::guard('admin')->user()->hasPermission('banners-create'))
                        <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal"
                            data-target="#modal-add-banner" style="margin-right: 20px;margin-left: 20px;"><i
                                class="fas fa-plus-circle" style="padding-inline-end: 5px;"></i>{{ __('admin.add') }}
                            {{ __('admin.banner') }}</button>
                    @endif
                    <button type="button" class="btn btn-primary reload float-right mb-3"> <i class="fas fa-sync-alt"></i></button>
                </div>

                <!--  Modal content for the above example -->
                <div class="modal fade modal-add-banner" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true" id="modal-add-banner">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0" id="myLargeModalLabel">{{ __('admin.add') }}
                                    {{ __('admin.banner') }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                                    data-target="#modal-add-banner">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <div class="modal-body" id="modal-add-banner">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <form id="addbanner" method="POST" enctype="multipart/form-data" data-parsley-validate>
                                            @csrf
                                            @method('post')

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                       class="col-sm-2 col-form-label">{{ __('admin.title_ar') }}</label>
                                                <div class="col-sm-10">

                                                    <input id ="alert" class="form-control .inp1" value="{{ old('title_ar') }}" type="text"
                                                           name="title_ar" id="example-text-input"
                                                           placeholder="{{ __('admin.title_ar') }} " >
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                       class="col-sm-2 col-form-label">{{ __('admin.title_en') }}</label>
                                                <div class="col-sm-10">
                                                    <input class="form-control .inp2" value="{{ old('title_en') }}"
                                                           name="title_en" id="example-text-input"
                                                           placeholder="{{ __('admin.title_en') }}" >
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">{{ __('admin.description_ar') }}</label>
                                                <div class="col-sm-10">
                                                 <textarea class="form-control .inp3"  name="description_ar" id="" cols="10" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">{{ __('admin.description_en') }}</label>
                                                <div class="col-sm-10">
                                                 <textarea class="form-control .inp4"  name="description_en" id="" cols="10" rows="10"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="example-text-input"
                                                    class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
                                                <div class="col-sm-10">
                                                    <input type="file" name="image" id="image" class="filestyle image" data-buttonname="btn-primary" >
                                                    <img src="https://e7.pngegg.com/pngimages/340/946/png-clipart-avatar-user-computer-icons-software-developer-avatar-child-face.png"
                                                    width="340" height="200" alt=""
                                                    style="margin-right: 70px;border-radius: 15px;"
                                                    class="image-show"/>

                                                </div>
                                            </div>
                                            <div class="form-group text-center m-t-20">
                                                <div class="col-12">
                                                    <button onclick="" class="btn btn-primary btn-block btn-lg" name="submit"
                                                            type="submit">{{ __('admin.add') }}</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div> <!-- end row -->
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <table id="datatable" class="table table-bordered dt-responsive nowrap yajra-datatable"
                            style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>{{ __('admin.title_ar') }}</th>
                                    <th>{{ __('admin.title_en') }}</th>
                                    <th>{{ __('admin.image') }}</th>
                                    <th>{{ __('admin.status') }}</th>
                                    <th>{{ __('admin.action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
            <!-- end col -->
        </div>
    </div>
@endsection
@push('js')
    <script>
        // image preview
        $(".image").change(function() {

            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.image-show').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
        $(function() {
            var locale = '{{ config('app.locale') }}';
            if (locale == 'ar') {
                var table = $('.yajra-datatable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Arabic.json"
                    },
                    processing: true,
                    "language": {
                    "processing": '<i class="fa fa-spinner fa-spin" style="font-size:24px;color:#007bff;"></i>'
                 },
                    serverSide: true,
                    ajax: "{{ route('banners.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'title_ar',
                            name: 'title_ar'
                        },
                        {
                            data: 'title_en',
                            name: 'title_en'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },

                        {
                            data: 'active',
                            name: 'active',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });
            } else {
                var table = $('.yajra-datatable').DataTable({
                    "language": {
                        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/English.json"
                    },
                    processing: true,
                    "language": {
                    "processing": '<i class="fa fa-spinner fa-spin" style="font-size:24px;color:#007bff;"></i>'
                 },
                    serverSide: true,
                    ajax: "{{ route('banners.index') }}",
                    columns: [{
                            data: 'DT_RowIndex',
                            name: 'DT_RowIndex'
                        },
                        {
                            data: 'title_ar',
                            name: 'title_ar'
                        },
                        {
                            data: 'title_en',
                            name: 'title_en'
                        },
                        {
                            data: 'image',
                            name: 'image'
                        },

                        {
                            data: 'active',
                            name: 'active',
                            orderable: true,
                            searchable: true
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        },
                    ]
                });
            }
            $(".reload").click(function() {
                table.ajax.reload(null, false);
            });
        });
    </script>
    <script>
        $('body').on('click', '#check', function() {
            //e.preventDefault();
            var active = $(this).prop('checked') == true ? 1 : 0;
            var banner_id = $(this).data('id');
            // alert(banner_id);
            $.ajax({
                url: '{{ route('banners.status') }}',
                type: 'GET',
                data: {
                    'active': active,
                    'banner_id': banner_id
                },
                success: function(response) {
                    if (response.status == 'success') {
                        toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "showDuration": 500,

                        }
                        toastr['success']("@lang('admin.statuschange')");
                    }
                }
            });
        });
    </script>
    <script>

        $('body').on('submit', '#addbanner', function(e) {
            e.preventDefault();
            if ($('.inp1').is(':empty') || $('.inp2').is(':empty')){
            }
            else {
                $.ajax({
                    url: '{{ route('banners.store') }}',
                    method: "post",
                    data: new FormData(this),
                    dataType: 'json',
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function (response) {

                        if (response.status == 'success') {
                            toastr.options = {
                                "closeButton": true,
                                "progressBar": true,
                                "showDuration": 500,
                                // "rtl": isRtl
                            }
                            toastr['success']("{{ __('admin.addsuccess') }}");
                            $('#datatable').DataTable().ajax.reload();
                            $("#addbanner").trigger("reset");
                            $('#modal-add-banner .close').click();
                            $(".modal-backdrop").remove();
                        } else if (response.status == 'fails') {
                            $.each(response.errors, function(index, value) {
                                toastr['error'](value);
                            });
                        }
                    }
                });
            }
        });
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('body').on('submit', '#sa-params', function(e) {
            e.preventDefault();
            var url = $(this).attr('action');
            $.ajax({
                url: url,
                method: "delete",
                data: {
                    _token: '{{ csrf_token() }}',
                },
                success: function(response) {
                    if (response.status == 'success') {

                        $('#datatable').DataTable().ajax.reload();
                    }

                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        })
        $('body').on('click', '.delete', function (e) {
            var that = $(this)
            e.preventDefault();
            Swal.fire({
                title: "{{ __('admin.wantdelete') }}",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: "{{ __('admin.yes') }}",
                cancelButtonText: "{{ __('admin.cancel') }}",
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1'
                },
                buttonsStyling: false
            }).then(function (result) {
                if (result.isConfirmed) {
                    that.closest('form').submit();
                    Swal.fire({
                        icon: 'success',
                        title: "{{ __('admin.deletedsuccess') }}",
                        customClass: {
                            confirmButton: 'btn btn-success'
                        }
                    });
                }
            });

        });
    </script>
@endpush
