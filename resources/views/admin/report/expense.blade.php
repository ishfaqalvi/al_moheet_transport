@extends('admin.layout.app')

@section('title','Report')
    
@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Report</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Report</li>
            </ol>
            <a class="btn btn-info text-white m-l-15" data-bs-toggle="collapse" href="#filters" aria-expanded="false" aria-controls="collapseExample">
                <i class="fas fa-filter"></i> Filter Data
            </a>
        </div>
    </div>
@endsection

@section('content')
<div class="card collapse {{ !is_null($userRequest) ? 'show' : ''}}" id="filters">
    <div class="card-body">
        <form action="{{ route('reports.expense')}}" method="post" class="validation">
            @csrf
            <div class="row">
                <div class="form-group col-md-5">
                    {{ Form::label('Start Date') }}
                    <input type="text" name="start_date" class="form-control mdate" value="{{ !is_null($userRequest) ? $userRequest->start_date : ''}}" required="required">
                </div>
                <div class="form-group col-md-5">
                    {{ Form::label('End Date') }}
                    <input type="text" name="end_date" class="form-control mdate" value="{{ !is_null($userRequest) ? $userRequest->end_date : ''}}" required="required">
                </div>
                <div class="form-group col-md-2 text-center">
                    {{ Form::label('Submit') }}
                    <input type="submit" class="btn btn-primary form-control" value="Submit">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Category Wise Expense Report</h4>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th class="text-nowrap">Amount</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($expenses as $key => $expense)
                    <tr>
                        <th>{{ ++$key }}</th>
                        <th>{{ $expense['title'] }}</th>
                        <th>{{ number_format($expense['amount']) }}</th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
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
    $('.mdate').bootstrapMaterialDatePicker({ weekStart: 0, time: false });
</script>
@endsection