<div class="row">
    <div class="form-group">
        {{ Form::label('title') }}
        {{ Form::text('title', $chargesType->title, ['class' => 'form-control' . ($errors->has('title') ? ' is-invalid' : ''), 'placeholder' => 'Title','required']) }}
        {!! $errors->first('title', '<div class="invalid-feedback">:message</div>') !!}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>