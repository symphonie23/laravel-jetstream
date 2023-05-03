<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/**
 * Define Closure based console commands for the application.
 */
Artisan::command('inspire', function () {
    // Display an inspiring quote
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');
