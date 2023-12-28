<?php

use Olooeez\DoctrineOrm\Entity\Student;
use Olooeez\DoctrineOrm\Helper\EntityManagerCreator;

require_once(__DIR__ . "/../vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

$student = $entityManager->find(Student::class, $argv[1]);
$entityManager->remove($student);

$entityManager->flush();
