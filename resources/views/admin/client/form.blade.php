<!-- Step 1 -->
<h6>General Info</h6>
<section>
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                <div class="form-group col-md-6">
                    {{ Form::label('branch') }}
                    {{ Form::select('branch_id', branches(), $client->branch_id, ['class' => 'form-control form-select' . ($errors->has('branch_id') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
                    {!! $errors->first('branch_id', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('name') }}
                    {{ Form::text('name', $client->name, ['class' => 'form-control' . ($errors->has('name') ? ' is-invalid' : ''), 'placeholder' => 'Name','required']) }}
                    {!! $errors->first('name', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('mobile') }}
                    {{ Form::text('mobile', $client->mobile, ['class' => 'form-control' . ($errors->has('mobile') ? ' is-invalid' : ''), 'placeholder' => 'Mobile','required']) }}
                    {!! $errors->first('mobile', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('whatsapp') }}
                    {{ Form::text('whatsapp', $client->whatsapp, ['class' => 'form-control' . ($errors->has('whatsapp') ? ' is-invalid' : ''), 'placeholder' => 'Whatsapp','required']) }}
                    {!! $errors->first('whatsapp', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('start_date') }}
                    {{ Form::date('start_date', $client->start_date, ['class' => 'form-control' . ($errors->has('start_date') ? ' is-invalid' : ''), 'placeholder' => 'Start Date','required']) }}
                    {!! $errors->first('start_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-6">
                    {{ Form::label('ending_date') }}
                    {{ Form::date('ending_date', $client->ending_date, ['class' => 'form-control' . ($errors->has('ending_date') ? ' is-invalid' : ''), 'placeholder' => 'Ending Date','required']) }}
                    {!! $errors->first('ending_date', '<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="form-group col-md-12">
                    {{ Form::label('address') }}
                    {{ Form::text('address', $client->address, ['class' => 'form-control' . ($errors->has('address') ? ' is-invalid' : ''), 'placeholder' => 'Address','required']) }}
                    {!! $errors->first('address', '<div class="invalid-feedback">:message</div>') !!}
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ Form::label('dp') }}
                {{ Form::file('dp', ['class' => 'form-control dropify' . ($errors->has('dp') ? ' is-invalid' : ''), $client->dp ? '': 'required','accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => isset($client->dp) ? asset($client->dp) : '', 'data-height' => '280']) }}
                {!! $errors->first('dp', '<div class="invalid-feedback">:message</div>') !!}
            </div>
        </div>
    </div>
</section>
<!-- Step 2 -->
<h6>CNIC</h6>
<section>
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('cnic') }}
            {{ Form::text('cnic', $client->cnic, ['class' => 'form-control' . ($errors->has('cnic') ? ' is-invalid' : ''), 'placeholder' => 'Cnic','required']) }}
            {!! $errors->first('cnic', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('cnic_expiry') }}
            {{ Form::date('cnic_expiry', $client->cnic_expiry, ['class' => 'form-control' . ($errors->has('cnic_expiry') ? ' is-invalid' : ''), 'placeholder' => 'Cnic Expiry','required']) }}
            {!! $errors->first('cnic_expiry', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('cnic_front') }}
            {{ Form::file('cnic_front', ['class' => 'form-control dropify' . ($errors->has('cnic_front') ? ' is-invalid' : ''), $client->cnic_front ? '': 'required','accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => isset($client->cnic_front) ? asset($client->cnic_front) : '', 'data-height' => '280']) }}
            {!! $errors->first('cnic_front', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('cnic_back') }}
            {{ Form::file('cnic_back', ['class' => 'form-control dropify' . ($errors->has('cnic_back') ? ' is-invalid' : ''), $client->cnic_back ? '': 'required','accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => isset($client->cnic_back) ? asset($client->cnic_back) : '', 'data-height' => '280']) }}
            {!! $errors->first('cnic_back', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>
<!-- Step 3 -->
<h6>Passport</h6>
<section>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('hand') }}
            {{ Form::select('passport_hand', ['Client'=>'Client','Company'=>'Company'],$client->passport_hand, ['class' => 'form-control form-select' . ($errors->has('passport_hand') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('passport_hand', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('number') }}
            {{ Form::text('passport', $client->passport, ['class' => 'form-control' . ($errors->has('passport') ? ' is-invalid' : ''), 'placeholder' => 'Passport','required']) }}
            {!! $errors->first('passport', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('expiry_date') }}
            {{ Form::date('passport_expiry', $client->passport_expiry, ['class' => 'form-control' . ($errors->has('passport_expiry') ? ' is-invalid' : ''), 'placeholder' => 'Passport Expiry','required']) }}
            {!! $errors->first('passport_expiry', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('photo') }}
            {{ Form::file('passport_photo', ['class' => 'form-control dropify' . ($errors->has('passport_photo') ? ' is-invalid' : ''), $client->passport_photo ? '': 'required','accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => isset($client->passport_photo) ? asset($client->passport_photo) : '', 'data-height' => '280']) }}
            {!! $errors->first('passport_photo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>
<!-- Step 4 -->
<h6>License</h6>
<section>
    <div class="row">
        <div class="form-group col-md-4">
            {{ Form::label('number') }}
            {{ Form::text('license_no', $client->license_no, ['class' => 'form-control' . ($errors->has('license_no') ? ' is-invalid' : ''), 'placeholder' => 'License No','required']) }}
            {!! $errors->first('license_no', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('expiry_date') }}
            {{ Form::date('license_expiry', $client->license_expiry, ['class' => 'form-control' . ($errors->has('license_expiry') ? ' is-invalid' : ''), 'placeholder' => 'License Expiry','required']) }}
            {!! $errors->first('license_expiry', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-4">
            {{ Form::label('vehicle_number') }}
            {{ Form::text('vehicle_number', $client->vehicle_number, ['class' => 'form-control' . ($errors->has('vehicle_number') ? ' is-invalid' : ''), 'placeholder' => 'Vehicle Number']) }}
            {!! $errors->first('vehicle_number', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('license_photo') }}
            {{ Form::file('license_photo', ['class' => 'form-control dropify' . ($errors->has('license_photo') ? ' is-invalid' : ''), $client->license_photo ? '': 'required','accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => isset($client->license_photo) ? asset($client->license_photo) : '', 'data-height' => '280']) }}
            {!! $errors->first('license_photo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('vehicle_letter') }}
            {{ Form::file('vehicle_letter', ['class' => 'form-control dropify' . ($errors->has('vehicle_letter') ? ' is-invalid' : ''), 'accept'=> 'image/png,image/jpg,image/jpeg','data-default-file' => isset($client->vehicle_letter) ? asset($client->vehicle_letter) : '', 'data-height' => '280']) }}
            {!! $errors->first('vehicle_letter', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>
<!-- Step 5 -->
<h6>Agreement</h6>
<section>
    <div class="row">
        <div class="form-group col-md-6">
            {{ Form::label('type') }}
            {{ Form::select('agreement_type',['Yearly'=>'Yearly','Monthly'=>'Monthly'], $client->agreement_type, ['class' => 'form-control form-select' . ($errors->has('agreement_type') ? ' is-invalid' : ''), 'placeholder' => '--Select--','required']) }}
            {!! $errors->first('agreement_type', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('from') }}
            {{ Form::date('agreement_from', $client->agreement_from, ['class' => 'form-control' . ($errors->has('agreement_from') ? ' is-invalid' : ''), 'placeholder' => 'Agreement From','required']) }}
            {!! $errors->first('agreement_from', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group col-md-6">
            {{ Form::label('to') }}
            {{ Form::date('agreement_to', $client->agreement_to, ['class' => 'form-control' . ($errors->has('agreement_to') ? ' is-invalid' : ''), 'placeholder' => 'Agreement To','required']) }}
            {!! $errors->first('agreement_to', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
</section>