<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type_Blood;
use Illuminate\Support\Facades\DB;

class BloodSeederTable extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('type__bloods')->delete();

        $bgs =['O-','O+','A-','A+','AB+','AB-','B-','B+',];

        foreach($bgs as $bg){
            Type_Blood::create(['Name' =>$bg]);
        }
    }
}
