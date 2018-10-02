<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\students;

class StudentsController extends Controller
{
	public function __construct()
    {
    	$this->middleware('admin.auth');
    }

	public function get_list($id){
		$students = students::where('class', '=', $id)->paginate(10);
        $class = $id;
        return view('students.listStudent', compact('students','class'));
	}
	public function get_add($id){
        $class = $id;
        return view('students.addStudent', compact('class'));
	}
	public function post_add(Request $request){

		$validator = Validator::make($request->all(), [
            'code'      => 'required|unique:students,code',
            'name'      => 'required',
            'class'   	=> 'required|exists:classes,code',
            'email'     => 'email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('studentAdd')->withErrors($validator)->withInput();
        }
        $add = students::create([
            'code'      => $request->code,
            'name'       => $request->name,
            'email'   => $request->email,
            'class'   => $request->class,
            'tel' => $request->tel,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($add){
        	session()->flash('message.level', 'success');
        }else{
        	session()->flash('message.level', 'error');
        }
        return redirect()->route('studentList',$request->classOld);
	}

	public function get_edit($id,$class){
		
		$student = students::findOrFail($id);

        return view('students.editStudent', compact('student','class'));
	}
    public function post_edit(Request $request){
        
        $students = students::findOrFail($request->id);

        $students->code = $request->code;
        $students->name = $request->name;
        $students->email = $request->email;
        $students->class = $request->class;
        $students->tel = $request->tel;

        $students->save();
        session()->flash('message.level', 'success');

        return redirect()->route('studentList',$request->code);
    }

    public function delete($id){
        
        students::findOrFail($id)->delete();
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'student deleted!');
        return redirect()->back();

    }
}
?>