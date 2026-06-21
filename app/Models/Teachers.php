<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Teachers extends Model
{
    use SoftDeletes;
    protected $primary_key = 'id';
    protected $fillable = [
        'designation','department'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
}
