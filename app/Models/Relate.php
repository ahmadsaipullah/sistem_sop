<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relate extends Model
{
    use HasFactory;

    protected $lable = 'relates';
    protected $fillable = ['job_id'];

    public function Jobs()
    {
        return $this->belongsTo(Job::class, 'job_id', 'id');
    }
}
