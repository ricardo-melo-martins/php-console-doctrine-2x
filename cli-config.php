<?php
/**
 * cli-config.php 
 * Arquivo de configuração e apoio do terminal Doctrine 'vendor/bin/doctrine'
 * 
 * @link          https://github.com/ricardo-melo-martins
 * @author        Ricardo Melo Martins
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

require __DIR__ . DIRECTORY_SEPARATOR . 'kernel' . DIRECTORY_SEPARATOR . 'bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);