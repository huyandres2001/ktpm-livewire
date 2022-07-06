<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EduLevel extends Model
{
    use HasFactory;
    protected $table = 'edu_levels';
    protected $fillable = [
        'name',
        'major',
        'certificate',
    ];
    public function employees()
    {
        return $this->hasMany(User::class, 'edu_level_id', 'id');
    }
}
