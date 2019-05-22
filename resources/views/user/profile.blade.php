@extends('layouts.app')
@section('title', __('lang_v1.my_profile'))

@section('content')

<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>@lang('lang_v1.my_profile')</h1>
    <!-- <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Level</a></li>
        <li class="active">Here</li>
    </ol> -->
</section>

<!-- Main content -->
<section class="content">
<div class="row">
    <div class="col-sm-4 col-md-3">
        <div class="user-profile text-center">
            <img src="{{ asset(Auth::user()->profilePic) }}" class="img img-responsive img-circle img-thumbnail" width="140">
            
            <div>
                <p>{{$user->surname}} {{$user->first_name}} {{$user->last_name}}</p>
                <p>{{$user->email}}</p>
                
            </div>
            <hr/>
            <div class="text-left" style="padding-left: 20px;">
                <a href="{{action('UserController@getProfile')}}" >@lang('lang_v1.profile')</a><br>
                <a href="{{url('business/settings')}}">@lang('business.settings')</a>
                
            </div>
        </div>
        
        
    </div>
    <div class="col-sm-7 col-md-8 col-sm-offset-1">        
        <div class="row">
            {!! Form::open(['url' => action('UserController@updateProfile'), 'method' => 'post', 'id' => 'edit_user_profile_form',
                'class' => 'form-horizontal', 'files' => true ]) !!}
                <div class="box box-solid"> <!--business info box start-->
                    <div class="box-header">
                        <div class="box-header">
                            <h3 class="box-title"> @lang('user.edit_profile')</h3>
                            <hr/>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('surname', __('business.prefix') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    {!! Form::text('surname', $user->surname, ['class' => 'form-control','placeholder' => __('business.prefix_placeholder')]); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('first_name', __('business.first_name') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    {!! Form::text('first_name', $user->first_name, ['class' => 'form-control','placeholder' => __('business.first_name'), 'required']); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('last_name', __('business.last_name') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    {!! Form::text('last_name', $user->last_name, ['class' => 'form-control','placeholder' => __('business.last_name')]); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('email', __('business.email') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    {!! Form::email('email',  $user->email, ['class' => 'form-control','placeholder' => __('business.email') ]); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('language', __('business.language') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    {!! Form::select('language',$languages, $user->language, ['class' => 'form-control']); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Profile Picture</label>
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-info"></i>
                                    </span>
                                    <input type="file" name="profilePic" accept="image/*" style="width:100%;padding:10px 15px;background-color:#fff;background-color: #fff;border: 1px solid #ddd;">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">@lang('messages.update')</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
        <div class="row">
            {!! Form::open(['url' => action('UserController@updatePassword'), 'method' => 'post', 'id' => 'edit_password_form',
            'class' => 'form-horizontal' ]) !!}
                <div class="box box-solid"> <!--business info box start-->
                    <div class="box-header">
                        <div class="box-header">
                            <h3 class="box-title"> @lang('user.change_password')</h3>
                            <hr/>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            {!! Form::label('current_password', __('user.current_password') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    {!! Form::password('current_password', ['class' => 'form-control','placeholder' => __('user.current_password'), 'required']); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('new_password', __('user.new_password') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    {!! Form::password('new_password', ['class' => 'form-control','placeholder' => __('user.new_password'), 'required']); !!}
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('confirm_password', __('user.confirm_new_password') . ':', ['class' => 'col-sm-3 control-label']) !!}
                            <div class="col-sm-9">
                                <div class="input-group">
                                    <span class="input-group-addon">
                                        <i class="fa fa-lock"></i>
                                    </span>
                                    {!! Form::password('confirm_password', ['class' => 'form-control','placeholder' =>  __('user.confirm_new_password'), 'required']); !!}
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary pull-right">@lang('messages.update')</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </div>
    
</div>

</section>
<!-- /.content -->

@endsection