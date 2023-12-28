<?php

namespace Olooeez\DoctrineOrm\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\OneToMany;

#[Entity]
class Student
{
  #[Id, Column, GeneratedValue]
  public int $id;

  #[Column]
  public string $name;

  #[OneToMany(targetEntity: Phone::class, mappedBy: "student", cascade: ["remove"])]
  private Collection $phones;

  public function __construct(string $name)
  {
    $this->name = $name;
    $this->phones = new ArrayCollection();
  }

  public function addPhone(Phone $phone): void
  {
    $this->phones->add($phone);
    $phone->setStudent($this);
  }

  /** @return Collection<Phone> */
  public function getPhones(): Collection
  {
    return $this->phones;
  }
}
