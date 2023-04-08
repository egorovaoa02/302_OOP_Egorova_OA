<?php

namespace Tests;

use App\Truncater;
use PHPUnit\Framework\TestCase;

class TruncaterTest extends TestCase
{
    public function testTruncate()
    {
        $defaultTruncater = new Truncater();
        $this->assertSame("Егорова Ольга Александровна", $defaultTruncater->truncate("Егорова Ольга Александровна"));
        $this->assertSame("Егорова Ол...", $defaultTruncater->truncate(
            "Егорова Ольга Александровна", 
            ['length' => 10]
        ));
        $this->assertSame("Егорова Ольга ...", $defaultTruncater->truncate(
            "Егорова Ольга Александровна",
            ['length' => -13]
        ));
        $this->assertSame("Егорова Ол*", $defaultTruncater->truncate(
            "Егорова Ольга Александровна",
            ['length' => 10, 'separator' => '*']
        ));
        $this->assertSame("Егорова Ольга Александровна", $defaultTruncater->truncate("Егорова Ольга Александровна"));

        $overriddenTruncater1 = new Truncater(['length' => 14]);
        $this->assertSame("Егорова Ольга ...", $overriddenTruncater1->truncate("Егорова Ольга Александровна"));
        $this->assertSame("Егорова Ольга \\", $overriddenTruncater1->truncate(
            "Егорова Ольга Александровна", 
        ['separator' => '\\']
    ));

        $overriddenTruncater2 = new Truncater(['length' => 14, 'separator' => '***']);
        $this->assertSame("Егорова Ольга ***", $overriddenTruncater2->truncate("Егорова Ольга Александровна"));
    }
}
