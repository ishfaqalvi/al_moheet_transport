<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
        @can('expenseType-edit')
        <a class="dropdown-item" href="{{ route('expense-types.edit',$expenseType->id) }}">
            <i class="fa fa-fw fa-edit"></i> Edit
        </a>
        @endcan
        @if($expenseType->status == 'UnPublish')
        <form action="{{ route('expense-types.update',$expenseType->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="status" value="Publish">
            <button type="submit" class="dropdown-item publish-confirm">
                <i class="fas fa-upload"></i> Publish
            </button>
        </form>
        @endif
        @if($expenseType->status == 'Publish')
        <form action="{{ route('expense-types.update',$expenseType->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="status" value="UnPublish">
            <button type="submit" class="dropdown-item unpublish-confirm">
                <i class="fas fa-download"></i> UnPublish
            </button>
        </form>
        @endif
        @can('expenseType-delete')
        <form action="{{ route('expense-types.destroy',$expenseType->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item sa-confirm">
                <i class="fa fa-fw fa-trash"></i> Delete
            </button>
        </form>
        @endcan
    </div>
</div>