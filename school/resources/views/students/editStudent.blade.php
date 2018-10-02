@extends('layouts.app')

@section('content')
<div class="">
    <form data-toggle="validator" action="" method="POST"  enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" value="{{$student->id}}" class="form-control" id="id" name="id"/>
        <div class="">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="control-label">Student Code</label>
                    <input type="text" value="{{$student->code}}" class="form-control" id="code" name="code"/>
                    @if ($errors->has('code'))
                    <span class="text-danger">{{ $errors->first('code') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Student Name</label>
                    <input type="text" value="{{$student->name}}" class="form-control" id="name" name="name"/>
                    @if ($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Class Code</label>
                    <input type="text" value="{{$student->class}}" class="form-control" id="class" name="class"/>
                    @if ($errors->has('class'))
                    <span class="text-danger">{{ $errors->first('class') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Email</label>
                    <input type="email" value="{{$student->email}}" class="form-control" id="email" name="email" />
                    @if ($errors->has('email'))
                    <span class="text-danger">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label class="control-label">Tel</label>
                    <input type="text" value="{{$student->tel}}" class="form-control" id="tel" name="tel"/>
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