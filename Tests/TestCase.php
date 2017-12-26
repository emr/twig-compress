<?php

namespace Func\Tests;

use Func\Twig\CompressExtension;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Twig_Environment
     */
    protected $twig;

    public function setUp()
    {
        $loader = new \Twig_Loader_Filesystem([
            __DIR__.'/templates'
        ]);
        $this->twig = new \Twig_Environment($loader);
        $this->twig->addExtension(new CompressExtension());
    }
}