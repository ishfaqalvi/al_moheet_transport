<!DOCTYPE html>
<html>
<head>
	<title>Invoice</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" integrity="sha256-2XFplPlrFClt0bIdPgpz8H7ojnk10H69xRqd9+uTShA=" crossorigin="anonymous" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<style type="text/css">
		body{margin-top:20px;
			background-color:#eee;
		}
		.card {
		    box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
		}
		.card {
		    position: relative;
		    display: flex;
		    flex-direction: column;
		    min-width: 0;
		    word-wrap: break-word;
		    background-color: #fff;
		    background-clip: border-box;
		    border: 0 solid rgba(0,0,0,.125);
		}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="invoice-title">
                        <!-- <h4 class="float-end font-size-15">Invoice #DS0204</h4> -->
                        <div class="mb-4">
                           <h2 class="mb-1 text-muted">{{ settings('company_name') }}</h2>
                        </div>
                        <div class="text-muted">
                            <p class="mb-1">{{ settings('company_address') }}</p>
                            <p class="mb-1"><i class="uil uil-envelope-alt me-1"></i>
                                {{ settings('company_email') }}
                            </p>
                            <p><i class="uil uil-phone me-1"></i>
                                {{ settings('company_phone') }}
                            </p>
                        </div>
                    </div>
                    <hr class="my-4">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="text-muted">
                                <h5 class="font-size-16 mb-3">Billed To:</h5>
                                <h5 class="font-size-15 mb-2">{{ $statment->client->name }}</h5>
                                <p class="mb-1">{{ $statment->client->whatsapp }}</p>
                                <p class="mb-1">{{ $statment->client->mobile }}</p>
                                <p>{{ $statment->client->address }}</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="text-muted text-sm-end">
                                <div>
                                    <h5 class="font-size-15 mb-1">Type:</h5>
                                    <p>
                                        @if($statment->type == 'Other Charges')
                                            {{ $statment->type.' ( '.$statment->chargesType->title.' )' }}
                                        @else
                                            {{ $statment->type }}
                                        @endif
                                    </p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Date:</h5>
                                    <p>{{ $statment->date }}</p>
                                </div>
                                <div class="mt-4">
                                    <h5 class="font-size-15 mb-1">Remarks:</h5>
                                    <p>{{ $statment->remarks }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="py-2">
                        <h5 class="font-size-15">Invoices</h5>
                        <div class="table-responsive">
                            <table class="table align-middle table-nowrap table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th style="width: 70px;">No.</th>
                                        <th>Description</th>
                                        <th>Date</th>
                                        <th>Dirham Amount</th>
                                        <th>PKR Amount</th>
                                        <th>Final Amount</th>
                                    </tr>
                                </thead>
                                <tbody>
                                	@foreach($statment->invoices as $key => $invoice)
                                    <tr>
                                        <th scope="row">{{ ++$key }}</th>
                                        <td>
                                            <div>
                                                <h5 class="text-truncate font-size-14 mb-1">
                                                	{{ $invoice->remarks }}
                                                </h5>
                                                <p class="text-muted mb-0">
                                                	<strong>Currency Rate:</strong>
                                                	{{ $invoice->rate }}
                                                </p>
                                            </div>
                                        </td>
                                        <td>{{ $invoice->date }}</td>
                                        <td>{{ number_format($invoice->amount_in_dirham) }}</td>
                                        <td>{{ number_format($invoice->amount_in_rs) }}</td>
                                        <td>{{ number_format($invoice->amount) }}</td>
                                    </tr>
                                    @endforeach
                                    <tr>
                                        <th scope="row" colspan="5" class="text-end">Total</th>
                                        <td class="text-end">
                                        	{{ $statment->invoices()->sum('amount') }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Charged Amount :
                                        </th>
                                        <td class="border-0 text-end">
                                        	- {{ $statment->amount }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">
                                            Collected Amount:
                                        </th>
                                        <td class="border-0 text-end">
                                        	+ {{ $statment->invoices()->sum('amount')}}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row" colspan="4" class="border-0 text-end">Balence</th>
                                        <td class="border-0 text-end">
                                        	<h4 class="m-0 fw-semibold">
                                        		{{ number_format($statment->invoices()->sum('amount') - $statment->amount) }}
                                        	</h4>
                                    	</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="d-print-none mt-4">
                            <div class="float-end">
                                <a href="javascript:window.print()" class="btn btn-success me-1"><i class="fa fa-print"></i></a>
                                <!-- <a href="#" class="btn btn-primary w-md">Send</a> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end col -->
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</body>
</html>