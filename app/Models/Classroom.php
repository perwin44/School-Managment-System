<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classroom extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $table = 'Classrooms';
    public $timestamps = true;
    public $translatable = ['Name'];
    protected $fillable = ['Name','Grade_id'];

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
    

}
