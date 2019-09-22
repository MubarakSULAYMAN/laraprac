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
    //         'logo_image'     =>  'required|image|mimes:jpeg,png,jpg,gif|max:2048'
    //     ]);

    //     // // Get current user
    //     // $user = User::findOrFail(auth()->user()->id);
    //     // // Set user name
    //     // $user->name = $request->input('name');

    //     // // Check if a profile image has been uploaded
    //     // if ($request->has('logo_image')) {
    //     //     // Get image file
    //     //     $image = $request->file('logo_image');
    //     //     // Make a image name based on user name and current timestamp
    //     //     $name = str_slug($request->input('name')).'_'.time();
    //     //     // Define folder path
    //     //     $folder = '/uploads/images/';
    //     //     // Make a file path where image will be stored [ folder path + file name + file extension]
    //     //     $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
    //     //     // Upload image
    //     //     $this->uploadOne($image, $folder, 'public', $name);
    //     //     // Set user profile image path in database to filePath
    //     //     $user->logo_image = $filePath;
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
            'name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'logo_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'website' => 'required',
        ]);

        $logo_image = '';
        
        Company::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email,
            'logo_image' => $logo_image,
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
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'email' => 'required|max:255',
            'logo_image' => 'required|mime',
            'website' => 'required|url|max:255',
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

        return redirect()->back()->with('status', 'You just deleted a company.');
    }
}
