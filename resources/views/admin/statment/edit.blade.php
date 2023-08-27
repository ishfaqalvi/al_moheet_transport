<div id="editStatment_{{ $key }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Update Statment</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('clients.statments.update', $statment->id )}}" role="form" enctype="multipart/form-data" class="validation">
                    {{ method_field('PATCH') }}
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('amount') }}
                            {{ Form::number('amount', $statment->amount, ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount','required','min'=> '0']) }}
                            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('date') }}
                            {{ Form::text('date', $statment->date, ['class' => 'form-control mdate' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required']) }}
                            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('remarks') }}
                            {{ Form::textarea('remarks', $statment->remarks, ['class' => 'form-control' . ($errors->has('remarks') ? ' is-invalid' : ''), 'placeholder' => 'Remarks','rows'=>'2']) }}
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