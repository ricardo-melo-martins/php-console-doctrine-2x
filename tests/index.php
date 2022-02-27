<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'kernel' . DIRECTORY_SEPARATOR . 'paths.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'kernel' . DIRECTORY_SEPARATOR . 'bootstrap.php';


$repository = $entityManager->getRepository('RMM\Entity\Actor');
$data = $repository->findAll();

dd($data);