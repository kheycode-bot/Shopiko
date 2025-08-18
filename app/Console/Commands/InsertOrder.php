<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InsertOrder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:insert-order';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
{
    $order = new Order();
    $order->product_id = 1;
    $order->user_id = 1;
    $order->total_price = 100.00;
    $order->payment_status = 'paid';
    $order->product_title = 'Product Name';
    $order->name = 'John Doe';
    $order->email = 'john.doe@example.com';
    $order->created_at = now();
    $order->updated_at = now();
    $order->save();

    $this->info('Order Inserted!');
}
}
