<?php

use Illuminate\Database\Seeder;
use App\Cart;
use App\User;
use Illuminate\Support\Str;

class CartSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $time = 100;
        // =))
        for($i=0; $i < $time; $i++){
            $product_id = $i + 1;
            $product_qty = rand(1,20);
            $product_price = rand(100,9999999);
            $user_id = User::first()->id;
            $create_fake_data = new Cart;
            $create_fake_data->product_id = $product_id;
            $create_fake_data->product_qty = $product_qty;
            $create_fake_data->product_price = $product_price;
            $create_fake_data->user_id = $user_id;
            $create_fake_data->save();
        }
    }
}
