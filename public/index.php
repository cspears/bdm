<?php
defined('APPLICATION_PATH') || define('APPLICATION_PATH', realpath(dirname(_FILE_) . '/../application/'));
defined('VENDOR_PATH') || define('VENDOR_PATH', realpath(dirname(_FILE_) . '/../vendor/'));
set_include_path(implode(PATH_SEPARATOR, array(
  APPLICATION_PATH, VENDOR_PATH, get_include_path()
)));
require_once 'autoload.php';
require_once 'src/Bootstrap.php';
$application = Bootstrap::bootstrapApp(true);
$application->run();
