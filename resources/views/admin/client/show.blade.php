@extends('admin.layout.app')

@section('title','Show Client')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Client</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Client</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        @if($client->invoices()->count() > 0 || $client->statments()->count() > 0)
        <a href="{{ route('clients.invoice', $client->id) }}" target="_blank" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="icons-Printer"></i> {{ __('Invoice') }} 
        </a>
        @endif
        <a href="{{ route('clients.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-5">
        <div class="card">
            <div class="card-body">
                <center class="m-t-30">
                	<img src="{{ asset($client->dp) }}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{ $client->name }}</h4>
                    <h6 class="card-subtitle">{{ $client->cnic }}</h6>
                </center>
            </div>
            <hr>
            <div class="card-body">
                <small class="text-muted">Mobile # </small>
                <h6>{{ $client->mobile }}</h6>
                <small class="text-muted p-t-30 db">Watsapp #</small>
                <h6>{{ $client->watsapp }}</h6>
                <small class="text-muted p-t-30 db">Address</small>
                <h6>{{ $client->address }}</h6>
            </div>
       	<div>
    </div>
</div>
</div>
    <div class="col-lg-9 col-md-7">
        <div class="card">
            <ul class="nav nav-tabs profile-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" data-bs-toggle="tab" href="#statments" role="tab">Statment</a>
                </li>
                <li class="nav-item">
                	<a class="nav-link" data-bs-toggle="tab" href="#general" role="tab">General Info</a>
                </li>
                <li class="nav-item">
                	<a class="nav-link" data-bs-toggle="tab" href="#cnic" role="tab">CNIC</a>
                </li>
                <li class="nav-item"> 
                	<a class="nav-link" data-bs-toggle="tab" href="#passport" role="tab">Passport</a>
                </li>
                <li class="nav-item">
                	<a class="nav-link" data-bs-toggle="tab" href="#license" role="tab">License</a>
                </li>
                <li class="nav-item">
                	<a class="nav-link" data-bs-toggle="tab" href="#agreement" role="tab">Agreement</a>
                </li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
                <!--first tab-->
                <div class="tab-pane active" id="statments" role="tabpanel">
                    @include('admin.client.include.statments')
                </div>
                
                <!--second tab-->
                <div class="tab-pane" id="general" role="tabpanel">
                    @include('admin.client.include.general')
                </div>
                <!--Third tab-->
                <div class="tab-pane" id="cnic" role="tabpanel">
                    @include('admin.client.include.cnic')
                </div>
                <!--Fourth tab-->
                <div class="tab-pane" id="passport" role="tabpanel">
                    @include('admin.client.include.passport')
                </div>
                <!--Fifth tab-->
                <div class="tab-pane" id="license" role="tabpanel">
                    @include('admin.client.include.license')
                </div>
                <!--Sixth tab-->
                <div class="tab-pane" id="agreement" role="tabpanel">
                    @include('admin.client.include.agreement')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection