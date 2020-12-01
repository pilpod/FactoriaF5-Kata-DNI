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

    public function retrieveChar()
    {
        $table = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];

        $char = '';

        //modulus = resto
        $modulus = $this->dniNumb % 23;

        for ($i=0; $i <= count($table) ; $i++) { 
            if($i == $modulus) {
                $char = $table[$i];
                break;
            }
        }

        return $char;

    }

    public function isNie()
    {
        $charDni = str_split($this->dniNumb);

        if($charDni[0] == 'X' || $charDni[0] == 'Y' || $charDni[0] == 'Z') {
            return true;
        }

        return false;
    }

    public function changeCharByNumber()
    {
        $dniNumb = $this->dniNumb;
        $firstNumb = 0;

        $arrayChar = str_split($dniNumb);

        switch ($arrayChar[0]) {
            case 'X':
                $firstNumb = 0;
                break;

            case 'Y':
                $firstNumb = 1;
                break;

            case 'Z':
                $firstNumb = 2;
                break;
            
            default:
                # code...
                break;
        }

        return $firstNumb;
    }

}

?>