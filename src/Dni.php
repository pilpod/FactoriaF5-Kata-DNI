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
        $myDni = $this->dniNumb;
        $lastChar = substr($myDni, -1);

        if(ctype_upper($lastChar)) {
            return true;
        }

        return false;
    }

}

?>