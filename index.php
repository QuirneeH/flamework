<?php
session_start();
date_default_timezone_set("America/Bahia");

require("vendor/autoload.php");
registerUri();

execute();
