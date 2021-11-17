<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use App\Entity\Log;
use App\Entity\Box;
use App\Repository\BoxRepository;
use Doctrine\ORM\EntityManagerInterface;

class BarcodeCommand extends Command
{
    protected static $defaultName = 'barcode';
    protected static $defaultDescription = 'Add a short description for your command';

    private $boxRepo;

    private $em;

    public function __construct(BoxRepository $boxRepo, EntityManagerInterface $em)
    {
        $this->boxRepo = $boxRepo;
        $this->em = $em;
        parent::__construct();
    }

    protected function configure()
    {
        $this
            ->setDescription(self::$defaultDescription)
            ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $arg1 = $input->getArgument('arg1');

        if ($arg1) {
            $box = $this->boxRepo->findOneBy(['barcode' => $arg1]);
            $box->setStatus(1 - $box->getStatus());

            $log = new Log();
            $log->setBox($box);
            $log->setDirection($box->getStatus());

            $this->em->persist($log);
            $this->em->flush();

            $io->note($box);
            // $io->note(sprintf('You passed an argument: %s', $arg1));
        }

        if ($input->getOption('option1')) {
            // ...
        }

        $io->success('You have a new command! Now make it your own! Pass --help to see your options.');

        return Command::SUCCESS;
    }
}
