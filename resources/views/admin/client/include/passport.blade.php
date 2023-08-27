<div class="card-body">
    <div class="row">
        <div class="col-md-3 col-xs-6 b-r"> <strong>Hold</strong>
            <br>
            <p class="text-muted">{{ $client->passport_hand }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Number</strong>
            <br>
            <p class="text-muted">{{ $client->passport }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Expiry Date</strong>
            <br>
            <p class="text-muted">{{ $client->passport_expiry }}</p>
        </div>
        <div class="col-md-3 col-xs-6"> <strong>Status</strong>
            <br>
            <p class="text-muted">
            	@if(\Carbon\Carbon::parse($client->passport_expiry) < now())
                    <span class="label label-warning">Expired</span>
                @else
                    <span class="label label-success">Active</span>
                @endif
            </p>
        </div>
        <div class="col-md-6 col-xs-6"> <strong>Image</strong>
            <br>
            <p class="text-muted">
          		<img src="{{ asset($client->passport_photo) }}" width="100%">
            </p>
        </div>
    </div>
</div>