<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
        //Index Page
        public function index() {
            $students = Student::orderBy('name','ASC')->get();
            return view('student.index' ,compact('students'));
        }

        //Add Student
	public function add() {
		return view('student.add');

	}

    //Store student
    public function store(Request $request){
		$data = $request->all();
		$rules = [
		 'name' => 'required|max:255',
		 'gender' => 'required|max:255',
		 'email' => 'required',
		 'phone'=>'numeric', 
		 'dob'=>'required',
		 'address'=>'required',
		 'nationality'=>'required',
		 'education_background'=>'required',	 
	 ];
	$customMessages = [
		'name.required' => ' Name is required',
		'name.unique' => ' Name already exist',
		'gender.required'=>'Gender is required',
		'email.required'=>'Email is required',
		'phone.required'=>'Phone number is required',
		'phone.unique'=>'phone shound be integer',
		'dob.required'=>'Date of Birth is required',
		'address.required'=>'Address is required',
		'nationality.required'=>'nationality is required',
		'education_background.required'=>' Education is required'
	];
	$this->validate($request, $rules, $customMessages);
	
	 $student = new  Student();
	 $student->name = $data['name'];
	 $student->gender = $data['gender'];
	 $student->email = $data['email'];
	 $student->phone = $data['phone'];
	 $student->address = $data['address'];
	$student->dob = $data['dob'];
	$student->nationality  = $data['nationality'];
	$student->education_background = $data['education_background'];
		 $student->save();
		 $notification = array(
		   'alert-type' => 'success',
		   'message' => 'student has been Added Successfully'
		 );
		 return redirect()->route('student.index');
 
 
	 }

     
	 public function dataTable(){
        $model = Student::orderBy('priority', 'ASC')->get();
        return DataTables::of($model)
        ->addColumn('action', function($model){
            return view('admin.student._actions',[
               'model' => $model,
               'url_show' => route('student.show', $model->id),
               'url_edit' => route('student.edit', $model->id),
               'url_delete' => route('student.delete', $model->id)



            ]);
        })
        ->addIndexColumn()
        ->rawColumns(['action'])
        ->make(true);
        

            }

	 public function show($id){
		$model= Student::findOrfail($id);
		return view('student.show', compact('model'));
	    }


}
