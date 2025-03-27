<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder {
    /** @var string[] $names */
    protected array $names = ['admin', 'selia', 'amina'];
    /**
     * Run the database seeds.
     */
    public function run(): void {
        collect($this->names)->each(function (string $name) {
            User::factory()->create([
                'name' => $name,
                'email' => "{$name}@gmail.com",
            ]);
        });
    }
}
