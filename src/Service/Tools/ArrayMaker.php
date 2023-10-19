<?php

namespace App\Service\Tools;

use App\Entity\Spell;

class ArrayMaker
{
    public function __construct(

    ) {
    }

    /**
     * @param array<int, Spell> $spells
     * @return array<string, array<int<0, max>, array<string, int|string|null>>>
     */
    public function spellArrayMaker(array $spells): array {
        $return_list = [];
        $i = 0;

        /** @var Spell $spell */
        foreach ($spells as $spell) {
            $return_list[$i]['id'] = $spell->getId();
            $return_list[$i]['name'] = $spell->getName();
            $return_list[$i]['type'] = $spell->getType();
            $return_list[$i]['level'] = $spell->getLevel();
            $i++;
        }

        return ["data" => $return_list];
    }
}