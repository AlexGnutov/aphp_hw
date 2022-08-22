<?php

namespace People;

class Student
{
  public string $name;
  public string $surname;
  public string $groupName;
  public int $birthYear;
  public int $status;

  public const STUDENT_STATUS_ACTIVE = 1;
  public const STUDENT_STATUS_EXPELLED = 0;
  public static array $studentStatuses = [
    'expelled',
    'active',
    'unknown'
    ];

  public static function printClassInfo(): void {
    var_dump(get_class_vars(get_called_class()));
  }

  public function __construct(string $name, string $surname, int $birthYear) {
    $this->name = $name;
    $this->surname = $surname;
    $this->birthYear = $birthYear;
  }

  public function setGroupName(string $groupName): void {
    $this->groupName = $groupName;
  }

  public function getGroupName(): string {
    return $this->groupName;
  }

  public function setStatus(int $status): void {
    $this->status = $status;
  }

  /**
   * @return int
   */
  public function getStatus(): string {
    if ($this->status === self::STUDENT_STATUS_ACTIVE) {
      return self::$studentStatuses[self::STUDENT_STATUS_ACTIVE];
    }
    if ($this->status === self::STUDENT_STATUS_EXPELLED) {
      return self::$studentStatuses[self::STUDENT_STATUS_EXPELLED];
    }
    return 'unknown';
  }
}


