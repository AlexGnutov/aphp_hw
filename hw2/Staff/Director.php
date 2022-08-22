<?php

namespace Staff;

use Common\Employee;

class Director extends Employee
{
  const DIRECTOR_SALARY = 100500;
  const DIRECTOR_POSITION = 'director';

  function __construct(string $name, string $surname, bool $positiveness)
  {
      parent::__construct($name, $surname, $positiveness);
      $this->position = self::DIRECTOR_POSITION;
      $this->salary = self::DIRECTOR_SALARY;
  }
}