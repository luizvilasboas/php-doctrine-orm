<?php

use Olooeez\DoctrineOrm\Entity\Phone;
use Olooeez\DoctrineOrm\Entity\Student;
use Olooeez\DoctrineOrm\Helper\EntityManagerCreator;

require_once(__DIR__ . "/../vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

$phones = [];
for ($i = 2, $j = 0; $i < $argc; $i++, $j++) {
  $phones[] = new Phone($argv[$i]);
  $entityManager->persist($phones[$j]);
}

$student = new Student($argv[1]);

foreach ($phones as $phone) {
  $student->addPhone($phone);
}

$entityManager->persist($student);
$entityManager->flush();
