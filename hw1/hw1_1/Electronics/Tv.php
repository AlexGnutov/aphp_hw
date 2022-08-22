<?php

namespace Electronics;

class Tv
{
  public string $manufacturer;
  public int $diagonal;
  public string $class;
  public string $type;
  public int $price;

  public const CLASS_LOW_LIMIT = 14;
  public const CLASS_MID_LIMIT = 24;
  public const CLASS_BIG_LIMIT = 32;
  public static array $allowedTypes = [
    'black-and-white',
    'colour',
  ];

  public static function printCurrentLimits():void {
    echo "***" . PHP_EOL;
    echo "Diagonal breakpoints: " . self::CLASS_LOW_LIMIT . " / " . self::CLASS_MID_LIMIT . " / " . self::CLASS_BIG_LIMIT . PHP_EOL;
    echo "Allowed types: " . implode(', ', self::$allowedTypes) . PHP_EOL;
    echo "***" . PHP_EOL;

  }

  public function __construct(string $manufacturer, int $diagonal, string $type, int $price) {
    $this->manufacturer = $manufacturer;
    $this->diagonal = $diagonal;
    $this->setClass($diagonal);
    try {
      $this->setType($type);
    } catch (Exception $e) {
      echo $e->getMessage() . PHP_EOL;
    }
    $this->price = $price;
  }

  private function setType($type): void {
    if (!in_array($type, self::$allowedTypes, true)) {
      throw new Exception('Type must be black-and-white or colour.');
    }
    $this->type = $type;
  }

  private function setClass($diagonal): void {
    $this->class = match (true) {
      $diagonal <= self::CLASS_LOW_LIMIT => 'small',
      $diagonal <= self::CLASS_MID_LIMIT => 'medium',
      $diagonal <= self::CLASS_BIG_LIMIT => 'big',
      default => 'huge',
    };
  }

  public function printSpecification(): void
  {
    foreach ($this as $key => $value)
    {
      echo "$key : $value" . PHP_EOL;
    }
  }
}

$newTV = new Tv('Panasonic', 25, 'colour', 300);
$newTV->printSpecification();

$newTV2 = new Tv('Rubin', 72, 'colour', 2790);
$newTV2->printSpecification();

$newTV3 = new Tv('Sony', 14, 'black-and-white', 120);
$newTV3->printSpecification();

Tv::printCurrentLimits();
