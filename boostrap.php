<?php

// Application set up

require './database/Connection.php';
require './database/QueryBuilder.php';
$config = require './config/config.php';


$database = new QueryBuilder(
    // DB Connection
    Connetion::make($config['database'])
);
