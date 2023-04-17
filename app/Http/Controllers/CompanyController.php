<?php

namespace App\Http\Controllers;

use App\Models\Companies;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Yajra\DataTables\DataTables;
use DataTables;


class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Companies::all();
        return view('companies.index', compact('companies'));
    }

    public function data()
	{
	    $companies = Companies::select(['id', 'name', 'email', 'website_link', 'logo'])->get();
return DataTables::of($companies)
        ->addColumn('logo', function ($companies) {
            return '<img src="' . asset('/storage/'.$companies->logo) . '" height="100" width="100">';
        })
        ->addColumn('action', function ($companies) {
            return  '<a href="' . route('company.show', $companies->id) . '" class="btn  btn-success">View</a>' .
            		'<a href="' . route('company.edit', $companies->id) . '" class="btn  btn-primary">Edit</a>' .
                '<form action="' . route('company.destroy', $companies->id) . '" method="POST" style="display: inline-block">
                    ' . method_field('DELETE') . csrf_field() . '
                    <button type="submit" class="btn  btn-danger" onclick="return confirm(\'Are you sure you want to delete this company?\')">Delete</button>
                </form>';
        })
        ->rawColumns(['logo', 'action'])
        ->toJson();

	}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_link' => 'nullable|string|max:255',
        ]);

        $company = new Companies;
        $company->name = $validatedData['name'];
        $company->email = $validatedData['email'];
        $company->website_link = $validatedData['website_link'];

       if ($request->hasFile('logo')) {
		    $image = $request->file('logo');
		    $fileName = $image->getClientOriginalName();
		    $path = $image->storeAs('public', $fileName);
		    $company->logo = $fileName;
		}

        
        $company->save();

        toastr()->success('Company has been created successfully!');
     	return redirect('/company');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {	
    	$Companies = Companies::find($id);
        return view('companies.show',compact('Companies'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {	
    	$Companies = Companies::find($id);
        return view('companies.edit', compact('Companies'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
       $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'nullable|string|email|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'website_link' => 'nullable|string|max:255',
        ]);

       	$company_id = $request->input('company_id');
      	$name = $request->input('name');
      	$email = $request->input('email');
      	$website_link = $request->input('website_link');
     
       Companies::where('id', $company_id)->update([
            'name' => $name,
            'email' => $email,
            'website_link' => $website_link,
            
       ]);

       if ($request->hasFile('logo')) {
           	$image = $request->file('logo');
            $fileName = $image->getClientOriginalName();
            $path = $image->storeAs('public', $fileName);
            Companies::where('id', $company_id)->update([
               'logo' => $logo,
             ]);
        }

    toastr()->success('Company has been updated successfully!');
     return redirect('/company');
}

/**
 * Remove the specified resource from storage.
 *
 * @param  \App\Company  $company
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    // Storage::delete('public/' . $company->logo);
     $Companies = Companies::find($id);
     $Companies->delete();

     toastr()->success('Company has been deleted successfully!');
     return redirect('/company');
}
}
