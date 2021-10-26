<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    // protected $fillable = [
    //     'firstname',
    //     'lastname',
    //     'gender',
    //     'dob',
    //     'pob',
    //     'marital_status',
        
    // ];
    //Laravel table relationship
    public function subunit()
    {
        return $this->belongsTo(Subunit::class);
    }

    
}
