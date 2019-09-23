<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\User;
use Illuminate\Http\Request;
use App\Employee;
use App\Company;

class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $details = Employee::all();
        $datas = Company::all();

        return view('employee.index', compact('datas', 'details' ,'companies'));
    }

    public function create()
    {
        $employees = Employee::all();
        $companies = Company::all();

        return view('employee.create', compact('datas', 'details', 'companies'));
    }

    public function save(Request $detail)
    {
        $this->validate($detail, [
            'first_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'last_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'company' => 'required|Regex:/^[\D]+$/i|between:19,70',
            'employee_email' => 'sometimes|required|email|between:7,60',
            'phone_number' => 'required|regex:/(+)[0-9]{14}/',
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
        $detail = Employee::findOrFail($first_name .'_' .$last_name .'_' .$id);
        $companies = Company::all();

        return view('employee.edit', compact('employee', 'companies'));
    }

    public function update(Request $detail, $first_name, $last_name, $id)
    {
        $this->validate($detail, [
            'first_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'last_name' => 'required|Regex:/^[\D]+$/i|min:2',
            'company' => 'required|Regex:/^[\D]+$/i|between:19,70',
            'employee_email' => 'sometimes|required|email|between:7,60',
            'phone_number' => 'required|regex:/(+)[0-9]{14}/',
        ]);

        $detail = Employee::findOrFail($first_name .'_' .$last_name .'_' .$id);
        $data = Company::all();

        $detail->$data->update($detail->all());

        return redirect()->back()->with('success', 'Employee is successfully updated.');
    }

    public function delete($first_name, $last_name, $id)
    {
        $detail = Employee::findOrFail($first_name .'_' .$last_name .'_' .$id);
        $detail->delete();

        return redirect()->back()->with('status', 'You just deleted an employee detail.');
    }
}
