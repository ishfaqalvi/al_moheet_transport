<div class="row">
    {{ Form::hidden('amount',0) }}
    <div class="form-group col-md-6">
        {{ Form::label('client') }}
        {{ Form::select('client_id', clients(), $invoice->client_id, ['class' => 'select2 form-control form-select' . ($errors->has('client_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('client_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('date') }}
        {{ Form::text('date', $invoice->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required','id' => 'mdate']) }}
        {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('amount_in_dirham') }}
        {{ Form::number('amount_in_dirham', $invoice->amount_in_dirham, ['class' => 'form-control' . ($errors->has('amount_in_dirham') ? ' is-invalid' : ''), 'placeholder' => 'Amount In Dirham','required','min' => '0']) }}
        {!! $errors->first('amount_in_dirham', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('amount_in_rs') }}
        {{ Form::number('amount_in_rs', $invoice->amount_in_rs, ['class' => 'form-control' . ($errors->has('amount_in_rs') ? ' is-invalid' : ''), 'placeholder' => 'Amount In Rs','required','min'=>'0']) }}
        {!! $errors->first('amount_in_rs', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group">
        {{ Form::label('remarks') }}
        {{ Form::textarea('remarks', $invoice->remarks, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Remarks','required','rows'=>'2']) }}
        {!! $errors->first('remarks', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>