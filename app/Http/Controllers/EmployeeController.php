<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    public function index()
    {
        $details = Employee::all();
        $datas = Company::all();

        return view('employee.index', compact('details', 'datas'));
    }

    public function create()
    {
        $employees = Employee::all();
        $companies = Company::all();

        return view('employee.create', compact('employees', 'companies'));
    }

    public function save(Request $detail)
    {
        $this->validate($detail, [
            'first_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'last_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'company' => 'required',
            'employee_email' => 'email|between:6,60|unique:employees',
            'phone_number' => 'required|regex:/\+/|unique:employees',
        ]);
        
        Employee::create([
            'first_name' => $detail->first_name,
            'last_name' => $detail->last_name,
            'company' => $detail->company,
            'employee_email' => $detail->employee_email,
            'phone_number' => $detail->phone_number,
        ]);

        return redirect()->back()->with('status', 'Employee successfully created.');
    }

    public function edit($id)
    {
        $detail = Employee::find($id);
        // $detail = Employee::all();
        $companies = Company::all();

        // dd($detail, $companies);

        return view('employee.edit', compact('detail', 'companies'));
    }

    public function update(Request $detail, $id)
    {
        $this->validate($detail, [
            'first_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'last_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'company' => 'required',
            'employee_email' => 'required|email|between:6,60',
            'phone_number' => 'required|regex:/^\+[0-9]{14}/',
        ]);

        $detail = Employee::find($id);
        $data = Company::all();

        $detail->$data->update($detail->all());

        return redirect()->back()->with('status', 'Employee is successfully updated.');
    }

    public function delete($id)
    {
        $detail = Employee::find($id);
        $detail->delete();

        return redirect()->back()->with('status', 'You just deleted an employee detail.');
    }
}
