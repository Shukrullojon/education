@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Task Management</h2>
                <a class="btn btn-success" href="{{ route('task.create') }}">Task</a>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <table class="table table-bordered">
            <tr>
                <th>name</th>
                <th>time</th>
                <th>day</th>
                <th>user</th>
                <th>attach user</th>
                <th>status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($tasks as $key => $task)
                <tr>
                    <td>{{ $task->name }}</td>
                    <td>{{ $task->time }}</td>
                    <td>{{ $task->day }}</td>
                    <td>{{ $task->user->name }}</td>
                    <td>{{ $task->attach_user->name }}</td>
                    <td>{{ $task->status }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('task.show',$task->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('task.edit',$task->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['task.destroy', $task->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $tasks->links() }}
                </td>
            </tr>
        </tfooter>
    </div>
@endsection
