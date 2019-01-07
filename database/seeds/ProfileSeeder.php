<?php

use Illuminate\Database\Seeder;
use App\Models\Profile;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profiles')->insert([
            'name' => 'Admin'
        ]);

        DB::table('profiles')->insert([
            'name' => 'Diretor'
        ]);

        DB::table('profiles')->insert([
            'name' => 'Secretário'
        ]);

        DB::table('profiles')->insert([
            'name' => 'Professor'
        ]);
    }
}
