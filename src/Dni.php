<?php 

namespace App;

class Dni {
    
    private string $dniNumb;

    public function __construct(string $dniNumb)
    {
        $this->dniNumb = $dniNumb;
    }

    public function getDni()
    {
        return $this->dniNumb;
    }

    public function firstEightAreNumb(): bool
    {
        $charDni = str_split($this->dniNumb);
        $newArr = [];

        foreach ($charDni as $char) {
            if(ctype_digit($char)) {
                array_push($newArr, $char);
            }
        }

        if(count($newArr) == 8) {
            return true;
        }

        return false;
    }

    public function lastCharIsString(): bool
    {
        $lastChar = $this->getLastChar();

        if(ctype_upper($lastChar)) {
            return true;
        }

        return false;
    }

    public function getLastChar()
    {
        $lastChar = substr($this->dniNumb, -1);
        return $lastChar;
    }

    public function compareChar(): bool
    {
        $prohibitedChar = ['U', 'I', 'O', 'Ñ', 'u', 'i', 'o', 'ñ'];
        $lastChar =  $this->getLastChar();

        foreach ($prohibitedChar as $char) {
            if($lastChar === $char) {
                return false;
            }
        }

        return true;
    }

}

?>