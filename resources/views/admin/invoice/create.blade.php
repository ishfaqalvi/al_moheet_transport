<div id="addInvoice_{{ $key }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Invoice</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('clients.invoices.store')}}" role="form" enctype="multipart/form-data" class="validation">
                    @csrf
                    {{ Form::hidden('client_id', $client->id ) }}
                    {{ Form::hidden('statment_id', $statment->id ) }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('date') }}
                            {{ Form::text('date', '', ['class' => 'form-control mdate' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required']) }}
                            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('amount_in_dirham') }}
                            {{ Form::number('amount_in_dirham','', ['class' => 'form-control' . ($errors->has('amount_in_dirham') ? ' is-invalid' : ''), 'placeholder' => 'Amount In Dirham','required','min' => '0']) }}
                            {!! $errors->first('amount_in_dirham', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('amount_in_rs') }}
                            {{ Form::number('amount_in_rs', '', ['class' => 'form-control' . ($errors->has('amount_in_rs') ? ' is-invalid' : ''), 'placeholder' => 'Amount In Rs','required','min'=>'0']) }}
                            {!! $errors->first('amount_in_rs', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('conversion_rate') }}
                            {{ Form::number('rate', pkrTodirhamConvRate(), ['class' => 'form-control' . ($errors->has('rate') ? ' is-invalid' : ''), 'placeholder' => 'Rate','required','min'=>'0']) }}
                            {!! $errors->first('rate', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('remarks') }}
                            {{ Form::textarea('remarks', '', ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Remarks','rows'=>'2']) }}
                            {!! $errors->first('remarks', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="box-footer mt20 d-flex justify-content-between">
                            <button type="button" class="btn btn-info waves-effect text-white" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>