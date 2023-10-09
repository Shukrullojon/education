@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Placement Test Management</h2>
                <a class="btn btn-success" href="{{ route('pt.create') }}">Create</a>
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
                <th><b>Question</b></th>
                <th><b>A</b></th>
                <th><b>B</b></th>
                <th><b>D</b></th>
                <th><b>D</b></th>
                <th><b>Answer</b></th>
                <th><b>Category</b></th>
                <th width="280px"><b>Action</b></th>
            </tr>
            @foreach ($pts as $key => $pt)
                <tr>
                    <td>{{ $pt->question }}</td>
                    <td>{{ $pt->a }}</td>
                    <td>{{ $pt->b }}</td>
                    <td>{{ $pt->c }}</td>
                    <td>{{ $pt->d }}</td>
                    <td>{{ \App\Helpers\PTHelper::answerGet($pt->answer) }}</td>
                    <td>{{ $pt->pc->name ?? '' }}</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('pt.show',$pt->id) }}">Show</a>
                        <a class="btn btn-primary" href="{{ route('pt.edit',$pt->id) }}">Edit</a>
                        {!! Form::open(['method' => 'DELETE','route' => ['pt.destroy', $pt->id],'style'=>'display:inline']) !!}
                        {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $pts->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
