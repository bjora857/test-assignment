<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected $guarded = [];

    protected $visible = ['id', 'name'];

    public function employees()
    {
        return $this->hasMany(Employee::class, 'company_id');
    }
}
