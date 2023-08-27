<div class="row">
    <div class="form-group col-md-4">
        {{ Form::label('expense_type') }}
        {{ Form::select('expense_type_id', expenseTypes(), $expense->expense_type_id, ['class' => 'form-control' . ($errors->has('expense_type_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
        {!! $errors->first('expense_type_id', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('amount') }}
        {{ Form::number('amount', $expense->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount','required','min'=>'0']) }}
        {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-4">
        {{ Form::label('date') }}
        {{ Form::text('date', $expense->date, ['class' => 'form-control mdate' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required']) }}
        {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="form-group col-md-12">
        {{ Form::label('remarks') }}
        {{ Form::text('remarks', $expense->remarks, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Remarks']) }}
        {!! $errors->first('remarks', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>