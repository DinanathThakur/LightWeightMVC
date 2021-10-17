<?php
//testing
//Start the Session
session_start();

include_once 'define.php';

include_once CORE_DIR . 'bootstrap.php';

(new App())->start();
