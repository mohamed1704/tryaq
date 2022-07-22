<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'name',
        'dob',
        'speciallization',
        'phone',
        'password',
        'gender',
        'email',
        'room_num',
        'type_of_contract',
        'status',
        'department_id',
        'image',
        'id',
    ];

    public function Department()
    {
        return $this->belongsTo(Department::class);
    }
}
