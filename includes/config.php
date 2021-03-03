<?php

declare (strict_types = 1);

// Importera klassen datasource.
spl_autoload_register(function ($class) {
    include 'classes/' . $class . '.class.php';
});
