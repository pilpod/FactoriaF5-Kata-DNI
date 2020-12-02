<?php 

namespace App;

class DniValidation {

    private Object $dni;

    public function __construct(Object $dni)
    {
        $this->dni = $dni;
    }

    public function getDni()
    {
        return $this->dni->getDni();
    }

    public function isValid()
    {
        $firstStep = $this->dni->firstEightAreNumb();
        $secondStep = $this->dni->lastCharIsString();
        $thirdStep = $this->dni->compareChar();
        $fourthStep = $this->dni->retrieveChar();
        $fifthStep = $this->dni->isNie();
        $sixthStep = $this->dni->changeCharByNumber();

        if($firstStep) {
            return;
        }

        if($secondStep) {
            return;
        }

        if($thirdStep) {
            return;
        }

        

    }

}

?>