<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Validator;
use App\Admin;
use Auth;


class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin.auth');
    }

    public function home(){
        return view('admin-home');
    }

    public function get_list(){
        $admins = admin::paginate(10);
        return view('admin.listAdmin', compact('admins'));
    }

    public function get_add(){
        return view('admin.addAdmin');
    }
    public function post_add(Request $request){

        $validator = Validator::make($request->all(), [
            'email'    => 'required|email|unique:admin,email',
            'password' => 'required|string|min:6:max:32|confirmed',
        ]);

        if ($validator->fails()) {
            return redirect()->route('AddAdmin')->withErrors($validator)->withInput();
        }
        $add = Admin::create([
            'email'   => $request->email,
            'password'   => bcrypt($request->password),
            'created_at' => Carbon::now()->toDateTimeString(),
        ]);
        /*if($add){
            session()->flash('message.level', 'success');
        }else{
            session()->flash('message.level', 'error');
        }*/
        return redirect()->route('home');
    }

    public function get_edit($id){
        
        $admin = Admin::findOrFail($id);

        return view('admin.editAdmin', compact('admin'));
    }

    public function post_edit(Request $request){
        
        $admin = Admin::findOrFail($request->id);
        $rules = [
            'email' => 'required|email|unique:admin,email,' . $request->id,
        ];
        if ($request->has('password') && !empty($request->password)) {
            $rules['password']        = 'required|min:6:max:32';
            $rules['password_confirm'] = 'required|same:password';
        }
        $validator = Validator::make($request->all(), $rules);
        if ($validator->fails()) {
            return redirect()->route('EditAdmin', $request->id)->withErrors($validator)->withInput();
        }
        $admin->email = $request->email;
        if ($request->has('password') && !empty($request->password)) {
            $admin->password = bcrypt($request->password);
        }

        $admin->save();
        session()->flash('message.level', 'success');

        return redirect()->route('ListAdmin');
    }

    public function delete($id){

        if (Auth::guard('admin')->user()->id == $id) {
            session()->flash('message.level', 'info');
            session()->flash('message.content', 'Ops, It is you!');
            return redirect()->back();
        }
        
        Admin::findOrFail($id)->delete();
        session()->flash('message.level', 'success');
        session()->flash('message.content', 'admin deleted!');
        return redirect()->back();

    }

}