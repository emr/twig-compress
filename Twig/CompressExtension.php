<?php

namespace Func\Twig;

use Twig_Extension;

class CompressExtension extends Twig_Extension
{
    public function getTokenParsers()
    {
        return [
            new CompressTokenParser()
        ];
    }
}