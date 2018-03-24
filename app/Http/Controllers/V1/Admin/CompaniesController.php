<?php

namespace App\Http\Controllers\V1\Admin;

use App\Http\Requests\Companies;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CompaniesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $companies = Company::all();

        if($request->ajax())
        {
            return response()->json($companies);
        }
        return view('/Admin/Companies/index',['companies'=>$companies]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->view('/Admin/Companies/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Companies $request)
    {
        Company::create($request->all());
        $companies = Company::all();
        if($request->ajax())
        {
            return response()->json($companies);
        }
        return redirect()->action('CompaniesController@index',['companies'=>$companies]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $company = Company::find($id);
        return response()->json($company);
        //return response()->view('/Admin/Companies/update');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return response()->json($company);
        //return response()->view('/Admin/Companies/edit',['company'=>$company]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Companies $request, $id)
    {
        $company = Company::find($id);
        $company->update($request->all());
        $companies = Company::all();
        if($request->ajax())
        {
            return response()->json($companies);
        }
        return redirect()->action('CompaniesController@index',['companies'=>$companies]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $company = Company::find($id);
        $company->delete();
        $companies = Company::all();
        if($request->ajax())
        {
            return response()->json($companies);
        }
        return redirect()->action('CompaniesController@index',['companies'=>$companies]);
    }
}
