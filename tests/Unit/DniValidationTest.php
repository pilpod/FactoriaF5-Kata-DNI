<?php 

namespace Tests;

use App\DniValidation;
use App\Dni;
use PHPUnit\Framework\TestCase;

class DniValidationTest extends TestCase {

    public function test_get_dni_number()
    {
        $dni = new Dni('X0000000T');
        $validation = new DniValidation($dni);

        $reponse = $validation->getDni();

        $this->assertEquals('00000000T', $reponse);
    }

    public function test_validate_dni()
    {
        $dni = new Dni('00000000T');
        $validation = new DniValidation($dni);

        $response = $validation->isValid();

        $this->assertEquals('DNI valided', $response);
    }

}

?>