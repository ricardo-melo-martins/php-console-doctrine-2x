#!/usr/bin/env php
<?php

require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'kernel' . DIRECTORY_SEPARATOR . 'paths.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'kernel' . DIRECTORY_SEPARATOR . 'bootstrap.php';

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;

use Symfony\Component\Console\Application;

class UnknownException extends \Exception {

}

class ActorCommand extends Command
{
    protected static $defaultName = 'actor';

    protected $entityManager;

    public function __construct($entityManager)
    {
        $this->entityManager = $entityManager;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Encontra um ator por id');
        $this->addArgument('id', InputArgument::REQUIRED, 'Identificação do ator.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {

        $io = new SymfonyStyle($input, $output);

        try {
            $repository = $this->entityManager->getRepository('RMM\Entity\Actor');
            $data = $repository->find($input->getArgument('id'));

            if(!$data){
                throw new UnknownException("Ator não encontrado", 1);
            }

            $dataArray = $data->toArray();

            $table = new Table($output);
            $table
                ->setHeaders(['id', 'nome'])
                ->setRows([[$dataArray['id'], $dataArray['nome']]])
            ;
            $table->render();

            $io->success("Registro encontrado");

            return Command::SUCCESS;
        }
        catch (UnknownException $e) {
            $io->error($e->getMessage());
    
            return Command::INVALID;
        }

    }
}



$application = new Application();

$application->add(new ActorCommand($entityManager));

$application->run();