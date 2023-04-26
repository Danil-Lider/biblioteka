<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'items';

    // protected $fillable = [
    //     'name',
    //     'genre',
    //     'author',
    //     'publisher',
    //     'status',
    //     // 'genre',
    //     // 'genre',
    // ];

}
