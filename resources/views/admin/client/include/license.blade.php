<div class="card-body">
    <div class="row">
        <div class="col-md-3 col-xs-6 b-r"> <strong>Number</strong>
            <br>
            <p class="text-muted">{{ $client->license_no }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Expiry Date</strong>
            <br>
            <p class="text-muted">{{ $client->license_expiry }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
            <br>
            <p class="text-muted">
            	@if(\Carbon\Carbon::parse($client->license_expiry) < now())
                    <span class="label label-warning">Expired</span>
                @else
                    <span class="label label-success">Active</span>
                @endif
        	</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Vehicle Number</strong>
            <br>
            <p class="text-muted">{{ $client->vehicle_number }}</p>
        </div>
        <div class="col-md-6 col-xs-6"> <strong>License Photo</strong>
            <br>
            <p class="text-muted">
            	<img src="{{ asset($client->license_photo) }}" width="100%">
            </p>
        </div>
        @if(isset($client->vehicle_letter))
        <div class="col-md-6 col-xs-6"> <strong>Vehicle Letter</strong>
            <br>
            <p class="text-muted">
                <img src="{{ asset($client->vehicle_letter) }}" width="100%">
            </p>
        </div>
        @endif
    </div>
</div>