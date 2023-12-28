<?php

namespace Olooeez\DoctrineOrm\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;
use Doctrine\ORM\Mapping\ManyToMany;
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

  #[ManyToMany(targetEntity: Course::class, inversedBy: "students")]
  private Collection $courses;

  public function __construct(string $name)
  {
    $this->name = $name;
    $this->phones = new ArrayCollection();
    $this->courses = new ArrayCollection();
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

  public function enrollInCourse(Course $course): void
  {
    if (!$this->courses->contains($course)) {
      $this->courses->add($course);
      $course->setStudents($this);
    }
  }

  /** @return Collection<Course> */
  public function getCourses(): Collection
  {
    return $this->courses;
  }
}
