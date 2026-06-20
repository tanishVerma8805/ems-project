<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Students extends Model
{
    use SoftDeletes;
    protected $primary_key = 'id';
    protected $fillable = [
       'user_id','roll_no','course','department'
    ];
}
