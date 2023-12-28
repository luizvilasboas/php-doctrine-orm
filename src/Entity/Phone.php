<?php

namespace Olooeez\DoctrineOrm\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToOne;

#[Entity]
class Phone
{
  #[Id, Column, GeneratedValue]
  public int $id;

  #[Column]
  public readonly string $number;

  #[ManyToOne(targetEntity: Student::class, inversedBy: "phones")]
  public readonly Student $student;

  public function __construct(string $number)
  {
    $this->number = $number;
  }

  public function setStudent(Student $student): void
  {
    $this->student = $student;
  }
}
