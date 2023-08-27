@extends('admin.layout.app')

@section('title','Client')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">{{ __('Client') }}</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ __('Client') }}</li>
            </ol>
            @can('client-create')
            <a href="{{ route('clients.create') }}" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
                <i class="fa fa-plus-circle"></i> Create New
            </a>
            @endcan
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Client') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Dp</th>
                    <th>Personal</th>
					<th>CNIC</th>
                    <th>General</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($clients as $key => $client)
                    <tr>
                        <td>{{ ++$key }}</td>
                        <td>
                            <a href="{{ route('clients.show',$client->id)}}">
                                <img src="{{ asset($client->dp) }}" alt="user" height="80px" width="80px" class="img-circle" />
                            </a>
                        </td>
						<td>
                            <a href="{{ route('clients.show',$client->id)}}">
                                <span><strong>Name:</strong></span>
                                <span>{{ $client->name }}</span><br>
                                <span><strong>Mobile #:</strong></span>
                                <span>{{ $client->mobile }}</span><br>
                                <span><strong>Watsapp #:</strong></span>
                                <span>{{ $client->whatsapp }}</span>
                            </a>
                        </td>
                        <td>
                            <span><strong>Number:</strong></span>
                            <span>{{ $client->cnic }}</span><br>
                            <span><strong>Expiry Date:</strong></span>
                            <span>{{ $client->cnic_expiry }}</span><br>
                            <span><strong>Status:</strong></span>
                            <span>
                                @if(\Carbon\Carbon::parse($client->cnic_expiry) < now())
                                    <span class="label label-warning">Expired</span>
                                @else
                                    <span class="label label-success">Active</span>
                                @endif
                            </span>
                        </td>
                        <td>
                            <span><strong>Branch:</strong></span>
                            <span>{{ $client->branch->title }}</span><br>
                            <span><strong>Start Date:</strong></span>
                            <span>{{ $client->start_date }}</span><br>
                            <span><strong>End Date:</strong></span>
                            <span>{{ $client->ending_date }}</span>
                        </td>
                        <td>@include('admin.client.actions')</td>
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
<script>
    $(function () {
        $(".publish-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This page will be follow and index after this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Publish it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
<script>
    $(function () {
        $(".unpublish-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "This page will be added no follow and no index after this!",
                type: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, UnPublish it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection