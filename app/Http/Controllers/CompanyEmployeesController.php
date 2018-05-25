<?php
namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Illuminate\Http\Request;

class CompanyEmployeesController
{
    public function show($company)
    {
        $company = Company::with('employees')
                          ->where('name', '=', $company)
                          ->first();
        
        return $company->employees;
    }

    public function store(Request $request)
    {
        $employeeId = $request->get('employee');
        $companyName = $request->get('company');

        $employee = Employee::find($employeeId);
        $company = Company::where('name', '=', $companyName)->first();
        $employee->company_id = $company->id;

        return ['success' => $employee->save()];
    }

    public function destroy($id)
    {
        $employee             = Employee::find($id);
        $employee->company_id = null;

        return ['success' => $employee->save()];
    }
}
