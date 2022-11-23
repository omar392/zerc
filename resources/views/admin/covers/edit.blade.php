@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('admin.covers') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">{{ __('admin.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin.covers') }}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="" id="covers" method="POST" data-parsley-validate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="coverId" id="cover_id" value="{{$cover->id}}" class="form-control">

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_about') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_about" id="image_about" value="{{$cover->image_about}}"  class="filestyle image_about" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_about) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_about"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_service') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_service" id="image_service" value="{{$cover->image_service}}"  class="filestyle image_service" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_service) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_service"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_faqs') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_faqs" id="image_faqs" value="{{$cover->image_faqs}}"  class="filestyle image_faqs" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_faqs) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_faqs"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_faqs_2') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_faqs_2" id="image_faqs_2" value="{{$cover->image_faqs_2}}"  class="filestyle image_faqs_2" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_faqs_2) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_faqs_2"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_blog') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_blog" id="image_blog" value="{{$cover->image_blog}}"  class="filestyle image_blog" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_blog) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_blog"/>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_about_2') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_about_2" id="image_about_2" value="{{$cover->image_about_2}}"  class="filestyle image_about_2" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_about_2) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_about_2"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_about_3') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_about_3" id="image_about_3" value="{{$cover->image_about_3}}"  class="filestyle image_about_3" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_about_3) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_about_3"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_gallery') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_gallery" id="image_gallery" value="{{$cover->image_gallery}}"  class="filestyle image_gallery" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_gallery) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_gallery"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_offer') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_offer" id="image_offer" value="{{$cover->image_offer}}"  class="filestyle image_offer" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_offer) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_offer"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_offer_single') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_offer_single" id="image_offer_single" value="{{$cover->image_offer_single}}"  class="filestyle image_offer_single" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_offer_single) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_offer_single"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.image_contact') }}</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image_contact" id="image_contact" value="{{$cover->image_contact}}"  class="filestyle image_contact" data-buttonname="btn-primary" >
                                        <img src="{{ asset('dashboard/' . $cover->image_contact) }}"
                                        width="340" height="200" alt=""
                                        style="margin-right: 70px;border-radius: 15px;"
                                        class="image_contact"/>
                                    </div>
                                </div>



                                @if(Auth::guard('admin')->user()->hasPermission('covers-update'))
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

            $('body').on('submit','#covers',function (e) {
                e.preventDefault();
                //  alert('no problem');
                 let id = $('#cover_id').val();
                 var url = '{{ route('covers.update', ':id') }}';
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

    $(".image_about").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_about').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });

    $(".image_service").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_service').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_faqs").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_faqs').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_faqs_2").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_faqs_2').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_blog").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_blog').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_about_2").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_about_2').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_about_3").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_about_3').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_gallery").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_gallery').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_offer").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_offer').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_offer_single").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_offer_single').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
    $(".image_contact").change(function() {

        if (this.files && this.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('.image_contact').attr('src', e.target.result);
            }

            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
