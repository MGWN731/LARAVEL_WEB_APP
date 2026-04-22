<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'department',
        'job_title',
        'salary',
        'hire_date',
        'notes',
        'photo_path',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'salary' => 'decimal:2',
        'hire_date' => 'date',
    ];

    /**
     * @var list<string>
     */
    protected $appends = [
        'full_name',
    ];

    public function getFullNameAttribute(): string
    {
        return trim(($this->first_name ?? '').' '.($this->last_name ?? ''));
    }
}
