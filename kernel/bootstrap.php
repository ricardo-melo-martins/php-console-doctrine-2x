<?php
/**
 * bootstrap.php 
 * Arquivo inicializador
 * 
 * @link          https://github.com/ricardo-melo-martins
 * @author        Ricardo Melo Martins
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

declare(strict_types=1);

// composer autoloader
if (file_exists(PATH_ROOT.DS.'vendor'.DS.'autoload.php')) {
    require PATH_ROOT.DS.'vendor'.DS.'autoload.php';
} else {
    echo 'Ops, esqueceu do composer install';
    exit;
}


use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

// Configuração simples para iniciar Doctrine ORM
// config
if (file_exists(PATH_CONFIG . 'config.php')) {
    $cfg = \Laminas\Config\Factory::fromFile(PATH_CONFIG . 'config.php');
} else {
    echo 'Ops, esqueceu da configuração';
    exit;
}

//Parâmetros de conexão com banco de dados
$setupAnnotations = Setup::createAnnotationMetadataConfiguration($cfg['path_entity'], $cfg['dev_mode'], $cfg['proxy'], $cfg['cache'], $cfg['use_simple_annotation']);

// Obter a instância da classe Entity Manager
$entityManager = EntityManager::create($cfg['doctrine'], $setupAnnotations);

// Definições de tipagem e mapeamento dos campos
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('geometry', 'string');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('year', 'string');
