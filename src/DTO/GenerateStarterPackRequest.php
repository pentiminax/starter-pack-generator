<?php

namespace App\DTO;

class GenerateStarterPackRequest
{
    public function __construct(
        public readonly string $name,
        public readonly string $gender,
        public readonly string $job,
        public readonly string $hobbies,
        public readonly string $objects,
        public readonly string $style
    ) {
    }

    public function getPrompt(): string
    {
        return <<<PROMPT
Peux-tu me faire mon starter pack sous la forme d’une figurine, présentée sous blister, à la manière d’un jouet de collection. illustrée avec ces informations : 
Je m’appelle $this->name, mon sexe est le suivant : $this->gender, 
mon métier est $this->job, 
mes passions sont les suivantes : $this->hobbies, 
et les objets qui me caractérisent sont $this->objects.
Style artistique : $this->style.
PROMPT;
    }
}