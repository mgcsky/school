@extends('layouts.app')

@section('content')
<div class="">
	<table  class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>School name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>
            </tr>
        </thead>
        <tfoot>
            <tr>                    
                <th>ID</th>                   
                <th>Code</th>  
                <th>School name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Action</th>           
            </tr>
        </tfoot>
        <tbody>
            @forelse($schools as $school)
            <tr>
                <td>#{{$school->id}}</td>                    
                <td>{{$school->code}}</td>
                <td>{{$school->schoolname}}</td>
                <td>{{$school->email}}</td>
                <td>{{$school->address}}</td>
                <td>  
                    <div class="btn-group dropdown">
                        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href=""> Edit</a></li>
                            <!-- <li>
                                <a href="" onclick="return confirm('Are you sure you want to delete?');"> Delete</a>
                            </li> -->
                            <li><a href=""> </a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No school found...</td>  
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection