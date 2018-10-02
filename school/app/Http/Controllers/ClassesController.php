<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Validator;
use Carbon\Carbon;
use App\classes;

class ClassesController extends Controller
{
	public function __construct()
    {
    	$this->middleware('admin.auth');
    }

	public function get_list($id){
		$classes = classes::where('department', '=', $id)->paginate(10);
        $department = $id;
        return view('classes.listClasses', compact('classes','department'));
	}
	public function get_add($id){
        $department = $id;
        return view('classes.addClasses', compact('department'));
	}
	public function post_add(Request $request){

		$validator = Validator::make($request->all(), [
            'code'         => 'required|unique:classes,code',
            'name'         => 'required',
            'department'   => 'required|exists:departments,code',
            'email'        => 'email',
        ]);

        if ($validator->fails()) {
            return redirect()->route('classAdd')->withErrors($validator)->withInput();
        }
        $add = classes::create([
            'code'      => $request->code,
            'name'       => $request->name,
            'email'   => $request->email,
            'department'   => $request->department,
            'tel' => $request->tel,
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        if($add){
        	session()->flash('message.level', 'success');
        }else{
        	session()->flash('message.level', 'error');
        }
        return redirect()->route('classList',$request->departmentOld);
	}

	public function get_edit($id,$department){
		
		$class = classes::findOrFail($id);

        return view('classes.editClass', compact('class','department'));
	}
    public function post_edit(Request $request){
        
        $classes = classes::findOrFail($request->id);

        $classes->code = $request->code;
        $classes->name = $request->name;
        $classes->email = $request->email;
        $classes->department = $request->department;
        $classes->tel = $request->tel;

        $classes->save();
        session()->flash('message.level', 'success');

        return redirect()->route('classList',$request->code);

    }

    public function delete($id){
        
        classes::findOrFail($id)->delete();
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'class deleted!');
        return redirect()->back();

    }
}
?>