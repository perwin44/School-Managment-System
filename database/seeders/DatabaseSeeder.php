<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;


use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(ClassroomTableSeeder::class);
        $this->call(SectionsTableSeeder::class);
        $this->call(BloodSeederTable::class);
        $this->call(NationalitieSeederTable::class);
        $this->call(ReligionSeederTable::class);
        $this->call(SpecializationTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(ParentsTableSeeder::class);
        $this->call(StudentsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
    }
}
