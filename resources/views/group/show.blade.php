@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2> Show Group</h2>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Name:</strong>
                    {{ $group->name }}
                </div>

                <div class="form-group">
                    <strong>Type:</strong>
                    {{ $group->type }}
                </div>

                <div class="form-group">
                    <strong>Start Time:</strong>
                    {{ $group->start_time }}
                </div>

                <div class="form-group">
                    <strong>Cource:</strong>
                    @if(!empty($group->cource)){{ $group->cource->name }} @endif
                </div>

                <div class="form-group">
                    <strong>Filial:</strong>
                    @if($group->filial) {{ $group->filial->name }} @endif
                </div>

                <div class="form-group">
                    <strong>Room</strong>
                    @foreach($group->gr as $g)
                        {{ $g->room->name }}({{ $g->begin_time }}),
                    @endforeach
                </div>

                <div class="form-group">
                    <strong>Teacher:</strong>
                    @foreach($group->teacher as $teach)
                        {{ $teach->teacher->name }}
                    @endforeach
                </div>

                <div class="form-group">
                    <strong>Students:</strong>
                    @foreach($group->student as $st)
                        {{ $st->student->name }}
                    @endforeach
                </div>

                <div class="form-group">
                    <strong>Status:</strong>
                    {{ $group->status }}
                </div>
            </div>
        </div>
    </div>
@endsection
