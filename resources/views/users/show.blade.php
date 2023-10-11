@extends('layouts.admin')

@section('content')

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Status</th>
                <th>Roles</th>
            </tr>
            <tr>
                <td>{{ $user->name }} {{ $user->surname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ \App\Helpers\MaskHelper::changePhoneMask($user->phone) }}</td>
                <td>{{ \App\Helpers\StatusHelper::adminStatusGet($user->status) }}</td>
                <td>
                    @if(!empty($user->getRoleNames()))
                        @foreach($user->getRoleNames() as $v)
                            <label class="badge badge-success">{{ $v }}</label>
                        @endforeach
                    @endif
                </td>
            </tr>
        </table>
    </div>

@endsection
