<?php

require_once "SingletonPattern.php";

/**
 * Logger class to handle the system logs
 * Class Logger
 */
class Logger extends SingletonPattern {

  /**
   * File pointer
   * @var
   */
  private $fileHandle;

  protected function __construct() {
    parent::__construct();
    $this->fileHandle = fopen('php://stdout', 'w');
  }

  protected function __destruct() {
    fclose($this->fileHandle);
  }
  /**
   * Write log.
   * @param string $message
   *
   * @return void
   */
  public function writelog(string $message): void {
    $date = date('Y-m-d H:i:s');
    fwrite($this->fileHandle,  "$date; $message\n");
  }

  /**
   * Log message.
   * @param string $message
   *
   * @return
   */
  public static function log(string $message): void {
    $logger = self::getInstance();
    $logger->writelog($message);
  }
}