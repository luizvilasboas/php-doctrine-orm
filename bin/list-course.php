<?php

use Olooeez\DoctrineOrm\Entity\Course;
use Olooeez\DoctrineOrm\Helper\EntityManagerCreator;

require_once(__DIR__ . "/../vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();
$coursesRepository = $entityManager->getRepository(Course::class);

$courses = $coursesRepository->findAll();

foreach ($courses as $course) {
  echo "{$course->id}\t{$course->getName()}" . PHP_EOL;
}
