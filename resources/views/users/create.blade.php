@extends('layouts.admin')

@section('content')
    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Create New User</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-12 mb-xl-12" id="kt_profile_details_view" style="margin: 10px; padding: 10px">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}
        <div class="row">
            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Name:</strong>{!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('name', null, ['placeholder' => 'Name','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Surname:</strong>{!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('surname', null, ['placeholder' => 'Name','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Phone:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('phone', null, ['id' => 'phone','placeholder' => "(XX)XXX-XX-XX", 'required'=>true,'maxlength'=> 13, 'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Email:</strong>{!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::text('email', null, ['required'=>true,'placeholder' => 'Email','class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Password:</strong>{!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::password('password', ['placeholder' => 'Password','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Confirm Password:</strong>{!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::password('confirm-password', ['placeholder' => 'Confirm Password','required'=>true,'class' => 'form-control']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Role:</strong>{!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('roles[]', $roles,[], ['required'=>true,'class' => 'form-control','multiple']) !!}
                </div>
            </div>

            <div class="col-xs-6 col-sm-6 col-md-6">
                <div class="form-group">
                    <strong>Status:</strong> {!! Form::label('*',"*",['style'=>"color:red"]) !!}
                    {!! Form::select('status',\App\Helpers\StatusHelper::$adminStatus, null, ['id' => 'status','required'=>true, 'class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <br>
                <button type="submit" class="btn btn-primary form-control">Submit</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>

@endsection

@section('scripts')
    <script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>
    <script>
        $('#phone').inputmask("(99)999-99-99");
    </script>
@endsection
