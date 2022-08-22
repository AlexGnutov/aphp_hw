<?php

namespace Common;

abstract class Employee
{
    const EMPLOYEE_SALARY = 0;
    const EMPLOYEE_POSITION = 'unknown';

    protected string $name;
    protected string $surname;
    public string $fullName;
    public string $position;
    protected int $salary;
    protected bool $positiveness;

    function __construct(string $name, string $surname, bool $positiveness)
    {
        $this->name = ucfirst($name);
        $this->surname = ucfirst($surname);
        $this->fullName = "$surname $name";
        $this->positiveness = $positiveness;
        $this->position = self::EMPLOYEE_POSITION;
        $this->salary = self::EMPLOYEE_SALARY;
    }

    function printEmployeeData():void
    {
        echo "Full name: $this->fullName" . PHP_EOL;
        echo "Position: $this->position" . PHP_EOL;
        echo "Salary: $this->salary" . PHP_EOL;
        echo "Positiveness: " . ($this->positiveness ? "high" : "low") . PHP_EOL;
    }
}