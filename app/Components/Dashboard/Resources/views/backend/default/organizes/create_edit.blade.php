@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($organize) )
                {!! Form::open(['route' => ['backend.organize.update', $organize->id], 'method' => 'PUT']) !!}
                {!! Form::hidden('id', $organize->id) !!}
            @else
                {!! Form::open(['route' => 'backend.organize.store', 'method' => 'post']) !!}
            @endif

            <div class="form-group">
                <label>Name (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('name', isset($organize) ? $organize->name : old('name'), ['class' => 'form-control', 'placeholder' => 'Title'] ) !!}
                {!! $errors->first('name', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Website (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('website', isset($organize) ? $organize->website : old('website'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('website', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Phone (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('phone', isset($organize) ? $organize->phone : old('phone'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('phone', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Fax (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('fax', isset($organize) ? $organize->fax : old('fax'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('fax', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Email (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('email', isset($organize) ? $organize->email : old('email'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('email', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Address (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('address', isset($organize) ? $organize->address : old('address'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('address', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>City (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('city', isset($organize) ? $organize->city : old('city'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('city', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Country (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('country', isset($organize) ? $organize->country : old('country'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('country', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Job (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('job', isset($organize) ? $organize->job : old('job'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('job', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Contact ID (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('contact_id', isset($organize) ? $organize->contact_id : old('contact_id'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('contact_id', '<span class="help-block error">:message</span>') !!}
            </div>
            <div class="form-group">
                <label>Member Care ID (<i class="fa fa-star star-validate"></i>)</label>
                {!!Form::text('member_care_id', isset($organize) ? $organize->member_care_id : old('member_care_id'), ['class' => 'form-control', 'placeholder' => ''] ) !!}
                {!! $errors->first('member_care_id', '<span class="help-block error">:message</span>') !!}
            </div>

            <div class="form-group">
                <a href="{{route('backend.organize.index')}}" class="btn btn-warning">Cancel</a>
                @if(isset($organize))
                    {!! Form::submit('Update', ['class' => 'btn btn-success', 'name' => 'update']) !!}
                @else
                    {!! Form::submit('Create', ['class' => 'btn btn-primary', 'name' => 'create']) !!}
                @endif
            </div>
            {!! Form::close() !!}

        </div>
    </div>


@stop