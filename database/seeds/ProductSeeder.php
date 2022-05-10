<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Product;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $time = 100;
        for($i =0; $i < $time; $i++){
            $product_name = md5(Carbon::now());
            $description = md5(Carbon::now()->subDay(999));
            $brand = Str::random(5);
            $quantity = rand(100,9999999);
            $alert_stock = 100;
            $price = rand(99999,9999999);


            $create_fake_data = new Product;
            $create_fake_data->product_name = $product_name;
            $create_fake_data->description = $description;
            $create_fake_data->brand = $brand;
            $create_fake_data->price = $price;
            $create_fake_data->quantity = $quantity;
            $create_fake_data->alert_stock = $alert_stock;
            $create_fake_data->save();
        }
    }
}
