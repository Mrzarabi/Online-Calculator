<?php

namespace Database\Seeders;

use App\Models\Article;
use App\Models\Calculator;
use App\Models\contactUs;
use App\Models\Element;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\Starter;
use App\Models\Ticket;
use App\Models\User;
use Database\Factories\OrderFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(LaratrustSeeder::class);

        $users =  \App\Models\User::factory(15)->create();
        $users->each(function($user) {
            $user->orders()->saveMany(Order::factory()->count(5))->create([
                'user_id' => $user->id
            ])->each(function($order) {
                $order->feedback()->saveMany(Feedback::factory())->create([
                    'order_id' => $order->id
                ]);
            });
        });
    

        $calculators = Calculator::factory(20)->create();
        $calculators->each(function($calculator) {
            $calculator->factory()->has(Element::factory()->count(23))->create();
        });
        
        $users->each(function($user) {
            $user->starters()->saveMany(Starter::factory(), 5)->create([
                'user_id' => $user->id
            ])->each(function($starter) use($user) {
                $starter->tickets()->saveMany(Ticket::factory(), 11)->create([
                    'starter_id' => $starter->id,
                    'user_id' => $user->id
                ]);
            });
        });

        $contactUses = contactUs::factory(27)->create();
    }
}
