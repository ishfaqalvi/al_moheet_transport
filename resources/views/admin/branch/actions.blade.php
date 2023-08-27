<div class="btn-group">
    <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Action
    </button>
    <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
        @can('branch-edit')
        <a class="dropdown-item" href="{{ route('branches.edit',$branch->id) }}">
            <i class="fa fa-fw fa-edit"></i> Edit
        </a>
        @endcan
        @if($branch->status == 'UnPublish')
        <form action="{{ route('branches.update',$branch->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="status" value="Publish">
            <button type="submit" class="dropdown-item publish-confirm">
                <i class="fas fa-upload"></i> Publish
            </button>
        </form>
        @endif
        @if($branch->status == 'Publish')
        <form action="{{ route('branches.update',$branch->id) }}" method="POST">
            @csrf
            {{ method_field('PATCH') }}
            <input type="hidden" name="status" value="UnPublish">
            <button type="submit" class="dropdown-item unpublish-confirm">
                <i class="fas fa-download"></i> UnPublish
            </button>
        </form>
        @endif
        @can('branch-delete')
        <form action="{{ route('branches.destroy',$branch->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button type="submit" class="dropdown-item sa-confirm">
                <i class="fa fa-fw fa-trash"></i> Delete
            </button>
        </form>
        @endcan
    </div>
</div>