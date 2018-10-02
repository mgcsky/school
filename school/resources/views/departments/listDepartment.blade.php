@extends('layouts.app')

@section('content')
<div class="pull-right">
    <a href="{{route('departmentAdd')}}" class="btn btn-success">Add Department</a>
</div>
<div class="">
	<table  class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>name</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>name</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Action</th>           
            </tr>
        </tfoot>
        <tbody>
            @forelse($departments as $department)
            <tr>
                <td>#{{$department->id}}</td>                    
                <td>{{$department->code}}</td>
                <td>{{$department->name}}</td>
                <td>{{$department->email}}</td>
                <td>{{$department->tel}}</td>
                <td>  
                    <div class="btn-group dropdown">
                        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('departmentEdit',$department->id)}}"> Edit</a></li>
                            <li><a href="{{route('classList',$department->code)}}"> View classes</a></li>
                            <li>
                                <a href="{{route('departmentDelete',array($department->id))}}" onclick="return confirm('Are you sure you want to delete?');"> Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No department found...</td>  
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection