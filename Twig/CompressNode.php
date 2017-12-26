<?php

namespace Func\Twig;

use Twig_Node;
use Twig_Compiler;

class CompressNode extends Twig_Node
{
    public function __construct(Twig_Node $body, $attributes, $lineno, $tag = 'spaceless')
    {
        parent::__construct(['body' => $body], $attributes, $lineno, $tag);
    }

    public function compile(Twig_Compiler $compiler)
    {
        if ($this->attributes['secure'])
            $replace = " ['/>\s+</', '/[\\x00-\\x20]+/'], ['><', ' '] ";
        else
            $replace = " '/>\s+</', '><' ";

        $compiler
            ->addDebugInfo($this)
            ->write("ob_start();\n")
            ->subcompile($this->getNode('body'))
            ->write("echo trim(preg_replace({$replace}, ob_get_clean()));\n")
        ;
    }
}
