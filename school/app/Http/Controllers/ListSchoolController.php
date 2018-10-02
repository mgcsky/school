<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\schools;

class ListSchoolController extends Controller
{
	public function __construct()
    {
    	$this->middleware('auth');
    }

	public function get_list(){
		$schools = schools::paginate(10);
        return view('school.listSchool', compact('schools'));
	}
}
?>