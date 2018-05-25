<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return Employee::with('company')->get();
    }
    public function store(Request $request)
    {
        $data = ['name' => $request->get('name')];

        $company = Company::where('name', '=', $request->get('company'))->first();

        if ($company) {
            $data['company_id'] = $company->id;
        }

        return Employee::create($data);
    }
}
