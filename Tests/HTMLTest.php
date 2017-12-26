<?php

namespace Func\Tests;

class HTMLTest extends TestCase
{
    public function testSecureCompress()
    {
        $this->assertEquals(
            $this->twig->render('secure.html.twig'),
            <<<TEST_STR
<html><head><style> body { background: #fcc200; } </style><script> alert('hello') </script></head></html>
TEST_STR

        );
    }

    public function testNotSecureCompress()
    {
        $this->assertEquals(
            $this->twig->render('not_secure.html.twig'),
            <<<TEST_STR
<html><head><style>
            body {
                background: #fcc200;
            }
        </style><script>
            alert('hello')
        </script></head></html>
TEST_STR
        );
    }
}