<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class Academic extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_category_id',
        'instructor_id',
        'title',
        'slug',
        'description',
        'price',
        'level',
        'method',
        'duration',
        'certificate_type',
        'image',
        'tags'
    ];

    public function academicCategory() {
        return $this->belongsTo(AcademicCategory::class);
    }

    public function instructor() {
        return $this->belongsTo(Instructor::class);
    }
}
