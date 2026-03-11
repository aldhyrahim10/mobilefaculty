<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AcademicCategory extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'academic_category_name'
    ];

    public function academic() {
        return $this->hasMany(Academic::class);
    }
}
