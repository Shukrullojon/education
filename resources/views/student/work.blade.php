@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-xl-12">
                <div class="card card-xl-stretch mb-5 mb-xl-8">
                    <div class="card-body py-3">
                        <div class="table-responsive">
                            <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                <tbody>
                                <tr>
                                    <td>Category</td>
                                    <td>Student</td>
                                    <td>Number</td>
                                    <td>Correct</td>
                                    <td>Incorrect</td>
                                    <td></td>
                                </tr>
                                @foreach($pur as $p)
                                    {{--calculate--}}
                                    @php
                                        $number = count($p->pur);
                                        $correct = 0;
                                        $incorrect = 0;
                                        foreach ($p->pur as $t){
                                            if ($t->answer == $t->pt->answer)
                                                $correct++;
                                            else
                                                $incorrect++;
                                        }
                                    @endphp
                                    <tr>
                                        <td>{{ $p->pc->name }}</td>
                                        <td>{{ auth()->user()->name }}</td>
                                        <td>{{ $number }}</td>
                                        <td>{{ $correct }}</td>
                                        <td>{{ $incorrect }}</td>
                                        <td>
                                            <a href="{{ route('studentWorkResult',$p->id) }}">Show</a>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                @if($pu)
                    <div class="card card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bolder fs-3 mb-1">{{ $pu->pc->name }}</span>
                            </h3>
                        </div>
                        <div class="card-body py-3">
                            <div class="table-responsive">
                                <table class="table table-row-dashed table-row-gray-300 align-middle gs-0 gy-4">
                                    <tbody>
                                    <form method="POST" action="{{ route('studentWorkStore') }}">
                                        @csrf
                                        <input type="hidden" name="p_u_id" value="{{ $pu->id }}">
                                        @foreach($pu->pc->ptRand as $key => $t)
                                            <tr>
                                                <td>
                                                    <div class="d-flex align-items-center position-relative mb-7">
                                                        <div
                                                            class="position-absolute top-0 start-0 rounded h-100 bg-secondary w-4px"></div>
                                                        <div class="fw-bold ms-5">
                                                            <h3 class="fs-5 fw-bolder text-dark">{{ $key+1 }}
                                                                ) {{ $t->question }}</h3>
                                                            <div class="fs-7 text-muted">
                                                                <label>A)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="1"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->a }}</label><br><br>
                                                                <label>B)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="2"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->b }}</label><br><br>
                                                                <label>C)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="3"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->c }}</label><br><br>
                                                                <label>D)</label> <input required type="radio"
                                                                                         name="test[{{$t->id}}]"
                                                                                         value="4"
                                                                                         class="form-check-input widget-9-check"
                                                                                         style="margin-left: 5px; margin-right:5px"><label>  {{ $t->d }}</label><br><br>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <br>
                                        <tr>
                                            <td>
                                                <input type="submit" class="form-control">
                                            </td>
                                        </tr>
                                    </form>
                                    </tbody>
                                    <!--end::Table body-->
                                </table>
                                <!--end::Table-->
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                @endif
                <!--end::Tables Widget 9-->
            </div>
        </div>
    </div>
@endsection
