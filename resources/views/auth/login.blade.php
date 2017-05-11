@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">{{ trans('login.login') }}</div>
                    <div class="panel-body">
                        {!! Form::open(['method'=>'POST','url'=>'/login','class'=>'form-horizontal']) !!}
                            {{ csrf_field() }}

                            @if ($message = session('success'))
                                <div class="alert alert-success">
                                    <p>
                                        {{ $message }}
                                    </p>
                                </div>
                            @endif
                            @if ($message = session('warning'))
                                <div class="alert alert-warning">
                                    <p>
                                        {{ $message }}
                                    </p>
                                </div>
                            @endif
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                <label for="email" class="col-md-4 control-label">{{ trans('login.email') }}</label>

                                <div class="col-md-6">
                                    {!! Form::email('email', null, [
                                        'class' => 'form-control',
                                        'placeholder' => trans('login.email'),
                                        'name' => 'email',
                                        'value' => old('email'),
                                        'required' => '',
                                        'autofocus' => '',
                                    ]) !!}
                                    @if ($errors->has('email'))
                                        <span class="help-block"><strong>{{ $errors->first('email') }}</strong></span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <label for="password" class="col-md-4 control-label">{{ trans('login.pass') }}</label>

                                <div class="col-md-6">
                                    {!! Form::password('password', [
                                        'class' => 'form-control',
                                        'placeholder' => trans('login.pass'),
                                        'name' => 'password',
                                        'required' => '',
                                    ]) !!}

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember">{{ trans('login.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-8 col-md-offset-4">
                                    {!! Form::submit(trans('login.login'), ['class'=>'btn btn-primary']) !!}
                                    <a class="btn btn-link" href="{{ url('/password/reset') }}">
                                        {{ trans('login.forgot') }}
                                    </a>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
