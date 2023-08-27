<div class="card-body">
    <div class="row">
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-info text-center">
                    <h1 class="font-light text-white">
                        {{ number_format($client->statments()->sum('amount')) }}
                    </h1>
                    <h6 class="text-white">Charged Amount</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white">
                        {{ number_format($client->invoices()->sum('amount')) }}
                    </h1>
                    <h6 class="text-white">Paid Amount</h6>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xlg-2">
            <div class="card">
                <div class="box bg-primary text-center">
                    <h1 class="font-light text-white">
                        {{ number_format($client->statments()->sum('amount') - $client->invoices()->sum('amount')) }}
                    </h1>
                    <h6 class="text-white">Remaining Balance</h6>
                </div>
            </div>
        </div>
    </div>
    <table class="table color-bordered-table success-bordered-table">
        <thead>
            <tr>
                <th>#</th>
                <th>Type</th>
                <th>Date</th>
                <th>Charged Amount</th>
                <th>Paid Amount</th>
                <th width="10px">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($client->statments as $key => $statment)
            @php($paid_amount = $statment->invoices()->sum('amount'))
            <tr>
                <td>{{ ++$key }}</td>
                <td>
                    @if($statment->type == 'Other Charges')
                        {{ $statment->type.' ( '.$statment->chargesType->title.' )' }}
                    @else
                        {{ $statment->type }}
                    @endif
                </td>
                <td>{{ $statment->date }}</td>
                <td>{{ number_format($statment->amount) }}</td>
                <td>{{ number_format($paid_amount) }}</td>
                <td>
                    @if($statment->amount > $paid_amount)
                        <span class="badge rounded-pill bg-warning">Due</span>
                    @else
                        <span class="badge rounded-pill bg-success">Paid</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>