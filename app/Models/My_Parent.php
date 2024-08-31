<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Foundation\Auth\User as Authenticatable;

class My_Parent extends Authenticatable
{
    use HasFactory, HasTranslations;

    protected $table = 'my__parents';

    protected $fillable = [
        'email',
        'email_verified_at',
        'password',
        'Name_Father',
        'Name_Father_en',
        'Job_Father',
        'Job_Father_en',
        'National_ID_Father',
        'Passport_ID_Father',
        'Phone_Father',
        'Nationality_Father_id',
        'Blood_Type_Father_id',
        'Religion_Father_id',
        'Address_Father', 'Name_Mother',
        'Name_Mother_en',
        'Job_Mother',
        'Job_Mother_en',
        'National_ID_Mother',
        'Passport_ID_Mother',
        'Phone_Mother',
        'Nationality_Mother_id',
        'Blood_Type_Mother_id',
        'Religion_Mother_id',
        'Address_Mother',
    ];


    /*
     * SPATIE TRANSLATABLE
     */
    public $translatable = [
        'Name_Father',
        'Job_Father',
        'Name_Mother',
        'Job_Mother',
    ];
}
