@extends('Dashboard::backend.default.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading"></div>
        <div class="panel-body">
            @if( isset($user) )
                {!! Form::open(['route' => ['backend.user.update', $user->id], 'method' => 'PUT', 'files' => true, 'id' => 'form-user']) !!}
                {!! Form::hidden('id', $user->id) !!}
            @else
                {!! Form::open(['route' => 'backend.user.store', 'method' => 'post', 'files' => true, 'id' => 'form-user']) !!}
            @endif
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>First Name (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('first_name', isset($user) ? $user->first_name : old('first_name'), ['class' => 'form-control', 'placeholder' => 'First Name'] ) !!}
                        {!! $errors->first('first_name', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Gender (<i class="fa fa-star star-validate"></i>)</label>
                        {!! Form::select('gender', [0 => 'Female', 1 => 'Male'], isset($user) ? $user->gender : old('gender'), ['class' => 'form-control'] ) !!}
                        {!! $errors->first('gender', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Email (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('email', isset($user) ? $user->email : old('email'), ['class' => 'form-control', 'placeholder' => 'example@domain.com'] ) !!}
                        {!! $errors->first('email', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Phone (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('phone', isset($user) ? $user->phone : old('phone'), ['class' => 'form-control', 'placeholder' => 'Phone'] ) !!}
                        {!! $errors->first('phone', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Mobile (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('mobile', isset($user) ? $user->mobile : old('mobile'), ['class' => 'form-control', 'placeholder' => 'Mobile'] ) !!}
                        {!! $errors->first('mobile', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Job</label>
                        {!!Form::text('job', isset($user) ? $user->job : old('job'), ['class' => 'form-control', 'placeholder' => 'Job'] ) !!}
                        {!! $errors->first('job', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Know Us</label>
                        {!!Form::text('know_us', isset($user) ? $user->know_us : old('know_us'), ['class' => 'form-control', 'placeholder' => 'Know Us'] ) !!}
                        {!! $errors->first('know_us', '<span class="help-block error">:message</span>') !!}
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
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Last Name (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('last_name', isset($user) ? $user->last_name : old('last_name'), ['class' => 'form-control', 'placeholder' => 'Last Name'] ) !!}
                        {!! $errors->first('last_name', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div class="form-group">
                        <label>Birthday (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('birthday', isset($user) ? $user->birthday : old('birthday'), ['class' => 'form-control datepicker', 'placeholder' => 'YYYY-MM-DD', "data-date-format"=>"yyyy-mm-dd"] ) !!}
                        {!! $errors->first('birthday', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div id="country" class="form-group">
                        <label>Country (<i class="fa fa-star star-validate"></i>)</label>
                        {!! Form::select('country_id', $countries->toArray(), isset($user) ? $user->country_id : old('country_id'), ['class' => 'form-control'] ) !!}
                        {!! $errors->first('country_id', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div id="town" class="form-group">
                        <label>Town (<i class="fa fa-star star-validate"></i>)</label>
                        {!! Form::select('town_id', ['Select A Town'], isset($user) ? $user->town_id : old('town_id'), ['class' => 'form-control'] ) !!}
                        {!! $errors->first('town_id', '<span class="help-block error">:message</span>') !!}
                    </div>
                    <div id="district" class="form-group">
                        <label>District (<i class="fa fa-star star-validate"></i>)</label>
                        {!! Form::select('district_id', ['Select A District'], isset($user) ? $user->district_id : old('district_id'), ['class' => 'form-control'] ) !!}
                        {!! $errors->first('district_id', '<span class="help-block error">:message</span>') !!}
                    </div>

                    <div id="town" class="form-group">
                        <label>Address (<i class="fa fa-star star-validate"></i>)</label>
                        {!!Form::text('address', isset($user) ? $user->address : old('address'), ['class' => 'form-control', 'placeholder' => 'Address'] ) !!}
                        {!! $errors->first('address', '<span class="help-block error">:message</span>') !!}
                    </div>

                    <div class="form-group">
                        <label>Intro</label>
                        {!!Form::textarea('intro_person', isset($user) ? $user->intro_person : old('intro_person'), ['class' => 'form-control', 'placeholder' => 'Intro'] ) !!}
                        {!! $errors->first('intro_person', '<span class="help-block error">:message</span>') !!}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <label>Customer Group </label>
                    {!! Form::select('group_id', ['Select A Group'] + $groups->toArray(), isset($user) ? $user->group_id : old('group_id'), ['class' => 'form-control chosen-select'] ) !!}
                </div>

                <div class="form-group col-md-6">
                    <label>Customer Organize </label>
                    {!! Form::select('organize_id', ['Select A Organize'] + $organizes->toArray(), isset($user) ? $user->organize_id : old('organize_id'), ['class' => 'form-control chosen-select'] ) !!}
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label>User Roles </label>
                    {!! Form::select('role', $roles, isset($user) && !empty($user->roles()->first()) ?
                    $user->roles()->first()->id : old('role'), ['class' => 'form-control'] ) !!}
                </div>

                <div class="form-group col-md-6">
                    <label>Activated </label>
                    {!!Form::select('activated', [0 => 'Deactivated', 1 => 'Activated'], isset($user) ? $user->activated : old('activated'), ['class' => 'form-control']) !!}
                    {!! $errors->first('state', '<span class="help-block error">:message</span>') !!}
                </div>
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

@section('scripts')
<script>
jQuery(document).ready(function($) {
    $.ajaxSetup({
        headers: {'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')}
    });
    $('select[name="country_id"]').change(function() {
        var id = $(this).val(),
        action = base_url + '/api/address/town/' + id;
        $.get(action, function(res) {
            $('select[name="town_id"]').html(res).trigger("chosen:updated").trigger('change');
        });
    }).trigger('change');

    $('select[name="town_id"]').change(function() {
        var id = $(this).val(),
        action = base_url + '/api/address/district/' + id;
        $.get(action, function(res) {
            $('select[name="district_id"]').html(res).trigger("chosen:updated");
        });
    });
    $( "#form-user" ).validate({
      rules: {
        first_name : { required: true},
        last_name : { required: true},
        email: {
          required: true,
          email: true,
          remote : {
            url:  base_url + '/api/user/info',
            type: "post",
            data: {
              field : 'email',
              value: function() {
                return $( "[name='email']" ).val();
              }
            }
          }
        },
        phone: {
          number : true,
          remote : {
            url:  base_url + '/api/user/info',
            type: "post",
            data: {
              field : 'phone',
              value: function() {
                return $( "[name='phone']" ).val();
              }
            }
          }
        }
      },
      messages: {
        email : {
          remote : 'Địa chỉ email này đã tồn tại'
        },
        phone : {
          remote : 'Số địa thoại này đã tồn tại'
        }
      }
    });

});
</script>
@stop