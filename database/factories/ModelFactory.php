<?php

use Faker\Generator as Faker;

use App\Models\Project;


$seeker_ids = DB::table('role_user')->where('role_id', '4')->pluck('user_id');
// dd($seeker_ids);

$factory->define(App\Models\Project::class, function (Faker $faker) use ($seeker_ids) {
    return [
        'name' => $faker->sentence,
        'short_description' => $faker->paragraph(20),
        'detail_description' => $faker->paragraph(200),
        'budget' => rand(100, 999),
        'bid_start' => strtotime("+".mt_rand(1, 3)." day"),
        'bid_end' => strtotime("+".mt_rand(4, 20)." day"),
        'deadline' => $faker->time,
        '_status' => App\Models\ProjectStatus::all()->random()->id,
        '_employer' => $faker->randomElement($seeker_ids),
    ];
});

$factory->define(App\Models\ProjectCategory::class, function (Faker $faker) {
    return [
        '_project' => App\Models\Project::all()->random()->id,
        '_category' => App\Models\Category::all()->random()->id,
    ];
});

$factory->define(App\Models\Category::class, function (Faker $faker) {
    return [
        'name' => ucfirst($faker->word(3)).$faker->word(3).' '.$faker->word(3).$faker->word(3),
        // '_parent' => App\Models\Category::all()->random()->id,
    ];
});
