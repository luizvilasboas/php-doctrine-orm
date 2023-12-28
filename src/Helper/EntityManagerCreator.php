<?php

namespace Olooeez\DoctrineOrm\Helper;

use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

class EntityManagerCreator
{
  public static function createEntityManager(): EntityManager
  {
    $config = ORMSetup::createAttributeMetadataConfiguration(
      paths: array(__DIR__ . "/.."),
      isDevMode: true,
    );

    $connectionParams = [
      "driver" => "pdo_sqlite",
      "path" => __DIR__ . "/../../db.sqlite"
    ];

    $connection = DriverManager::getConnection($connectionParams, $config);

    return new EntityManager($connection, $config);
  }
}
