@extends('admin.layout.app')

@section('title','Statment')

@section('breadcrumb')
<div class="col-md-5 align-self-center">
    <h4 class="text-themecolor">{{ $client->name }}{{ __(' Statment') }}</h4>
</div>
<div class="col-md-7 align-self-center text-end">
    <div class="d-flex justify-content-end align-items-center">
        <ol class="breadcrumb justify-content-end">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
            <li class="breadcrumb-item active">{{ __('Statment') }}</li>
        </ol>
        @if($client->invoices()->count() > 0 || $client->statments()->count() > 0)
        <a href="{{ route('clients.invoice', $client->id) }}" target="_blank" type="button" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="icons-Printer"></i> {{ __('Invoice') }} 
        </a>
        @endif
        @can('statment-create')
        <a href="#" data-bs-toggle="modal" data-bs-target="#addStatment" class="btn btn-info d-none d-lg-block m-l-15 text-white">
            <i class="fa fa-plus-circle"></i> Add Statment
        </a>
        @endcan
    </div>
</div>
@endsection

@section('content')
<div class="row">
    @if ($errors->any())
    <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
    @endif
    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card">
            <div class="box bg-info text-center">
                <h1 class="font-light text-white">
                    {{ number_format($client->statments()->sum('amount')) }}
                </h1>
                <h6 class="text-white">Charged Amount</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card">
            <div class="box bg-success text-center">
                <h1 class="font-light text-white">
                    {{ number_format($client->invoices()->sum('amount')) }}
                </h1>
                <h6 class="text-white">Paid Amount</h6>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-lg-4 col-xlg-2">
        <div class="card">
            <div class="box bg-primary text-center">
                <h1 class="font-light text-white">
                    {{ number_format($client->statments()->sum('amount') - $client->invoices()->sum('amount')) }}
                </h1>
                <h6 class="text-white">Remaining Balance</h6>
            </div>
        </div>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ $client->name }}{{ __(' Statments') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Charged Amount</th>
                    <th>Paid Amount</th>
                    <th>Balance</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($client->statments as $key => $statment)
                @php($paid_amount = $statment->invoices()->sum('amount'))
                @php($balance = $statment->amount - $paid_amount)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        @if($statment->type == 'Other Charges')
                            {{ $statment->type.' ( '.$statment->chargesType->title.' )' }}
                        @else
                            {{ $statment->type }}
                        @endif
                        @if($statment->amount > $paid_amount)
                            <span class="badge rounded-pill bg-warning">Due</span>
                        @else
                            <span class="badge rounded-pill bg-success">Paid</span>
                        @endif
                    </td>
                    <td>{{ $statment->date }}</td>
                    <td>{{ number_format($statment->amount) }}</td>
                    <td>{{ number_format($paid_amount) }}</td>
                    <td>{{ number_format($balance) }}</td>
                    <td>@include('admin.statment.actions')</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@include('admin.statment.create')
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
    var type = $('select[name=type]');
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
        },
        rules: {          
            charges_type_id:{required: function(){if (type.val() =='Other Charges') {return true}}}
        }
    })
</script>
<script>
    $('.mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
    $(function() { 
        $('#type').change(function(){
            if($('#type').val() == 'Other Charges') {
                $('#chargesTypes').show('slow'); 
            } else {
                $('#chargesTypes').hide('slow'); 
            } 
        });
    });
</script>
@endsection