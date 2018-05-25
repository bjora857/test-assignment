<?php
namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return Company::all()->pluck('name', 'id');
    }

    public function store(Request $request)
    {
        try {
            $company = Company::create([
                'name' => $request->get('name')
            ]);

            return $company;
        } catch (\Exception $e) {
            return new JsonResponse(['message' => 'Non unique Company Name'], 400);
        }
    }
}
