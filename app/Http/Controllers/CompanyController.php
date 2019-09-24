<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Traits\UploadTrait;
use App\Company;

class CompanyController extends Controller
{
    public function index()
    {
        $datas = Company::all();

        return view('company.index', compact('datas'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('company.create', compact('companies'));
    }

    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|Regex:/^[\D]+$/i|min:2|unique:companies',
            'address' => 'required|Regex:/^[\D]+$/i|min:15',
            'company_email' => 'required|email|between:6,60|unique:companies',
            'image_logo' => 'required|image|dimensions:min_width=100,min_height=200|max:2048',
            'website' => 'required|url|min:9|unique:companies',
        ]);

        $image_logo = '';
        
        Company::create([
            'name' => $request->name,
            'address' => $request->address,
            'company_email' => $request->company_email,
            'image_logo' => $image_logo,
            'website' => $request->website,
        ]);

        return redirect()->back()->with('status', 'Company successfully created.');
    }

    public function edit($name)
    {
        Company:
        $data = Company::all();
        $data = $data->where("name", "==", $name)->first();
        return view('company.edit', compact('data'));
    }

    public function update(Request $request, $name)
    {
        $this->validate($request, [
            'name' => 'required|Regex:/^[\D]+$/i|min:2',
            'address' => 'required|Regex:/^[\D]+$/i|min:15',
            'company_email' => 'required|email|between:6,60',
            'image_logo' => 'required|image|dimensions:min_width=100,min_height=200|max:2048',
            'website' => 'required|url|min:9',
        ]);

        Company:
        $data = Company::all();
        $data = $data->where("name", "==", $name)->first();

        $data->update($request->all());

        return redirect()->back()->with('success', 'Company is successfully updated.');
    }

    // public function detail($name)
    // {
    //     return view('company.detail');
    // }

    public function delete($name)
    {
        Company:
        $data = Company::all();
        $data = $data->where("name", "==", $name)->first();

        return redirect()->back()->with('status', 'You just deleted a company detail.');
    }
}
