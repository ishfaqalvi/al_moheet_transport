<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
        @can('invoice-view')
        <a class="dropdown-item" href="{{ route('invoices.show',$invoice->id) }}">
            <i class="fa fa-fw fa-eye"></i> Show
        </a>
        @endcan
        @can('invoice-edit')
        <a class="dropdown-item" href="{{ route('invoices.edit',$invoice->id) }}">
            <i class="fa fa-fw fa-edit"></i> Edit
        </a>
        @endcan
        @can('invoice-delete')
        <form action="{{ route('invoices.destroy',$invoice->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item sa-confirm">
                <i class="fa fa-fw fa-trash"></i> Delete
            </button>
        </form>
        @endcan
    </div>
</div>