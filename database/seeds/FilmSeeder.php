<?php

use Illuminate\Database\Seeder;
use App\Film;
use App\Comment;
use App\User;

class FilmSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $user = new User();
        $user->id = 1;
        $user->name = $faker->firstName . ' ' . $faker->lastName;
        $user->email = $faker->unique()->email;
        $user->password = bcrypt('123456');
        $user->api_token = str_random(60);
        $user->created_at = date('Y-m-d H:i:s');
        $user->updated_at = date('Y-m-d H:i:s');
        $user->save();

        $film1 = new Film();
        $film1->id = 1;
        $film1->guid = \Ramsey\Uuid\Uuid::uuid4();
        $film1->name = 'First Film';
        $film1->url_slug = str_slug('First Film', '-');
        $film1->description = $faker->realText();
        $film1->release_date = $faker->date();
        $film1->rating = $faker->numberBetween(1, 5);
        $film1->ticket_price = $faker->randomFloat(2);
        $film1->country = $faker->country;
        $film1->genre = json_encode([0 => 'Drama', 2 => 'Comedy']);
        $film1->photo = null;
        $film1->created_at = date('Y-m-d H:i:s');
        $film1->updated_at = date('Y-m-d H:i:s');
        $film1->save();

        $film2 = new Film();
        $film2->id = 2;
        $film2->guid = \Ramsey\Uuid\Uuid::uuid4();
        $film2->name = 'First Second';
        $film2->url_slug = str_slug('First Second', '-');
        $film2->description = $faker->realText();
        $film2->release_date = $faker->date();
        $film2->rating = $faker->numberBetween(1, 5);
        $film2->ticket_price = $faker->randomFloat(2);
        $film2->country = $faker->country;
        $film2->genre = json_encode([0 => 'Drama', 2 => 'Comedy']);
        $film2->photo = null;
        $film2->created_at = date('Y-m-d H:i:s');
        $film2->updated_at = date('Y-m-d H:i:s');
        $film2->save();

        $film3 = new Film();
        $film3->id = 3;
        $film3->guid = \Ramsey\Uuid\Uuid::uuid4();
        $film3->name = 'First Third';
        $film3->url_slug = str_slug('First Third', '-');
        $film3->description = $faker->realText();
        $film3->release_date = $faker->date();
        $film3->rating = $faker->numberBetween(1, 5);
        $film3->ticket_price = $faker->randomFloat(2);
        $film3->country = $faker->country;
        $film3->genre = json_encode([0 => 'Drama', 2 => 'Comedy']);
        $film3->photo = null;
        $film3->created_at = date('Y-m-d H:i:s');
        $film3->updated_at = date('Y-m-d H:i:s');
        $film3->save();

        $comment1 = new Comment();
        $comment1->id = 1;
        $comment1->guid = \Ramsey\Uuid\Uuid::uuid4();
        $comment1->film_id = 1;
        $comment1->user_id = 1;
        $comment1->name = $faker->firstName . ' ' . $faker->lastName;
        $comment1->description = $faker->realText();
        $comment1->created_at = date('Y-m-d H:i:s');
        $comment1->updated_at = date('Y-m-d H:i:s');
        $comment1->save();

        $comment2 = new Comment();
        $comment2->id = 2;
        $comment2->guid = \Ramsey\Uuid\Uuid::uuid4();
        $comment2->film_id = 2;
        $comment2->user_id = 1;
        $comment2->name = $faker->firstName . ' ' . $faker->lastName;
        $comment2->description = $faker->realText();
        $comment2->created_at = date('Y-m-d H:i:s');
        $comment2->updated_at = date('Y-m-d H:i:s');
        $comment2->save();

        $comment3 = new Comment();
        $comment3->id = 3;
        $comment3->guid = \Ramsey\Uuid\Uuid::uuid4();
        $comment3->film_id = 3;
        $comment3->user_id = 1;
        $comment3->name = $faker->firstName . ' ' . $faker->lastName;
        $comment3->description = $faker->realText();
        $comment3->created_at = date('Y-m-d H:i:s');
        $comment3->updated_at = date('Y-m-d H:i:s');
        $comment3->save();
    }

}
