<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GetFreeTimeForOrder extends Model
{
    use HasFactory;
    protected $table = 'free_time_by_date';
}
