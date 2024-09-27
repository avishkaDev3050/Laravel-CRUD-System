<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ManageEmployee extends Controller
{
    public function register() {
        return view('register');
    }

    public function store(Request $req) {

        $rules = [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|string',
        ];

        $validator = Validator::make($req->all(), $rules, $massege = [
            'fname.required' => 'Please enter your first name.',
            'lname.required' => 'Please enter your last name.',
            'age.required' => 'Please enter your age name.',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employee = new Employee();
        $employee->fname = $req->fname;
        $employee->lname = $req->lname;
        $employee->age   = $req->age;

        $employee->save();
        $employees = Employee::all();
        return view('home', compact('employees'));
    }

    public function edit($emp_id) {
        $employee = Employee::where('id', $emp_id)->first();
        return view('update', compact('employee'));
    }

    public function update(Request $req, $emp_id) {

        $rules = [
            'fname' => 'required|string',
            'lname' => 'required|string',
            'age' => 'required|string',
        ];

        $validator = Validator::make($req->all(), $rules, $massege = [
            'fname.required' => 'Please enter your first name.',
            'lname.required' => 'Please enter your last name.',
            'age.required' => 'Please enter your age name.',
        ]);

        if($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $employee = Employee::where('id', $emp_id)->first();
        $employee->fname = $req->fname;
        $employee->lname = $req->lname;
        $employee->age = $req->age;

        $employee->save();
        $employees = Employee::all();
        return view('home', compact('employees'));

    }

    public function delete($emp_id) {
        $employee = Employee::where('id', $emp_id)->first();
        $employee->delete();
        $employees = Employee::all();
        return view('home', compact('employees'));
    }
}
