<?php

namespace Olooeez\DoctrineOrm\Entity;

use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;

#[Entity]
class Course
{
  #[Id, Column, GeneratedValue]
  public int $id;

  #[ManyToMany(Student::class, mappedBy: "courses")]
  private Collection $students;

  #[Column]
  public readonly string $name;

  public function __construct(string $name)
  {
    $this->name = $name;
  }

  /** @return Collection<Student> */
  public function getStudents(): Collection
  {
    return $this->students;
  }

  public function setStudents(Student $student): void
  {
    if (!$this->students->contains($student)) {
      $this->students->add($student);
      $student->enrollInCourse($this);
    }
  }
}
