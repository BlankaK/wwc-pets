<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Seed users
        $this->call(UsersTableSeeder::class);

        // Seed owners
        App\Owner::create([
            'name' => 'Charlie',
            'living_structure' => 'house',
            'lives_with_kids' => true,
        ]);
        App\Owner::create([
            'name' => 'Amy',
            'living_structure' => 'house',
        ]);
        App\Owner::create([
            'name' => 'Joe',
            'living_structure' => 'apartment',
        ]);
        App\Owner::create([
            'name' => 'Melissa',
            'living_structure' => 'house',
            'lives_with_kids' => true,
        ]);
        App\Owner::create([
            'name' => 'Tim',
            'living_structure' => 'apartment',
        ]);
        App\Owner::create([
            'name' => 'Holly',
            'living_structure' => 'apartment',
            'lives_with_kids' => true,
        ]);
        App\Owner::create([
            'name' => 'Richard',
            'living_structure' => 'house',
            'lives_with_kids' => false,
        ]);

        // Seed vets
        App\Vet::create([
            'name' => 'Dr Peggy',
            'years_practice' => 15,
        ]);
        App\Vet::create([
            'name' => 'Dr Marcus',
            'years_practice' => 5,
        ]);
        App\Vet::create([
            'name' => 'Dr William',
            'years_practice' => 25,
        ]);
        App\Vet::create([
            'name' => 'Dr Jane',
            'years_practice' => 18,
        ]);

        // Seed pets
        App\Pet::create([
            'name' => 'Max',
            'kind' => 'dog',
            'age' => 2,
            'gender' => 'male',
            'is_vaccinated' => true,
            'owner_id' => 4,
            'vet_id' => 3,
        ]);
        App\Pet::create([
            'name' => 'Luna',
            'kind' => 'dog',
            'age' => 6,
            'gender' => 'female',
            'is_vaccinated' => true,
            'vet_id' => 3,
        ]);
        App\Pet::create([
            'name' => 'Jack',
            'kind' => 'parrot',
            'age' => 1,
            'gender' => 'male',
            'owner_id' => 5,
            'vet_id' => 4,
        ]);
        App\Pet::create([
            'name' => 'Rocky',
            'kind' => 'dog',
            'gender' => 'male',
            'is_vaccinated' => true,
            'owner_id' => 3,
            'vet_id' => 3,
        ]);
        App\Pet::create([
            'name' => 'Daisy',
            'kind' => 'cat',
            'age' => 8,
            'gender' => 'female',
            'vet_id' => 2,
        ]);
        App\Pet::create([
            'name' => 'Molly',
            'kind' => 'fish',
            'gender' => 'female',
            'owner_id' => 6,
            'vet_id' => 2,
        ]);
        App\Pet::create([
            'name' => 'Bella',
            'kind' => 'turtle',
            'age' => 3,
            'gender' => 'female',
            'owner_id' => 1,
        ]);
        App\Pet::create([
            'name' => 'Buddy',
            'kind' => 'dog',
            'age' => 4,
            'gender' => 'male',
            'is_vaccinated' => true,
            'owner_id' => 7,
            'vet_id' => 1,
        ]);
        App\Pet::create([
            'name' => 'Tucker',
            'kind' => 'snake',
            'age' => null,
            'gender' => 'male',
            'is_vaccinated' => false,
            'owner_id' => 1,
            'vet_id' => null,
        ]);
        App\Pet::create([
            'name' => 'Lucy',
            'kind' => 'cat',
            'age' => 7,
            'gender' => 'female',
            'is_vaccinated' => true,
            'owner_id' => 2,
            'vet_id' => 3,
        ]);
        App\Pet::create([
            'name' => 'Toby',
            'kind' => 'cat',
            'gender' => 'male',
            'is_vaccinated' => true,
            'owner_id' => 2,
            'vet_id' => 3,
        ]);
    }
}
