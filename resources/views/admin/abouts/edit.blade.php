@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('admin.abouts') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">{{ __('admin.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin.abouts') }}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="" id="abouts" method="POST" data-parsley-validate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="aboutId" id="about_id" value="{{$about->id}}" class="form-control">

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.mission_ar') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="mission_ar" id="" cols="10" rows="10">{!! $about->mission_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.mission_en') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="mission_en" id="" cols="10" rows="10">{!! $about->mission_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.vision_ar') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="vision_ar" id="" cols="10" rows="10">{!! $about->vision_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.vision_en') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="vision_en" id="" cols="10" rows="10">{!! $about->vision_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.about_ar') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="about_ar" id="" cols="10" rows="10">{!! $about->about_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.about_en') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="about_en" id="" cols="10" rows="10">{!! $about->about_en !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.goals_ar') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="goals_ar" id="" cols="10" rows="10">{!! $about->goals_ar !!}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.goals_en') }}</label>
                                    <div class="col-sm-10">
                                     <textarea class="form-control"  name="goals_en" id="" cols="10" rows="10">{!! $about->goals_en !!}</textarea>
                                    </div>
                                </div>

                                @if(Auth::guard('admin')->user()->hasPermission('abouts-update'))
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

            $('body').on('submit','#abouts',function (e) {
                e.preventDefault();
                //  alert('no problem');
                 let id = $('#about_id').val();
                 var url = '{{ route('abouts.update', ':id') }}';
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
@endpush
