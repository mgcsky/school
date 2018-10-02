@extends('layouts.app')

@section('content')
<div class="pull-right">
    <a href="{{route('AddAdmin')}}" class="btn btn-success">Regist Admin</a>
</div>
<div class="">
	<table  class="table table-striped" cellspacing="0" width="100%">
        <thead>
            <tr>                    
                <th>ID</th>
                <th>Email</th>
            </tr>
        </thead>
        <tfoot>
            <tr>                    
                <th>ID</th>
                <th>Email</th>         
            </tr>
        </tfoot>
        <tbody>
            @forelse($admins as $admin)
            <tr>
                <td>#{{$admin->id}}</td>
                <td>{{$admin->email}}</td>
                <td>  
                    <div class="btn-group dropdown">
                        <button class="btn btn-info dropdown-toggle" data-toggle="dropdown" type="button" aria-expanded="false">
                            Action
                            <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('EditAdmin',$admin->id)}}"> Edit</a></li>
                            <li>
                                <a href="{{route('DeleteAdmin',$admin->id)}}" onclick="return confirm('Are you sure you want to delete?');"> Delete</a>
                            </li>
                        </ul>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="4"> No admin found...</td>  
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection