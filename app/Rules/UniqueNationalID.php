<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\DB;

class UniqueNationalID implements Rule
{
    public function passes($attribute, $value)
    {
        $existsInFather = DB::table('my__parents')->where('National_ID_Father', $value)->exists();
        $existsInMother = DB::table('my__parents')->where('National_ID_Mother', $value)->exists();

        return !$existsInFather && !$existsInMother;
    }

    public function message()
    {
        return 'The :attribute has already been taken.';
    }
}