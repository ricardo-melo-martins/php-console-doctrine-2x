<?php
/**
 * paths.php 
 * Arquivo de definições 
 * 
 * @link          https://github.com/ricardo-melo-martins
 * @author        Ricardo Melo Martins
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

// defines comuns para diretórios
if (!defined('DS'))          { define('DS', DIRECTORY_SEPARATOR); }
if (!defined('PATH_ROOT'))   { define('PATH_ROOT', dirname(__DIR__)); }
if (!defined('PATH_APP'))    { define('PATH_APP', 'src'); }
if (!defined('PATH_CONFIG')) { define('PATH_CONFIG', PATH_ROOT . DS . 'config' . DS); }
if (!defined('PATH_TESTS'))  { define('PATH_TESTS', PATH_ROOT . DS . 'tests' . DS); }
if (!defined('PATH_TMP'))    { define('PATH_TMP', PATH_ROOT . DS . 'tmp' . DS); }
if (!defined('PATH_LOGS'))   { define('PATH_LOGS', PATH_TMP . 'logs' . DS);  }
if (!defined('PATH_CACHE'))  { define('PATH_CACHE', PATH_TMP . 'cache' . DS); }
if (!defined('PATH_RESOURCES')) { define('PATH_RESOURCES', PATH_ROOT . DS . 'resources' . DS); }
if (!defined('PATH_DATABASES')) { define('PATH_DATABASES', PATH_RESOURCES . 'databases' . DS); }