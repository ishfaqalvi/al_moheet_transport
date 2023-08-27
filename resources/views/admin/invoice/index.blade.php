@extends('admin.layout.app')

@section('title','Invoice')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ __('Invoice') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ __('Invoice') }}</li>
            </ol>
            @can('invoice-create')
            <a href="{{ route('invoices.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fa fa-plus-circle"></i> Create New
            </a>
            @endcan
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Invoice') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Client</th>
					<th>Amount In Dirham</th>
					<th>Amount In Rs</th>
					<th>Rate</th>
					<th>Amount</th>
					<th>Date</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoices as $key => $invoice)
                    <tr>
                        <td>{{ ++$key }}</td>
						<td>{{ $invoice->client->name }}</td>
						<td>{{ number_format($invoice->amount_in_dirham) }}</td>
						<td>{{ number_format($invoice->amount_in_rs) }}</td>
						<td>{{ $invoice->rate }}</td>
						<td>{{ number_format($invoice->amount) }}</td>
						<td>{{ $invoice->date }}</td>
                        <td>@include('admin.invoice.actions')</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(function () {
        $(".datatable").DataTable();
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection