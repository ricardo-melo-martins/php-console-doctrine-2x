<?php
// cli-config.php

require __DIR__ . DIRECTORY_SEPARATOR . 'kernel' . DIRECTORY_SEPARATOR . 'bootstrap.php';

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);