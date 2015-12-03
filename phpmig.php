<?php

/**
 * Bootstrap PHP Mig
 */
$schema = app()->make('Sun\Database\Schema');

$schema->bootstrap();

return app();