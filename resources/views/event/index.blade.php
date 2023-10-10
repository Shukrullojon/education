@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Event Management</h2>
                <a class="btn btn-success" href="{{ route('event.create') }}">Create</a>
            </div>
        </div>
    </div>


    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif


        <div class="table-responsive">
            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                <tr>
                    <th>Name</th>
                    <th>Status</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($events as $key => $event)
                    <tr>
                        <td>{{ $event->name }}</td>
                        <td>{{ \App\Helpers\EventHelper::eventStatusGet($event->status) }}</td>
                        <td>
                            <a class="btn btn-info" href="{{ route('event.show',$event->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('event.edit',$event->id) }}">Edit</a>
                            {!! Form::open(['method' => 'DELETE','route' => ['event.destroy', $event->id],'style'=>'display:inline']) !!}
                            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @endforeach
            </table>
            <tfooter>
                <tr>
                    <td colspan="9">
                        {{ $events->links() }}
                    </td>
                </tr>
            </tfooter>
        </div>
    </div>
@endsection
