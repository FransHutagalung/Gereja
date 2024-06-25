<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);
dd($db);
