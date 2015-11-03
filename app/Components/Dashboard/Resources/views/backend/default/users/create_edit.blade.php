@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($user) )
                {!! Form::open(['route' => ['backend.user.update', $user->id], 'method' => 'PUT', 'files' => true]) !!}
                {!! Form::hidden('id', $user->id) !!}
            @else
                {!! Form::open(['route' => 'backend.user.store', 'method' => 'post', 'files' => true]) !!}
            @endif
            <div class="form-group">
                <label>First Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('first_name', isset($user) ? $user->first_name : old('first_name'), ['class' => 'form-control', 'placeholder' => 'First Name'] ) !!}
                {!! $errors->first('first_name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Last Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('last_name', isset($user) ? $user->last_name : old('last_name'), ['class' => 'form-control', 'placeholder' => 'Last Name'] ) !!}
                {!! $errors->first('last_name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>City (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('city', isset($user) ? $user->city : old('city'), ['class' => 'form-control', 'placeholder' => 'City'] ) !!}
                {!! $errors->first('city', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>State (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('state', isset($user) ? $user->state : old('state'), ['class' => 'form-control', 'placeholder' => 'State'] ) !!}
                {!! $errors->first('state', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Zipcode (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('zipcode', isset($user) ? $user->zipcode : old('zipcode'), ['class' => 'form-control', 'placeholder' => 'Zip Code'] ) !!}
                {!! $errors->first('zipcode', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Gender (<i class="fa fa-star star-validate"></i>)</label>
                {!! Form::select('gender', [0 => 'Female', 1 => 'Male'], isset($user) ? $user->gender : old('gender'), ['class' => 'form-control'] ) !!}
                {!! $errors->first('gender', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Birthday (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('birthday', isset($user) ? $user->birthday : old('birthday'), ['class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD', "data-date-format"=>"yyyy-mm-dd"] ) !!}
                {!! $errors->first('birthday', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Email (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('email', isset($user) ? $user->email : old('email'), ['class' => 'form-control', 'placeholder' => 'example@domain.com'] ) !!}
                {!! $errors->first('email', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Password {!!isset($user)?'':'(<i class="fa fa-star star-validate"></i>)'!!}</label>
                {!!Form::password('password', ['class' => 'form-control', 'placeholder' => 'Type your password'] ) !!}
                {!! $errors->first('password', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>Password Confirm {!!isset($user)?'':'(<i class="fa fa-star star-validate"></i>)'!!}</label>
                {!!Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm your password'] ) !!}
                {!! $errors->first('password_confirmation', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <label>User Roles </label>
                {!! Form::select('role', $roles, isset($user) && !empty($user->roles()->first()) ?
                $user->roles()->first()->id : old('role'), ['class' => 'form-control'] ) !!}
            </div>

            <div class="form-group">
                <label>Activated </label>
                {!!Form::select('activated', [0 => 'Deactivated', 1 => 'Activated'], isset($user) ? $user->activated : old('activated'), ['class' => 'form-control']) !!}
                {!! $errors->first('state', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <a href="{{route('backend.user.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($user))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop