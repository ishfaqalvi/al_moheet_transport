<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
        @if($balance > 0)
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#addInvoice_{{ $key }}">
            <i class="fa fa-plus-circle"></i> Add Invoice
        </a>
        @endif
        @if($statment->invoices()->count() > 0)
        <a class="dropdown-item" href="{{ route('clients.statments.print', $statment->id) }}" target="_blank">
            <i class="fa fa-print"></i> Prinit Invoice
        </a>
        @endif
        @can('statment-view')
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#viewStatment_{{ $key }}">
            <i class="fa fa-fw fa-eye"></i> Show
        </a>
        @endcan
        @can('statment-edit')
        <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#editStatment_{{ $key }}">
            <i class="fa fa-fw fa-edit"></i> Edit
        </a>
        @endcan
        @can('statment-delete')
        <form action="{{ route('clients.statments.destroy',$statment->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item sa-confirm">
                <i class="fa fa-fw fa-trash"></i> Delete
            </button>
        </form>
        @endcan
    </div>
</div>
@include('admin.statment.show')
@include('admin.statment.edit')
@include('admin.invoice.create')