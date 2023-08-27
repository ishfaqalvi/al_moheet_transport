<div id="addStatment" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Add Statment</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{route('clients.statments.store')}}" role="form" enctype="multipart/form-data" class="validation">
                    @csrf
                    {{ Form::hidden('client_id', $client->id ) }}
                    <div class="row">
                        <div class="form-group col-md-12">
                            {{ Form::label('type') }}
                            {{ Form::select('type', ['Advance'=>'Advance','Old Belence'=>'Old Belence','New Balence'=>'New Balence','Other Charges'=>'Other Charges'],'', ['class' => 'form-control form-select' . ($errors->has('type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required','id'=>'type']) }}
                            {!! $errors->first('type', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12" id="chargesTypes" style="display: none;">
                            {{ Form::label('charges_type') }}
                            {{ Form::select('charges_type_id', chargesTypes(), '', ['class' => 'form-control form-select' . ($errors->has('charges_type_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                            {!! $errors->first('charges_type_id', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('amount') }}
                            {{ Form::number('amount', '', ['class' => 'form-control' . ($errors->has('amount') ? ' is-invalid' : ''), 'placeholder' => 'Amount','required','min'=> '0']) }}
                            {!! $errors->first('amount', '<div class="invalid-feedback">:message</div>') !!}
                        </div>
                        <div class="form-group col-md-12">
                            {{ Form::label('date') }}
                            {{ Form::text('date', '', ['class' => 'form-control mdate' . ($errors->has('date') ? ' is-invalid' : ''), 'placeholder' => 'Date','required']) }}
                            {!! $errors->first('date', '<div class="invalid-feedback">:message</div>') !!}
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