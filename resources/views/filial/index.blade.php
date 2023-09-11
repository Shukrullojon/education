@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Filial Management</h2>
                <a class="btn btn-success" href="{{ route('filial.create') }}">Create</a>
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
                <th>Address</th>
                <th>Phone</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($filials as $key => $filial)
                <tr>
                    <td>{{ $filial->name }}</td>
                    <td>{{ $filial->address }}</td>
                    <td>{{ $filial->phone }}</td>
                    <td>{{ $filial->status }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('filial.show',$filial->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('filial.edit',$filial->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['filial.destroy', $filial->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $filials->links() }}
                </td>
            </tr>
        </tfooter>
    </div>
@endsection
