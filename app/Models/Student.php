<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'classroom_id',
        'npm',
        'name',
        'password',
        'gender'
    ];  

    /**
     * classroom
     *
     * @return void
     */
    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}