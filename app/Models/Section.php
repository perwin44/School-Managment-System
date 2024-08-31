<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Section extends Model
{
    use HasTranslations;
    use HasFactory;

    protected $table = 'Sections';
    public $timestamps = true;
    public $translatable = ['Name'];
    protected $fillable = ['Name','Grade_id','Class_id','Status'];

    public function Grades()
    {
        return $this->belongsTo('App\Models\Grade', 'Grade_id');
    }
    public function Classes()
    {
        return $this->belongsTo('App\Models\Classroom', 'Class_id');
    }

      // علاقة الاقسام مع المعلمين
      public function teachers()
      {
          return $this->belongsToMany('App\Models\Teacher','teacher_section');
      }
}
