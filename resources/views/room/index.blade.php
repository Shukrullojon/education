@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Room Management</h2>
                <a class="btn btn-success" href="{{ route('room.create') }}">Create</a>
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
                <th>Name</th>
                <th>Filial</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($rooms as $key => $room)
                <tr>
                    <td>{{ $room->name }}</td>
                    <td>{{ $room->filial_id }}</td>
                    <td>{{ $room->status }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('room.show',$room->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('room.edit',$room->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['room.destroy', $room->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $rooms->links() }}
                </td>
            </tr>
        </tfooter>
    </div>
@endsection
