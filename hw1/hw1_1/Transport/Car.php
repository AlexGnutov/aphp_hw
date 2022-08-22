<?php

namespace Transport;

class Car
{
  public string $manufacturer;
  public string $model;
  public string $class;
  public string $color;
  public int $yearOfManufacture;

  public function __construct(string $manufacturer, string $model, string $class, string $color)
  {
    $this->manufacturer = $manufacturer;
    $this->model = $model;
    $this->class = $class;
    $this->color = $color;
  }

  public function printSpecification(): void
  {
    foreach ($this as $key => $value)
    {
      echo "$key : $value" . PHP_EOL;
    }
  }

  /**
   * @param int $yearOfManufacture
   */
  public function setYearOfManufacture(int $yearOfManufacture): void
  {
    $this->yearOfManufacture = $yearOfManufacture;
  }
}


