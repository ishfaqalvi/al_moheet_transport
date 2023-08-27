<div class="btn-group-vertical" role="group" aria-label="Vertical button group">
    <a href="{{ route('clients.statments.index',$client->id )}}" class="btn btn-success">
        Statment
    </a>
    <div class="btn-group">
        <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Action
        </button>
        <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
            @can('client-view')
            <a class="dropdown-item" href="{{ route('clients.show',$client->id) }}">
                <i class="fa fa-fw fa-eye"></i> Show
            </a>
            @endcan
            @can('client-edit')
            <a class="dropdown-item" href="{{ route('clients.edit',$client->id) }}">
                <i class="fa fa-fw fa-edit"></i> Edit
            </a>
            @endcan
            @if($client->status == 'UnPublish')
            <form action="{{ route('clients.update',$client->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="status" value="Publish">
                <button type="submit" class="dropdown-item publish-confirm">
                    <i class="fas fa-upload"></i> Publish
                </button>
            </form>
            @endif
            @if($client->status == 'Publish')
            <form action="{{ route('clients.update',$client->id) }}" method="POST">
                @csrf
                {{ method_field('PATCH') }}
                <input type="hidden" name="status" value="UnPublish">
                <button type="submit" class="dropdown-item unpublish-confirm">
                    <i class="fas fa-download"></i> UnPublish
                </button>
            </form>
            @endif
            @can('client-delete')
            <form action="{{ route('clients.destroy',$client->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="dropdown-item sa-confirm">
                    <i class="fa fa-fw fa-trash"></i> Delete
                </button>
            </form>
            @endcan
        </div>
    </div>
</div>