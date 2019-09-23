<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRoleRequest;
use App\User;
use Illuminate\Http\Request;
// use App\Traits\UploadTrait;
use App\Company;

class CompanyController extends Controller
{
    // use UploadTrait;

    public function index()
    {
        $datas = Company::all();

        return view('company.index', compact('datas'));
    }

    public function create()
    {
        $companies = Company::all();

        return view('company.create', compact('datas'));
    }

    // public function create(Request $request)
    // {
    //     // return view('company.create');

    //     // Form validation
    //     $request->validate([
    //         'name'              =>  'required',
    //         'image_logo'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     // // Get current user
    //     // $user = User::findOrFail(auth()->user()->id);
    //     // // Set user name
    //     // $user->name = $request->input('name');

    //     // // Check if a profile image has been uploaded
    //     // if ($request->has('image_logo')) {
    //     //     // Get image file
    //     //     $image = $request->file('image_logo');
    //     //     // Make a image name based on user name and current timestamp
    //     //     $name = str_slug($request->input('name')).'_'.time();
    //     //     // Define folder path
    //     //     $folder = '/uploads/images/';
    //     //     // Make a file path where image will be stored [ folder path + file name + file extension]
    //     //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
    //     //     // Upload image
    //     //     $this->uploadOne($image, $folder, 'public', $name);
    //     //     // Set user profile image path in database to filePath
    //     //     $user->image_logo = $filePath;
    //     // }
    //     // // Persist user record to database
    //     // $user->save();

    //     // Return user back and show a flash message
    //     return redirect()->back()->with(['status' => 'Profile updated successfully.']);
    // }

    // public function save(CreateRoleRequest $request)
    public function save(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|Regex:/^[\D]+$/i|min:2',
            'address' => 'required|Regex:/^[\D]+$/i|min:15',
            'company_email' => 'sometimes|required|email|between:7,60',
            'image_logo' => 'required|image|dimensions:min_width=100,min_height=200|max:2048',
            'website' => 'required|url|min:9',
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
        $data = Company::findOrFail($name);

        return view('company.edit', compact('company'));
    }

    public function update(Request $request, $name)
    {
        $this->validate($request, [
            'name' => 'required|Regex:/^[\D]+$/i|min:2',
            'address' => 'required|Regex:/^[\D]+$/i|min:15',
            'company_email' => 'sometimes|required|email|between:7,60',
            'image_logo' => 'required|image|dimensions:min_width=100,min_height=200|max:2048',
            'website' => 'required|url|min:9',
        ]);

        $data = Company::findOrFail($name);

        $data->update($request->all());

        return redirect()->back()->with('success', 'Company is successfully updated.');
    }

    public function detail($name)
    {
        return view('company.detail');
    }

    public function delete($name)
    {
        $data = Company::findOrFail($name);
        $data->delete();

        return redirect()->back()->with('status', 'You just deleted a company detail.');
    }
}
