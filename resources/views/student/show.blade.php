@extends('layouts.admin')
{{--
3. Can change student user and event
4. Payment history
5. Attend
6. Homework
--}}
@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Information</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1"
                   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <!--begin::Thead-->
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                <tr class="text-start text-muted gs-0">
                    <th class="min-w-100px">Name</th>
                    <th class="min-w-100px">Phone</th>
                    <th class="min-w-100px">Email</th>
                    <th class="min-w-100px">Reception</th>
                    <th class="min-w-100px">Event</th>
                    <th class="min-w-100px">Status</th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                    <tr>
                        <td><i>{{ $student->name }} {{ $student->surname }}</i></td>
                        <td><i>{{ $student->phone }}</i></td>
                        <td><i>{{ $student->email }}</i></td>
                        <td><i>{{ $student->reception->name ?? '' }}</i></td>
                        <td><i>{{ $student->event->event->name ?? '' }}</i></td>
                        <td><i>{{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</i></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Events</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1"
                   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <!--begin::Thead-->
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                    <tr class="text-start text-muted gs-0">
                        <th class="min-w-100px">Student</th>
                        <th class="min-w-100px">Admin</th>
                        <th class="min-w-100px">Event</th>
                        <th class="min-w-100px">Date</th>
                    </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                    @foreach($student->events as $event)
                        <tr>
                            <td>{{ $event->user->name }}</td>
                            <td>{{ $event->change->name }}</td>
                            <td>{{ $event->event->name }}</td>
                            <td>{{ date("Y-m-d H:i", strtotime($event->created_at)) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Placement</h2>
            </div>
        </div>

        <div class="card-body pt-0">
            <table id="kt_customer_details_invoices_table_1"
                   class="table align-middle table-row-dashed fs-6 fw-bolder gy-5">
                <!--begin::Thead-->
                <thead class="border-bottom border-gray-200 fs-7 text-uppercase fw-bolder">
                <tr class="text-start text-muted gs-0">
                    <th class="min-w-100px">Category</th>
                    <th class="min-w-100px">Student</th>
                    <th class="min-w-100px">Number</th>
                    <th class="min-w-100px">Correct</th>
                    <th class="min-w-100px">Incorrect</th>
                    <th class="min-w-100px">Percentage</th>
                    <th class="min-w-100px">Time</th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                    @foreach($student->pu as $p)
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
                            <td>{{ $p->pc->name }}</td>
                            <td>{{ $student->name }}</td>
                            <td>{{ $number }}</td>
                            <td>{{ $correct }}</td>
                            <td>{{ $incorrect }}</td>
                            <td>{{ $percentage }} %</td>
                            <td>{{ $p->pc->minute }} ({{ $p->spend_time }}) min</td>
                            <td>
                                <a href="{{ route('studentWorkResult',$p->id) }}">Show</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
