<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model ;

class Book extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function borrows()
    {
        return $this->hasMany(Borrow::class);
    }

}