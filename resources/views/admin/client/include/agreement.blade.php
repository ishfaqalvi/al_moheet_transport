<div class="card-body">
    <div class="row">
        <div class="col-md-3 col-xs-6 b-r"> <strong>Type</strong>
            <br>
            <p class="text-muted">{{ $client->agreement_type }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>From Date</strong>
            <br>
            <p class="text-muted">{{ $client->agreement_from }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>To Date</strong>
            <br>
            <p class="text-muted">{{ $client->agreement_to }}</p>
        </div>
        <div class="col-md-3 col-xs-6 b-r"> <strong>Status</strong>
            <br>
            <p class="text-muted">
            	@if(\Carbon\Carbon::parse($client->agreement_to) < now())
                    <span class="label label-warning">Completed</span>
                @else
                    <span class="label label-success">Active</span>
                @endif
        	</p>
        </div>
    </div>
</div>