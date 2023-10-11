@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="d-flex justify-content-between margin-tb">
                <h2>Results</h2>
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
                <th><b>User</b></th>
                <th><b>Category</b></th>
                <th><b>Attach User</b></th>
                <th><b>Status</b></th>
                <th><b>Number</b></th>
                <th><b>Correct</b></th>
                <th><b>Incorrect</b></th>
                <th><b>Percentage</b></th>
                <th><b>Time</b></th>
                <th width="280px"><b>Action</b></th>
            </tr>
            @foreach ($pus as $key => $p)
                @php
                    $number = count($p->pur);
                    $correct = 0;
                    $incorrect = 0;
                    $percentage = 0;
                    foreach ($p->pur as $t){
                        if ($t->answer == $t->pt->answer)
                            $correct++;
                        else
                            $incorrect++;
                    }
                    if ($number != 0)
                        $percentage = round($correct/$number * 100);
                @endphp
                <tr style="background-color: @if($percentage == 0) #FFCCCC @elseif($percentage > 0 and $percentage <= 30) #FFFFCC @elseif($percentage>30 and $percentage <= 60) #CCFFFF @elseif($percentage>60 and $percentage<=90) #99FF99 @else #009900 @endif ">
                    <td>{{ $p->user->name }}</td>
                    <td>{{ $p->pc->name }}</td>
                    <td>{{ $p->attach->name }}</td>
                    <td>{{ \App\Helpers\PTHelper::placementStatusGet($p->status) }}</td>
                    <td>{{ $number }}</td>
                    <td>{{ $correct }}</td>
                    <td>{{ $incorrect }}</td>
                    <td>{{ $percentage }} %</td>
                    <td>{{ $p->pc->minute }} @if($p->spend_time) ({{ $p->spend_time }}) @endif min</td>
                    <td>
                        <a class="btn btn-info" href="{{ route('studentWorkResult',$p->id) }}">Show</a>
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $pus->links() }}
                </td>
            </tr>
        </tfooter>
    </div>

@endsection
