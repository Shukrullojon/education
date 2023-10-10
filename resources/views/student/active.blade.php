@extends('layouts.admin')

@section('content')
    <div class="card pt-2 mb-6 mb-xl-9" style="margin: 10px; padding: 10px">
        <div class="card-header border-0">
            <div class="card-title">
                <h2>Students Active</h2>
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
                    <th class="min-w-100px">Event</th>
                    <th class="min-w-100px">Group</th>
                    <th class="min-w-100px">Status</th>
                    <th></th>
                </tr>
                </thead>
                <!--end::Thead-->
                <!--begin::Tbody-->
                <tbody class="fs-6 fw-bold text-gray-600">
                @foreach($students as $student)
                    <tr>
                        <td><i>{{ $student->name }} {{ $student->surname }}</i></td>
                        <td><i>{{ $student->phone }}</i></td>
                        <td><i>{{ $student->event->event->name ?? '' }}</i></td>
                        <td><i>{{ $student->groupList->group->name ?? '' }}</i></td>
                        <td><i>{{ \App\Helpers\StatusHelper::studentStatusGet($student->status) }}</i></td>
                        <td>
                            <a class="btn btn-info" target="_blank" href="{{ route('studentShow',$student->id) }}">Show</a>
                            <a class="btn btn-primary" href="{{ route('studentEdit',$student->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
