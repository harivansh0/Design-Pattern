<?php

/**
 * Client code.
 */
require_once 'Database.php';
require_once 'Logger.php';

Logger::log('Started');
$dbConnection1 = Database::getConnection();
Logger::log('Created db connection 1');
$dbConnection2 = Database::getConnection();
Logger::log('Created db connection 2');
print_r(SingletonPattern::getAllInstances());
if ($dbConnection2 == $dbConnection1) {
  print_r('Same instance.');
}
else {
  print_r('Different instance');
}