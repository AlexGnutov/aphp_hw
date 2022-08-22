<?php

namespace Staff;

use Common\Employee;

class Tester extends Employee
{
    const TESTER_SALARY = 100497;
    const TESTER_POSITION = 'tester';

    public function __construct(string $name, string $surname, bool $positiveness)
    {
        parent::__construct($name, $surname, $positiveness);
        $this->position = self::TESTER_POSITION;
        $this->salary = self::TESTER_SALARY;
    }
}