<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model ;

class Student extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'country',
        'city',
        'address',
        'phone',
        'email',
        'status',
        'index_no',
    ];

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }
}