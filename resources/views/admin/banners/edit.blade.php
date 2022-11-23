@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
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
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="" id="banners" method="POST" data-parsley-validate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="bannerId" id="banner_id" value="{{$banner->id}}" class="form-control">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.title_ar') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $banner->title_ar }}" type="text"
                                            name="title_ar" id="example-text-input"
                                            placeholder="{{ __('admin.title_ar') }} " required parsley-trigger="change" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.title_en') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $banner->title_en }}"
                                            name="title_en" id="example-text-input"
                                            placeholder="{{ __('admin.title_en') }}" required parsley-trigger="change" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.description_ar') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="description_ar" id="" cols="10" rows="10">{!! $banner->description_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.description_en') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="description_en" id="" cols="10" rows="10">{!! $banner->description_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" id="image" value="{{$banner->image}}"  class="filestyle image" data-buttonname="btn-primary" >
                                        <img src="{{ asset('/dashboard/banners/' . $banner->image) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image-show"/>
                                    </div>
                                </div>
                                @if(Auth::guard('admin')->user()->hasPermission('banners-update'))
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
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('submit','#banners',function (e) {
                e.preventDefault();
                //  alert('no problem');
                 let id = $('#banner_id').val();
                 var url = '{{ route('banners.update', ':id') }}';
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
