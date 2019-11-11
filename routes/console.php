<?php

use Illuminate\Foundation\Inspiring;

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

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');

Artisan::command('quarktasche', function () {
    $this->comment('Deine Quarktasche wurde soeben in den Backofen geschoben und ist in 15 Minuten bei dir!');
})->describe('Zeige den Bestellstatus der Quaarktasche an!');
