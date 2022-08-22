<?php

namespace Staff;

use Common\Employee;

class Manager extends Employee {

    const MANAGER_SALARY = 100499;
    const MANAGER_POSITION = 'manager';

    public function __construct(string $name, string $surname, bool $positiveness)
    {
        parent::__construct($name, $surname, $positiveness);
        $this->position = self::MANAGER_POSITION;
        $this->salary = self::MANAGER_SALARY;
    }
}
