<?php

require 'config.php';

// Use an autoloader!
require 'libs/MVCmanage.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';

// Library
require 'libs/Database.php';
require 'libs/Session.php';


$bootstrap = new MVCmanage();
$bootstrap->init();
