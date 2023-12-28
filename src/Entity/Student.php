<?php

namespace Olooeez\DoctrineOrm\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

#[Entity]
class Student
{
  #[Id]
  #[Column]
  #[GeneratedValue]
  public int $id;

  #[Column]
  public string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }
}
