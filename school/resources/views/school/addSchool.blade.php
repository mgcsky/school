@extends('layouts.app')

@section('content')
<div class="">
	<form data-toggle="validator" action="" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" value="{{old('email')}}" class="form-control" id="email" name="email" data-rule-required="true" data-msg-required="Please enter Email" required/>
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Name</label>
                    <input type="text" value="{{old('name')}}" class="form-control" id="name" name="name"/>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" value="" class="form-control" id="password" name="password" data-rule-required="true" data-msg-required="Please enter Password" required/>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Repeat Password</label>
                    <input type="password" value="" class="form-control" id="repeat_password" name="repeat_password" data-rule-required="true" data-msg-required="Please enter Repeat Password" required/>
                    @if ($errors->has('repeat_password'))
                    <span class="text-danger">{{ $errors->first('repeat_password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Address</label>
                    <input type="text" value="{{old('address')}}" class="form-control" id="address" name="address"/>
                    @if ($errors->has('address'))
                    <span class="text-danger">{{ $errors->first('address') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Tel</label>
                    <input type="text" value="{{old('tel')}}" class="form-control" id="tel" name="tel"/>
                    @if ($errors->has('tel'))
                    <span class="text-danger">{{ $errors->first('tel') }}</span>
                    @endif
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-offset-3">
            <hr>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-submit">Save Changes</button>
            </div>
            </div>
        </div>
    </form>
</div>
@endsection