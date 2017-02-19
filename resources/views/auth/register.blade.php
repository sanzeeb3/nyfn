@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Membership Registration Form</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('dob') ? ' has-error' : '' }}">
                            <label for="dob" class="col-md-4 control-label">Date Of Birth</label>

                            <div class="col-md-6">
                                <div class="input-group date">
                                    <input id="dob" class="form-control datepicker" placeholder="2012-02-12" type="text" name="dob" value="{{ old('dob') }}" required autofocus>
                                    <div class="input-group-addon">
                                        <span class="glyphicon glyphicon-th"></span>
                                    </div>
                                </div>

                                @if ($errors->has('dob'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('dob') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('gender') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Gender</label>

                            <div class="col-md-6">
                                <select class="form-control" name="gender" value="{{ old('name') }}" required autofocus>
                                    <option value="Male">Male</option>
                                    <option value="1">Female</option>
                                </select>

                                @if ($errors->has('gender'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group{{ $errors->has('p_address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Permanent Address</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="p_address" value="{{ old('p_address') }}" required autofocus></textarea>

                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('t_address') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Temporary Address</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="t_address" value="{{ old('t_address') }}" required autofocus></textarea>

                            </div>
                        </div>

                        
                        <div class="form-group{{ $errors->has('profession') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Profession and Workplace</label>
                            <div class="col-md-6">
                                <textarea class="form-control" name="profession" value="{{ old('profession') }}" required autofocus></textarea>

                            </div>
                        </div>

                    

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div><br>

                        <div class="form-group">

                            <div class="col-md-12">
                               
                                <label class="col-md-12 control-label"> <input type="checkbox" required> I agree to the <a href="">Terms and Conditions</a> of National Youth Federation Nepal.</label>
                            </div>
                        </div>
                      

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
      $('.datepicker').datepicker({
      format: 'yyyy-mm-dd'
    });
</script>
@endsection
