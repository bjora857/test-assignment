<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $table = 'employees';
    protected $guarded = [];

    protected $visible = ['id', 'name', 'company'];

    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }

}
