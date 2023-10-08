@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Placement Category Management</h2>
                <a class="btn btn-success" href="{{ route('pc.create') }}">Create</a>
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
                <th><b>Name</b></th>
                <th><b>Status</b></th>
                <th width="280px"><b>Action</b></th>
            </tr>
            @foreach ($pcs as $key => $pc)
                <tr>
                    <td>{{ $pc->name }}</td>
                    <td>{{ \App\Helpers\StatusHelper::taskStatusGet($pc->status) }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('pc.show',$pc->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('pc.edit',$pc->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['pc.destroy', $pc->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $pcs->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
