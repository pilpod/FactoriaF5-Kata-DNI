<?php 

namespace Tests;
use App\Dni;

use PHPUnit\Framework\TestCase;

class DniTest extends TestCase {
    
    public function test_is_a_string_with_9_charac()
    {
        $stringChar = '123456789';
        $dni = new Dni($stringChar);

        $dniNumb = $dni->getDni();
        $result = strlen($dniNumb);

        $this->assertEquals(9, $result);
    }

    public function test_first_8_char_are_numbers()
    {
        $stringChar = '00000000T';
        $dni = new Dni($stringChar);

        //Los 8 primeros son números
        $result = $dni->firstEightAreNumb();

        $this->assertEquals(true, $result);
    }

    public function test_last_char_is_char()
    {
        $stringChar = '00000000P';
        $dni = new Dni($stringChar);

        //Los 8 primeros son números
        $result = $dni->lastCharIsString();

        $this->assertEquals(true, $result);
    }

    public function test_char_cannot_U_I_O_Ñ()
    {
        $stringChar = '00000000P';
        $dni = new Dni($stringChar);

        //Comparar la letra con las prohibidas
        $result = $dni->compareChar();

        $this->assertEquals(true, $result);

    }

    public function test_retrieve_last_char()
    {
        //dado un número
        $numb = '00000000';
        $char = 'T';
        $dni = new Dni($numb);
        //obtener la letra del DNI
        $result = $dni->retrieveChar();

        //comprobar que la letra sea la correct
        $this->assertEquals($char, $result);
    }

    public function test_last_char_is_valide()
    {
        $dni = new Dni('00000000T');

        $response = $dni->validateLastChar();

        $this->assertEquals(true, $response);

    }

    public function test_is_a_NIE()
    {
        $numb = 'Y0000000T';
        $dni = new Dni($numb);

        $result = $dni->isNie();

        $this->assertEquals(true, $result);
    }

    public function test_replace_XYZ_by_number()
    {
        $dniNumb = 'X0000000T';
        $dni = new Dni($dniNumb);

        $result = $dni->changeCharByNumber();

        $this->assertEquals('00000000T', $result);
    }

}

?>