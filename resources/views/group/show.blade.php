@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Show Group</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {{--@foreach($group->teacher as $teach)
                        {{ $teach->teacher->name }}
                    @endforeach--}}
                </div>

                <div class="form-group">
                    {{--@foreach($group->student as $st)
                        {{ $st->student->name }}
                    @endforeach--}}
                </div>


                <div class="row gy-5 g-xl-8">
                    <div class="col-xl-4">
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bolder text-dark">Info</h3>
                            </div>
                            <div class="card-body pt-0">
                                <div class="d-flex align-items-center bg-light-info rounded p-5 mb-7">
                                    <div class="flex-grow-1 me-2">
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Name: <i>{{ $group->name }}</i></a>
                                        <br>
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Type: <i>{{ $group->type }}</i></a>
                                        <br>
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Max Student: <i>{{ $group->max_student }}</i></a>
                                        <br>
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Start: <i>{{ $group->start_time }}</i></a>
                                        <br>
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Cource: <i>{{ $group->cource->name }}</i></a>
                                        <br>
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Filial: <i>{{ $group->filial->name }}</i></a>
                                        <br>
                                        <a class="fw-bolder text-gray-800 text-hover-primary fs-6">Status: <i>{{ $group->status }}</i></a>
                                        <br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bolder text-dark">Details</h3>
                                <div class="card-toolbar">
                                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_room">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                                            </g>
                                        </svg></span>
                                    </button>
                                </div>
                            </div>

                            <div class="card-body pt-2">
                                @foreach($group->detail as $d)
                                    <div class="d-flex align-items-center bg-light-success rounded p-5 mb-7">
                                        <div class="flex-grow-1 me-2">
                                                <a class="fw-bolder text-gray-800 text-hover-primary fs-6">
                                                    Room: <i>{{ $d->room->name }} </i><br>
                                                    Teacher: <i>{{ $d->teacher->name }} </i><br>
                                                    Begin: <i>{{ $d->begin_time }} </i><br>
                                                    End: <i>{{ $d->end_time }} </i><br>
                                                </a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-4">
                        <div class="card card-xl-stretch mb-xl-8">
                            <div class="card-header border-0">
                                <h3 class="card-title fw-bolder text-dark">Students</h3>
                                <div class="card-toolbar">
                                    <button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_create_room">
                                        <!--begin::Svg Icon | path: icons/duotune/general/gen024.svg-->
                                        <span class="svg-icon svg-icon-primary svg-icon-2x"><!--begin::Svg Icon | path:C:\wamp64\www\keenthemes\themes\metronic\theme\html\demo1\dist/../src/media/svg/icons\Code\Plus.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="12" cy="12" r="10"/>
                                                <path d="M11,11 L11,7 C11,6.44771525 11.4477153,6 12,6 C12.5522847,6 13,6.44771525 13,7 L13,11 L17,11 C17.5522847,11 18,11.4477153 18,12 C18,12.5522847 17.5522847,13 17,13 L13,13 L13,17 C13,17.5522847 12.5522847,18 12,18 C11.4477153,18 11,17.5522847 11,17 L11,13 L7,13 C6.44771525,13 6,12.5522847 6,12 C6,11.4477153 6.44771525,11 7,11 L11,11 Z" fill="#000000"/>
                                            </g>
                                        </svg></span>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body pt-0">
                                @foreach($group->student as $s)
                                    <div class="d-flex align-items-center bg-light-danger rounded p-5 mb-7">
                                        <div class="flex-grow-1 me-2">
                                            <a class="fw-bolder text-gray-800 text-hover-primary fs-6">
                                                {{ $s->student->name }}
                                            </a>
                                            <span class="text-muted fw-bold d-block">
                                                Payment:
                                            </span>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="kt_modal_create_room" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered mw-900px">
            <div class="modal-content">
                <div class="modal-header">
                    <h2>Create Room</h2>
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <span class="svg-icon svg-icon-1">
								<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
									<rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
									<rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
								</svg>
							</span>
                    </div>
                </div>

                <div class="modal-body py-lg-10 px-lg-10">
                    <div class="stepper stepper-pills stepper-column d-flex flex-column flex-xl-row flex-row-fluid" id="kt_modal_create_app_stepper">

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
