@extends('admin.layout.app')

@section('title','Create Client')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Create Client</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Client</a></li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
            <a href="{{ route('clients.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card wizard-content">
    <div class="card-body">
        <h4 class="card-title">Craete Client</h4>
        <form class="validation-wizard wizard-circle" action="{{ route('clients.store') }}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            @include('admin.client.form') 
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.dropify').dropify();
    });
</script>
<script>
    var form = $(".validation-wizard").show();
    var _token = $("input[name='_token']").val();
    $(".validation-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Submit"
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            return currentIndex > newIndex || !(3 === newIndex && Number($("#age-2").val()) < 18) && (currentIndex < newIndex && (form.find(".body:eq(" + newIndex + ") label.error").remove(), form.find(".body:eq(" + newIndex + ") .error").removeClass("error")), form.validate().settings.ignore = ":disabled,:hidden", form.valid())
        },
        onFinishing: function (event, currentIndex) {
            return form.validate().settings.ignore = ":disabled", form.valid()
        },
        onFinished: function (event, currentIndex) {
            form.submit();
        }
    }),
    $(".validation-wizard").validate({
        errorClass: "text-danger",
        highlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().addClass('has-danger');
            $(element).addClass('form-control-danger');
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass)
            $(element).parent().removeClass('has-danger');
            $(element).removeClass('form-control-danger');
            $(element).parent().addClass('has-success');
            $(element).addClass('form-control-success');
        },
        errorPlacement: function (error, element) {
            error.insertAfter(element)
        },
        rules:{
            cnic:{
                "remote":
                {
                    url: "{{ route('clients.check_cnic') }}",
                    type: "POST",
                    data: {
                        _token:_token,
                        cnic: function() {
                            return $("input[name='cnic']").val();
                        }
                    },
                }
            },
        },
        messages:{
            cnic:{
                required: "Please enter a client cnic number.",
                remote: jQuery.validator.format("{0} is already taken.")
            },
        },
    })
</script>
@endsection