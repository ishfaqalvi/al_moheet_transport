<div class="row">
    <div class="form-group col-md-6">
        {{ Form::label('client') }}
        {{ Form::select('client_id', clients(), $statment->client_id, ['class' => 'select2 form-control form-select' . ($errors->has('client_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('client_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('type') }}
        {{ Form::select('type', ['Advance'=>'Advance','Old Belence'=>'Old Belence','New Balence'=>'New Balence','Other Charges'=>'Other Charges'],$statment->type, ['class' => 'form-control form-select' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','id'=>'type']) }}
        {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6" id="chargesTypes" style="display: none;">
        {{ Form::label('charges_type') }}
        {{ Form::select('charges_type_id', chargesTypes(), $statment->charges_type_id, ['class' => 'form-control form-select' . ($errors->has('charges_type_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('charges_type_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('amount') }}
        {{ Form::number('amount', $statment->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount','required','min'=> '0']) }}
        {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-6">
        {{ Form::label('date') }}
        {{ Form::text('date', $statment->date, ['class' => 'form-control' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required','id' => 'mdate']) }}
        {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('remarks') }}
        {{ Form::textarea('remarks', $statment->remarks, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Remarks','rows'=>'2']) }}
        {!! $errors->first('remarks', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>