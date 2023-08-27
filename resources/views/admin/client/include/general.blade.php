<div class="card-body">
		<div class="row">
        <div class="col-md-4 col-xs-6 b-r"> <strong>Branch</strong>
            <br>
            <p class="text-muted">{{ $client->branch->title }}</p>
        </div>
        <div class="col-md-4 col-xs-6 b-r"> <strong>Start Date</strong>
            <br>
            <p class="text-muted">{{ $client->start_date }}</p>
        </div>
        <div class="col-md-4 col-xs-6 b-r"> <strong>Ending Date</strong>
            <br>
            <p class="text-muted">{{ $client->ending_date }}</p>
        </div>
        <div class="col-md-12 col-xs-6 b-r"> <strong>Address</strong>
            <br>
            <p class="text-muted">
          		{{ $client->address}}
        	</p>
        </div>
    </div>
</div>