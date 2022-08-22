<?php

namespace Staff;

use Common\Employee;

class Programmer extends Employee
{
    const PROGRAMMER_SALARY = 100498;
    const PROGRAMMER_POSITION = 'programmer';

    function __construct(string $name, string $surname, bool $positiveness)
    {
        parent::__construct($name, $surname, $positiveness);
        $this->position = self::PROGRAMMER_POSITION;
        $this->salary = self::PROGRAMMER_SALARY;
    }
}