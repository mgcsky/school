@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a href="{{route('classAdd',$department)}}" class="btn btn-success" style="margin-bottom: 10px;">Add Classes</a>
    <a href="{{route('departmentList')}}" class="btn btn-success pull-right" style="margin-bottom: 10px;">Back</a>
</div>
<div class="">
	<table  class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>Name</th>
                <th>Department</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Action</th>           
            </tr>
        </tfoot>
        <tbody>
            @forelse($classes as $class)
            <tr>
                <td>#{{$class->id}}</td>                    
                <td>{{$class->code}}</td>
                <td>{{$class->name}}</td>
                <td>{{$class->department}}</td>
                <td>{{$class->email}}</td>
                <td>{{$class->tel}}</td>
                <td>  
                    <div class="btn-group dropdown">
                        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('classEdit',array($class->id,$department))}}"> Edit</a></li>
                            <li><a href="{{route('studentList',$department)}}"> View students</a></li>
                            <li>
                                <a href="{{route('classDelete',array($class->id))}}" onclick="return confirm('Are you sure you want to delete?');"> Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No class found...</td>  
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection