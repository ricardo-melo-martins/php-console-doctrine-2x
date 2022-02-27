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
$isDevMode = true;
$proxyDir = null;
$cache = null;
$useSimpleAnnotationReader = false;
$paths = [dirname(__DIR__) . DS .'src'. DS .'Entity'];

$config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);

//Parâmetros de conexão com banco de dados
$params = array(
    'dbname' => 'sakila',
    'user' => 'sakila',
    'password' => 'sakila',
    'host' => 'localhost',
    'driver' => 'pdo_mysql',
);

// Obter a instância da classe Entity Manager
$entityManager = EntityManager::create($params, $config);

// Definições de tipagem e mapeamento dos campos
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('set', 'string');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('enum', 'string');
$entityManager->getConnection()->getDatabasePlatform()->registerDoctrineTypeMapping('geometry', 'string');
