<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user_id = User::select('id')->get();
        $user_id =fake()->randomElement($user_id);

        return [
            'title' =>fake()->title(),
            'body'  => fake()->text(),
            'check' => fake()->randomElement([0 ,1]),
            'user_id' =>$user_id,
            //ran(1,10)
            
          
        ];
    }
}
