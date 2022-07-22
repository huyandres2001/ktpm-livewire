<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EduLevel extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_id',
        'major',
        'certificate',
        'description',
    ];
    public function employee(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'employee_id');
    }
}
