@extends('admin.layout.app')

@section('title','Settings')
    
@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Settings</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">Settings</li>
        </ol>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-header bg-info">
        <h4 class="m-b-0 text-white">General Settings</h4>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('settings.save') }}" class="form-horizontal form-bordered" role="form" enctype="multipart/form-data">
            @csrf
            <div class="form-body">
                <div class="form-group row">
                    <label class="control-label text-end col-md-3">Company Name</label>
                    <div class="col-md-9">
                        {{ Form::text('values[company_name]', settings('company_name'),['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-3">Company Email</label>
                    <div class="col-md-9 mt-2">
                        {{ Form::text('values[company_email]', settings('company_email'),['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-3">Company Phone</label>
                    <div class="col-md-9 mt-2">
                        {{ Form::text('values[company_phone]', settings('company_phone'),['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-3">Company Address</label>
                    <div class="col-md-9 mt-2">
                        {{ Form::text('values[company_address]', settings('company_address'),['class' => 'form-control']) }}
                    </div>
                    <label class="control-label mt-2 text-end col-md-3">Company Logo</label>
                    <div class="col-md-9 mt-2">
                        {{ Form::file('company_logo', ['class' => 'form-control dropify' . ($errors->has('company_logo') ? ' is-invalid' : ''), 'accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => settings('company_logo') != '' ? asset(settings('company_logo')) : '']) }}
                    </div>
                </div>
                <!-- <div class="form-group row">
                    <label class="control-label text-end col-md-2">Google Search Console Code</label>
                    <div class="col-md-10">
                        {{ Form::textarea('values[google_search_console_code]', settings('google_search_console_code'), ['class' => 'form-control','rows'=>'4']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Google Analytics Code</label>
                    <div class="col-md-10">
                        {{ Form::textarea('values[google_analytics_code]', settings('google_analytics_code'), ['class' => 'form-control','rows'=>'4']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Clarity Code</label>
                    <div class="col-md-10">
                        {{ Form::textarea('values[clarity_code]', settings('clarity_code'), ['class' => 'form-control','rows'=>'4']) }}
                    </div>
                </div>
                <div class="form-group row">
                    <label class="control-label text-end col-md-2">Contact Us Message</label>
                    <div class="col-md-10">
                        {{ Form::text('values[contact_us_message]', settings('contact_us_message'), ['class' => 'form-control']) }}
                    </div>
                </div> -->
            </div>
            @can('settings-create')
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="offset-sm-3 col-md-9">
                                <button type="submit" class="btn btn-success text-white"> <i class="fa fa-check"></i> Submit</button>
                                <button type="button" class="btn btn-inverse">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endcan
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
@endsection