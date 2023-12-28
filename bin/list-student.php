<?php

use Olooeez\DoctrineOrm\Entity\Course;
use Olooeez\DoctrineOrm\Entity\Student;
use Olooeez\DoctrineOrm\Helper\EntityManagerCreator;
use Olooeez\DoctrineOrm\Entity\Phone;

require_once(__DIR__ . "/../vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
  echo "$student->id\t$student->name\t[";

  echo implode(", ", $student->getPhones()
    ->map(fn (Phone $phone) => $phone->number)
    ->toArray());
  
  echo "]\t[";

  echo implode(", ", $student->getCourses()
    ->map(fn (Course $course) => $course->name)
    ->toArray());
  
  echo "]". PHP_EOL;
}
