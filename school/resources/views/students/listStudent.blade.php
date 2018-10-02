@extends('layouts.app')
@section('content')
<div class="pull-right">
    <a href="{{route('studentAdd',$class)}}" class="btn btn-success" style="margin-bottom: 10px;">Add student</a>
</div>
<div class="">
    <table  class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>Name</th>
                <th>Class</th>
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
                <th>Class</th>
                <th>Email</th>
                <th>Tel</th>
                <th>Action</th>           
            </tr>
        </tfoot>
        <tbody>
            @forelse($students as $student)
            <tr>
                <td>#{{$student->id}}</td>                    
                <td>{{$student->code}}</td>
                <td>{{$student->name}}</td>
                <td>{{$student->class}}</td>
                <td>{{$student->email}}</td>
                <td>{{$student->tel}}</td>
                <td>  
                    <div class="btn-group dropdown">
                        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('studentEdit',array($student->id,$class))}}"> Edit</a></li>
                            <li>
                                <a href="{{route('studentDelete',array($student->id))}}" onclick="return confirm('Are you sure you want to delete?');"> Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No student found...</td>  
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection