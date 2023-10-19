<?php


namespace App\Command\OneShot\DatabaseInitial;

use App\Entity\Spell;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(
    name: 'database:initial:spells',
    description: 'Lors de la création de la base de données, cette commande créée la table static spell'
)]
class SpellCommand extends Command
{
    public function __construct(
        private readonly EntityManagerInterface $em
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln('Start Command');
        /** @var string $spellJson */
        $spellJson = file_get_contents('staticJson/spell.json');
        /** @var  array $data */
        $data = json_decode( $spellJson, true );

        $output->writeln(count($data) . ' spells found');

        foreach ($data as $k => $v) {
            
            $newSpell = New Spell;
            $newSpell->setName($v['name']);
            $newSpell->setLevel($v['level']);
            $newSpell->setDescription($v['description']);
            $newSpell->setVocal($v['components']['v']);
            $newSpell->setSomatic($v['components']['s']);
            $newSpell->setMaterial($v['components']['m']);
            $newSpell->setPrepareTime($v['cast']);
            $newSpell->setActiveTime($v['duration']);
            $newSpell->setDistance($v['range']);
            $newSpell->setType($v['school']);
            if ($v['components']['others'] != "") {
                $newSpell->setExtra(["material" => $v['components']['others']]);
            }
            
            $this->em->persist($newSpell);
            $this->em->flush();

            $output->writeln($k . '/' . count($data) . ' spells added');
        }

        $output->writeln('End Command');
        
        return Command::SUCCESS;
    }
}