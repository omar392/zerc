@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('admin.services') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">{{ __('admin.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin.services') }}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="" id="services" method="POST" data-parsley-validate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="serviceId" id="service_id" value="{{$service->id}}" class="form-control">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.title_ar') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $service->title_ar }}" type="text"
                                            name="title_ar" id="example-text-input"
                                            placeholder="{{ __('admin.title_ar') }} " parsley-trigger="change" >
                                            <span class="text-danger" id="title_arError"></span>
                                    </div>

                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.title_en') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $service->title_en }}"
                                            name="title_en" id="example-text-input"
                                            placeholder="{{ __('admin.title_en') }}"  parsley-trigger="change" >
                                            <span class="text-danger" id="title_enError"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.url') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $service->url }}"
                                            name="url" id="example-text-input"
                                            placeholder="{{ __('admin.url') }}"  parsley-trigger="change" >
                                            <span class="text-danger" id="urlError"></span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.description_ar') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="description_ar" id="editor3" cols="10" rows="10">{!! $service->description_ar !!}</textarea>
                                     <script>
                                        CKEDITOR.replace( 'editor3' );
                                     </script>
                                          <span class="text-danger" id="description_arError"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.description_en') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="description_en" id="editor4" cols="10" rows="10">{!! $service->description_en !!}</textarea>
                                     <script>
                                        CKEDITOR.replace( 'editor4' );
                                     </script>
                                        <span class="text-danger" id="description_enError"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image" value="{{$service->image}}"  class="filestyle image" data-buttonname="btn-primary" >
                                        <img src="{{ asset('/dashboard/services/' . $service->image) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image-show"/>
                                    </div>
                                </div>
                                @if(Auth::guard('admin')->user()->hasPermission('services-update'))
                                <div class="form-group text-center m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block btn-lg" name="submit"
                                            type="submit">{{ __('admin.edit') }}</button>
                                    </div>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div> <!-- end col -->
                <a href="{{url()->previous()}}">
                    <button class="btn btn-primary">{{ __('admin.return') }} <i class="fas fa-backward"></i></button>
                </a>
            </div>
        </div>
    </div>
</div>


@endsection
@push('js')
<script>
    $(function () {

        let title_ar = $("input[name=title_ar]").val();
        let title_en = $("input[name=title_en]").val();
        let description_ar = $("input[name=description_ar]").val();
        let description_en = $("input[name=description_en]").val();
        let url = $("input[name=url]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('submit','#services',function (e) {
                e.preventDefault();
                //  alert('no problem');
                 let id = $('#service_id').val();
                 var url = '{{ route('services.update', ':id') }}';
                 url = url.replace(':id', id);
                $.ajax({
                    url: url,
                    method: "post",
                    data: new FormData(this),
                    dataType: 'json',
                    cache       : false,
                    contentType : false,
                    processData : false,

                    success: function (response) {
                        // console.log(response);
                        if(response.status == 'success'){
                            toastr.options = {
                            "closeButton": true,
                            "progressBar": true,
                            "showDuration": 500,
                            // "rtl": isRtl
                        }
                        toastr['info']("{{ __('admin.updatedsuccess') }}");
                        }
                    },
                    error:function (response) {
                        $('#title_arError').text(response.responseJSON.errors.title_ar);
                        $('#title_enError').text(response.responseJSON.errors.title_en);
                        $('#description_arError').text(response.responseJSON.errors.description_ar);
                        $('#description_enError').text(response.responseJSON.errors.description_en);
                    }

                });
            });

        });
 </script>

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
@endpush
