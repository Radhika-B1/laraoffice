<?php

$factory->define(Modules\Orders\Entities\Order::class, function (Faker\Generator $faker) {
    return [
        "customer_id" => factory('App\Models\Contact')->create(),
        "status" => collect(["Pending","Active",])->random(),
        "price" => $faker->randomNumber(2),
        "billing_cycle_id" => factory('App\Models\RecurringPeriod')->create(),
    ];
});
