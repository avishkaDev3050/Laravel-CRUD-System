<?php

namespace App\Http\Controllers;

use App\Models\Employee;

class AdminLogin extends Controller
{
    function GoToHome() {
        $employees = Employee::all();
        return view('Home', compact('employees'));
    }

}
