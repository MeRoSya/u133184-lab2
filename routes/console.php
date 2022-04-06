<?php

use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('addressCount {id}', function ($id) {
    $customer = \App\Models\Customer::where('id', $id)->with('address')->first();
    if ($customer != null) {
        $this->info("Customer with id {$id} has {$customer->address->count()} addresses");
    } else {
        $this->error("No such customer");
    }
})->purpose('Find out, how many addresses a customer has');
