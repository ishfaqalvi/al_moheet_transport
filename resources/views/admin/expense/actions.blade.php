<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
        @can('expense-edit')
        <a class="dropdown-item" href="{{ route('expenses.edit',$expense->id) }}">
            <i class="fa fa-fw fa-edit"></i> Edit
        </a>
        @endcan
        @can('expense-delete')
        <form action="{{ route('expenses.destroy',$expense->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item sa-confirm">
                <i class="fa fa-fw fa-trash"></i> Delete
            </button>
        </form>
        @endcan
    </div>
</div>