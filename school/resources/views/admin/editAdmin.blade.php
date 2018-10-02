@extends('layouts.app')

@section('content')
<div class="">
	<form data-toggle="validator" action="" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{$admin->id}}" class="form-control" id="id" name="id"/>
        <div class="">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" value="{{$admin->email}}" class="form-control" id="email" name="email" />
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Password</label>
                    <input type="password" value="" class="form-control" id="password" name="password"/>
                    @if ($errors->has('password'))
                    <span class="text-danger">{{ $errors->first('password') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Re password</label>
                    <input type="password" value="" class="form-control" id="password_confirm" name="password_confirm"/>
                    @if ($errors->has('password_confirm'))
                    <span class="text-danger">{{ $errors->first('password_confirm') }}</span>
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