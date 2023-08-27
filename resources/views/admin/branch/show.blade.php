@extends('admin.layout.app')

@section('title','Show Branch')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">Show Branch</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('branches.index') }}">Branch</a></li>
            <li class="breadcrumb-item active">Show</li>
        </ol>
        <a href="{{ route('branches.index') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fas fa-arrow-left"></i> {{ __('Back') }} 
        </a>
    </div>
</div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Show Branch</h4>
        <table class="table no-border d-flex">
            <tbody>
                <tr>
                    <td class="card-title">Title</td>
                    <td>{{ $branch->title }}</td>
                </tr>
                <tr>
                    <td class="card-title">Status</td>
                    <td>{{ $branch->status }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection