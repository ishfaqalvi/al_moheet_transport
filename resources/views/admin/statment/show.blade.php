<div id="viewStatment_{{ $key }}" class="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">View Statment</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4 col-xs-6 b-r"> <strong>Type</strong>
                        <br>
                        <p class="text-muted">
                            {{ $statment->type }}
                            @if($statment->type == 'Other Charges')  
                                {{ '('.$statment->chargesType->title .')' }}
                            @endif
                        </p>
                    </div>
                    <div class="col-md-4 col-xs-6 b-r"> <strong>Amount</strong>
                        <br>
                        <p class="text-muted">{{ $statment->amount }}</p>
                    </div>
                    <div class="col-md-4 col-xs-6 b-r"> <strong>Date</strong>
                        <br>
                        <p class="text-muted">{{ $statment->date }}</p>
                    </div>
                    <div class="col-md-12 col-xs-6 b-r"> <strong>Remarks</strong>
                        <br>
                        <p class="text-muted">{{ $statment->remarks }}</p>
                    </div>
                </div>
                @if($statment->invoices()->count() > 0)
                <h4 class="card-title">{{ __('Invoice') }}</h4>
                <table class="table table-striped border">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Amount In Dirham</th>
                            <th>Amount In Rs</th>
                            <th>Rate</th>
                            <th>Amount</th>
                            <th>Remarks</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($statment->invoices as $key => $invoice)
                            <tr>
                                <td>{{ ++$key }}</td>
                                <td>{{ $invoice->date }}</td>
                                <td>{{ number_format($invoice->amount_in_dirham) }}</td>
                                <td>{{ number_format($invoice->amount_in_rs) }}</td>
                                <td>{{ $invoice->rate }}</td>
                                <td>{{ number_format($invoice->amount) }}</td>
                                <td>{{ $invoice->remarks }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif         
            </div>
        </div>
    </div>
</div>