@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered table-row-dashed fs-6 gy-3" id="kt_table_widget_5_table">
            <tr>
                <th>Name</th>
                <th>Time</th>
                <th>During</th>
                <th>Filial</th>
                <th>Price</th>
                <th>One Price</th>
                <th>Status</th>
                <th width="280px">Action</th>
            </tr>
            @foreach ($cources as $key => $cource)
                <tr>
                    <td>{{ $cource->name }}</td>
                    <td>{{ $cource->time }} min</td>
                    <td>{{ $cource->during }} month</td>
                    <td>@if(!empty($cource->filial->name)) {{ $cource->filial->name }} @endif</td>
                    <td>{{ number_format($cource->price,0,' ',' ') }} UZS</td>
                    <td>{{ number_format($cource->one_price,0,' ',' ') }} UZS</td>
                    <td>{{ \App\Helpers\StatusHelper::courceStatusGet($cource->status) }}</td>
                    <td>
                        <div class="btn-group">
                            <a class="" style="margin-right: 10px" href="{{ route('cource.show',$cource->id) }}">
                                <span class="fa fa-eye"></span>
                            </a>
                            <a class="" style="margin-right: 2px" href="{{ route('cource.edit',$cource->id) }}">
                                <span class="fa fa-edit" style="color: #562bb0"></span>
                            </a>

                            <form action="{{ route("cource.destroy", $cource->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input name="_method" type="hidden" value="DELETE">
                                <button type="button" style='display:inline; border:none; background: none' onclick="if (confirm('Вы уверены?')) { this.form.submit() } "><span class="fa fa-trash"></span></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
        <tfooter>
            <tr>
                <td colspan="9">
                    {{ $cources->links() }}
                </td>
            </tr>
        </tfooter>
    </div>
@endsection
