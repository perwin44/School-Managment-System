<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
class Grade extends Model
{
    use HasFactory;
    use HasTranslations;

 
    protected $table = 'Grades';
    public $translatable = ['Name'];
    protected $fillable = ['Name','Notes'];
    public $timestamps = true;

   
    public function sections()
    {
        return $this->hasMany('App\Models\Section', 'Grade_id');
    }
}
