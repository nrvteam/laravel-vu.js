<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    private CONST TITLES = [
        'Children Of Death',
        'Heroes And Pilots',
        'Intruders And Androids',
        'Friends And Intruders',
        'Guests And Veterans',
        'Destruction Of Sunshine',
        'Demise Of Stardust',
        'Creation Of Death',
        'Moon Of The Universe',
        'Caution Of',
        'Experience In The Aliens',
        'Inspired By A Rise Of Machines',
        'Mother Of First Contact',
        'Father Of My Space Journey',
        'Dependent On The Galaxy',
        'Married To The Fog',
        'Life In Robotic Control'
    ];

    private const GENRES = [
        'Action',
        'Comedy',
        'Drama',
        'Fantasy',
        'Horror',
        'Mystery',
        'Romance',
        'Thriller'
    ];
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->randomElement(self::TITLES),
            'genre' => $this->faker->randomElement(self::GENRES),
            'detail' => $this->faker->realText,
            'url_image' => basename($this->faker->image(storage_path('app/public'),640, 840,))
        ];
    }
}
