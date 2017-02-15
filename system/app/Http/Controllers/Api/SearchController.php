<?php
namespace App\Http\Controllers\Api;

class SearchController extends Controller {

	public function index($query = null) {

		# FORMAT
		/*
		$result = [
			'name' => 'Name'
			'image' => 'url image'
			'type' => 0 -> profile, 1 -> tags, 2 -> product
			'total_posts' => 0
		];
		*/

		$faker = \Faker\Factory::create();

		$results = [];
		for ($i=0; $i < 20; $i++) { 

			$results[] = [
				'name' => $faker->name,
				'image' => $faker->imageUrl(100, 100),
				'type' => $faker->numberBetween(0, 2),
				'total_posts' => $faker->numberBetween(1, 200)
			];

		}

		return response()->json(['result' => $results]);

	}

}