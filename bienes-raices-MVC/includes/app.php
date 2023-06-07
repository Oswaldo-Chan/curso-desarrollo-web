<?php 

require 'functions.php';
require 'config/database.php';
require __DIR__.'/../vendor/autoload.php';

$db = connectDB();

use Model\ActiveRecord;

ActiveRecord::setDB($db);

