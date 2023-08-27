@extends('admin.layout.app')

@section('title','Notifications')

@section('breadcrumb')
    <div class="col-md-5 align-self-center">
        <h4 class="text-themecolor">Notifications</h4>
    </div>
    <div class="col-md-7 align-self-center text-end">
        <div class="d-flex justify-content-end align-items-center">
            <ol class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">Notifications</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">{{ __('Notifications') }}</h4>
        <table class="datatable table table-striped border">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Message</th>
                    <th>Time</th>
                    <th width="10px">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($notifications as  $key => $notification)
                    <tr>
                        @if($notification->read_at)
                        <td>{{ ++$key }}</td>
                        <td>{{ $notification->data['title'] }}</td>
                        <td>{{ $notification->data['message'] }}</td>
                        <td>{{ $notification->created_at->diffForHumans()}}</td>
                        @else
                        <td><dt>{{ ++$key }}</dt></td>
                        <td><dt>{{ $notification->data['title'] }}</dt></td>
                        <td><dt>{{ $notification->data['message'] }}</dt></td>
                        <td><dt>{{ $notification->created_at->diffForHumans()}}</dt></td>
                        @endif
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-info dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Action
                                </button>
                                <div class="dropdown-menu animated lightSpeedIn dropdown-menu-end">
                                    @if(!$notification->read_at)
                                    <a class="dropdown-item" href="{{ route('notifications.show',$notification->id) }}">
                                        <i class="fa fa-fw fa-eye"></i> Mark as Read
                                    </a>
                                    @endif
                                    <form action="{{ route('notifications.destroy',$notification->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item sa-confirm">
                                            <i class="fa fa-fw fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(function () {
        $(".datatable").DataTable();
        $(".sa-confirm").click(function (event) {
            event.preventDefault();
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.value === true)  $(this).closest("form").submit();
            });
        });
    });
</script>
@endsection
