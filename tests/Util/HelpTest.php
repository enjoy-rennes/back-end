<?

namespace App\tests\Util;

use App\Controller\HelpController;
use App\Entity\Help;
use PHPUnit\Framework\TestCase;

class HelpTest extends TestCase
{
    public function testAdd()
    {
        $help = new Help();
        $result = $help->add(30, 12);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
}