@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Permission Management</h2>
                <a class="btn btn-success" href="{{ route('permissions.create') }}">Create</a>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($permissions as $key => $permission)
                <tr>
                    <td>{{ $permission->name }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('permissions.show',$permission->id) }}">Show</a>
                        @can('role-edit')
                            <a class="btn btn-primary" href="{{ route('permissions.edit',$permission->id) }}">Edit</a>
                        @endcan
                        @can('role-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['permissions.destroy', $permission->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $permissions->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
