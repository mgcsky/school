<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\departments;
use Validator;
use Carbon\Carbon;


class DepartmentsController extends Controller
{
	public function __construct()
    {
    	$this->middleware('admin.auth');
    }

	public function get_list(){
		$departments = departments::paginate(10);
        return view('departments.listDepartment', compact('departments'));
	}
	public function get_add(){
        return view('departments.addDepartment');
	}
	public function post_add(Request $request){

		$validator = Validator::make($request->all(), [
            'code'           => 'required|unique:departments,code',
            'name'        => 'required',
            'email'        => 'email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('departmentAdd')->withErrors($validator)->withInput();
        }
        $add = departments::create([
            'code'      => $request->code,
            'name'       => $request->name,
            'email'   => $request->email,
            'tel' => $request->tel,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($add){
        	session()->flash('message.level', 'success');
        }else{
        	session()->flash('message.level', 'error');
        }
        return redirect()->route('departmentList');
	}

	public function get_edit($id){
		
		$department = departments::findOrFail($id);

        return view('departments.editDepartment', compact('department'));
	}

	public function post_edit(Request $request){
		
		$department = departments::findOrFail($request->id);

		$department->code = $request->code;
		$department->name = $request->name;
		$department->email = $request->email;
		$department->tel = $request->tel;

		$department->save();
		session()->flash('message.level', 'success');

        return redirect()->route('departmentList');
	}

	public function delete($id){
		
		departments::findOrFail($id)->delete();
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'department deleted!');
        return redirect()->back();

	}

}
?>