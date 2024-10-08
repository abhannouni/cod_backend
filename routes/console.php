<?php

use App\Console\Commands\DeleteProduct;
use Illuminate\Support\Facades\Artisan;

Artisan::command('product:delete {id}', function ($id) {
    $this->call(DeleteProduct::class, ['id' => $id]);
})->describe('Delete a product');

// Register the custom command
Artisan::command('custom:command {name} {--age=}', function () {
    $this->call(CustomCommand::class);
});