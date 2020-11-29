<?php 

namespace Tests;
use App\Dni;

use PHPUnit\Framework\TestCase;

class DniTest extends TestCase
{
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

}

?>