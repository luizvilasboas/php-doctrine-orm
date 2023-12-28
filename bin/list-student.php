<?php

use Olooeez\DoctrineOrm\Entity\Student;
use Olooeez\DoctrineOrm\Helper\EntityManagerCreator;

require_once(__DIR__ . "/../vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();
$studentRepository = $entityManager->getRepository(Student::class);

/** @var Student[] $studentList */
$studentList = $studentRepository->findAll();

foreach ($studentList as $student) {
  echo "$student->id - $student->name" . PHP_EOL; 
}
