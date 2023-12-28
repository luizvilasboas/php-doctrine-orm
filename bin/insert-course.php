<?php

use Olooeez\DoctrineOrm\Entity\Course;
use Olooeez\DoctrineOrm\Helper\EntityManagerCreator;

require_once(__DIR__ . "/../vendor/autoload.php");

$entityManager = EntityManagerCreator::createEntityManager();

$course = new Course($argv[1]);

$entityManager->persist($course);
$entityManager->flush();
