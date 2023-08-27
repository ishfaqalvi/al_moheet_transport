@extends('admin.layout.app')

@section('title','Show Invoice')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Invoice</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('invoices.index') }}">Invoice</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('invoices.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Invoice</h4>
        <table class="table no-border d-flex">
            <tbody>
                <tr>
                    <td class="card-title">Client:</td>
                    <td>{{ $invoice->client->name }}</td>
                </tr>                        <tr>
                    <td class="card-title">Amount In Dirham:</td>
                    <td>{{ number_format($invoice->amount_in_dirham) }}</td>
                </tr>                        <tr>
                    <td class="card-title">Amount In Rs:</td>
                    <td>{{ number_format($invoice->amount_in_rs) }}</td>
                </tr>                        <tr>
                    <td class="card-title">Rate:</td>
                    <td>{{ $invoice->rate }}</td>
                </tr>                        <tr>
                    <td class="card-title">Amount:</td>
                    <td>{{ number_format($invoice->amount) }}</td>
                </tr>                        <tr>
                    <td class="card-title">Date:</td>
                    <td>{{ $invoice->date }}</td>
                </tr>                        <tr>
                    <td class="card-title">Remarks:</td>
                    <td>{{ $invoice->remarks }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection