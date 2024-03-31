<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    use HasFactory;

    protected $lable = 'jobs';
    protected $fillable = ['tugas','detail_tugas','type','jabatan_id','relate_id','file_laporan','cabang_id'];

    public function Jabatan()
    {
        return $this->belongsTo(Level::class, 'jabatan_id', 'id');

    }
    public function Relate()
    {
        return $this->belongsTo(Level::class, 'relate_id', 'id');
    }

    public function Cabang()
    {
        return $this->belongsTo(Cabang::class, 'cabang_id', 'id');
    }

    public function RelateJobs()
    {
        return $this->hasMany(Relate::class, 'job_id', 'id');
    }


}
