<?php

/**
 * Singleton pattern class.
 *
 *If we need it to several types of singleton in your app.
 */
abstract class SingletonPattern {

  /**
   * Store the instance of the singleton class;
   * @var array
   */
  private static array $instance = [];

  /**
   * Singleton's class constructor should be public,
   * as it will lead to direct object creation.
   * Only subclass can inherit the constructor.
   */
  protected function __construct() {}

  /**
   * Prevent the instance from being cloned
   * @return void
   */
  protected function __clone() : void{}

  /**
   * Prevent the instance from being unserialized.
   * @return void
   */
  // @codingStandardsIgnoreStart
  protected function __wakeup(): void {}

  /**
   * Creation a singleton instance.
   * @return object
   */
  public static function getInstance(): object {
    $class = static::class;
    // Why static?
    // Static keyboard will refer to the subclass that has extended this class.
    // As we want the stance if the subclass.
    // Subclass instance will be created.
    if (!isset(self::$instance[$class])) {
      self::$instance[$class] = new static();
    }
    return self::$instance[$class];
  }

  public static function getAllInstances(): array {
    return self::$instance;
  }
}