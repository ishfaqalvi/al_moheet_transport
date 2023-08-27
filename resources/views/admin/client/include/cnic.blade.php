<div class="card-body">
		<div class="row">
        <div class="col-md-4 col-xs-6 b-r"> <strong>CINC Number</strong>
            <br>
            <p class="text-muted">{{ $client->cnic_expiryc }}</p>
        </div>
        <div class="col-md-4 col-xs-6 b-r"> <strong>Expiry Date</strong>
            <br>
            <p class="text-muted">{{ $client->cnic_expiry }}</p>
        </div>
        <div class="col-md-4 col-xs-6 b-r"> <strong>Status</strong>
            <br>
            <p class="text-muted">
            	@if(\Carbon\Carbon::parse($client->cnic_expiry) < now())
                    <span class="label label-warning">Expired</span>
                @else
                    <span class="label label-success">Active</span>
                @endif
        	</p>
        </div>
        <div class="col-md-6 col-xs-6"> <strong>Front Image</strong>
            <br>
            <p class="text-muted"><img src="{{ asset($client->cnic_front) }}" width="100%"></p>
        </div>
        <div class="col-md-6 col-xs-6"> <strong>Back Image</strong>
            <br>
            <p class="text-muted"><img src="{{ asset($client->cnic_back) }}" width="100%"></p>
        </div>
    </div>
</div>