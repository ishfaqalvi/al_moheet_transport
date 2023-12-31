@extends('admin.layout.app')

@section('title','Create Expense Type')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Create Expense Type</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('expense-types.index') }}">Expense Type</a></li>
            <li class="breadcrumb-item active">Create</li>
        </ol>
        <a href="{{ route('expense-types.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card wizard-content">
    <div class="card-body">
        <h4 class="card-title">Craete Expense Type</h4>
        <form class="validation" action="{{ route('expense-types.store') }}" method="post" role="form" enctype="multipart/form-data">
            @csrf
            @include('admin.expense-type.form') 
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(".validation").validate({
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
        }
    })
</script>
@endsection