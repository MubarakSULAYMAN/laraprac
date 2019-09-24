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
            'employee_email' => 'required|email|between:6,60|unique:companies',
            'phone_number' => 'required|regex:/^\+[0-9]{14}/',
        ]);
        
        Employee::create([
            'first_name' => $detail->first_name,
            'last_name' => $detail->last_name,
            'company' => $detail->company,
            'employee_email' => $detail->employee_email ,
            'phone_number' => $detail->phone_number,
        ]);

        return redirect()->back()->with('status', 'Employee successfully created.');
    }

    public function edit($first_name, $last_name, $id)
    {
        $detail = Employee::find($first_name.$last_name.$id);
        $companies = Company::all();

        return view('employee.edit', compact('detail', 'companies'));
    }

    public function update(Request $detail, $first_name, $last_name, $id)
    {
        $this->validate($detail, [
            'first_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'last_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'company' => 'required',
            'employee_email' => 'required|email|between:6,60',
            'phone_number' => 'required|regex:/^\+[0-9]{14}/',
        ]);

        $detail = Employee::find($first_name.$last_name.$id);
        $data = Company::all();

        $detail->$data->update($detail->all());

        return redirect()->back()->with('success', 'Employee is successfully updated.');
    }

    public function delete($first_name, $last_name, $id)
    {
        $detail = Employee::find($first_name.$last_name.$id);
        $detail->delete();

        return redirect()->back()->with('status', 'You just deleted an employee detail.');
    }
}
