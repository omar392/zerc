@extends('admin.layouts.master')
@section('content')


<div class="content">
    <div class="container-fluid">
        <div class="page-title-box">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h4 class="page-title">{{ __('admin.counters') }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="{{ route('adminhome') }}">{{ __('admin.home') }}</a></li>
                        <li class="breadcrumb-item active">{{ __('admin.counters') }}</li>
                    </ol>
                </div>
            </div> <!-- end row -->
            <div class="row">
                <div class="col-12">
                    <div class="card m-b-30">
                        <div class="card-body">
                            <form action="" id="counters" method="POST" data-parsley-validate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="counterId" id="counter_id" value="{{$counter->id}}" class="form-control">
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.input0') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $counter->input0 }}" type="text"
                                            name="input0" id="example-text-input"
                                            placeholder="{{ __('admin.input0') }} " parsley-trigger="change" >
                                            <span class="text-danger" id="input0Error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.input2') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $counter->input2 }}" type="text"
                                            name="input2" id="example-text-input"
                                            placeholder="{{ __('admin.input2') }} " parsley-trigger="change" >
                                            <span class="text-danger" id="input2Error"></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input"
                                        class="col-sm-2 col-form-label">{{ __('admin.input3') }}</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" value="{{ $counter->input3 }}" type="text"
                                            name="input3" id="example-text-input"
                                            placeholder="{{ __('admin.input3') }} " parsley-trigger="change" >
                                            <span class="text-danger" id="input3Error"></span>
                                    </div>
                                </div>
                                <div class="form-group text-center m-t-20">
                                    <div class="col-12">
                                        <button class="btn btn-primary btn-block btn-lg" name="submit"
                                            type="submit">{{ __('admin.edit') }}</button>
                                    </div>
                                </div>
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
        let input0 = $("input[name=input0]").val();
        let input2 = $("input[name=input2]").val();
        let input4 = $("input[name=input4]").val();
        let input3 = $("input[name=input3]").val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('body').on('submit','#counters',function (e) {
                e.preventDefault();
                //  alert('asdasd');
                 let id = $('#counter_id').val();
                 var url = '{{ route('counters.update', ':id') }}';
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
                        $('#input0Error').text(response.responseJSON.errors.input0);
                        $('#input2Error').text(response.responseJSON.errors.input2);
                        $('#input3Error').text(response.responseJSON.errors.input3);
                        $('#input4Error').text(response.responseJSON.errors.input4);
                    }

                });
            });
        });
 </script>
@endpush
