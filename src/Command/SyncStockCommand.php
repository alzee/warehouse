<?php

namespace App\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Box;
use App\Entity\Entry;
use App\Entity\Item;

class SyncStockCommand extends Command
{
    protected static $defaultName = 'app:sync-stock';
    protected static $defaultDescription = 'Sync entries to item stock';

    private $em;

    public function __construct(EntityManagerInterface $em)
    {
        $this->em = $em;
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->setDescription(self::$defaultDescription)
            // ->addArgument('arg1', InputArgument::OPTIONAL, 'Argument description')
            // ->addOption('option1', null, InputOption::VALUE_NONE, 'Option description')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        // $arg1 = $input->getArgument('arg1');

        $entries = $this->em->getRepository(Entry::class)->findAll();

        foreach($entries as $entry){
            if($entry->getBox()->getStatus()){
                $item = $entry->getItem();
                $item->setStock($item->getStock() + $entry->getQuantity());
            }
        }
        
        $em->flush();

        $io->success('Done.');

        return Command::SUCCESS;
    }
}
