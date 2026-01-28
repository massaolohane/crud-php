<?php
spl_autoload_register(function ($classe) {
    if (file_exists("models/$classe.php")) {
        require "models/$classe.php";
    }
});
