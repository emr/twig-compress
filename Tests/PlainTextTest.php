<?php

namespace Func\Tests;

class PlainTextTest extends TestCase
{
    public function testSecureCompress()
    {
        $this->assertEquals(
            $this->twig->render('plain_secure.txt.twig'),
            'compress test default: plain text'
        );
    }

    public function testNotSecureCompress()
    {
        $this->assertEquals(
            $this->twig->render('plain.txt.twig'),
            <<<TEST_STR
compress
    test
    not secure:

plain text
TEST_STR
        );
    }
}