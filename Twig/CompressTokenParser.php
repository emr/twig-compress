<?php

namespace Func\Twig;

use Twig_Token;
use Twig_TokenParser;
use Twig_Error_Syntax;

final class CompressTokenParser extends Twig_TokenParser
{
    public function parse(Twig_Token $token)
    {
        $stream = $this->parser->getStream();

        $attributes = [
            'secure' => true,
        ];

        while (!$stream->test(Twig_Token::BLOCK_END_TYPE)) {
            if (
                $stream->test(Twig_Token::OPERATOR_TYPE, 'not')
            ){
                $stream->next();
                if ($stream->test(Twig_Token::NAME_TYPE, 'secure'))
                    $attributes['secure'] = false;
            }
            elseif ($stream->test(Twig_Token::NAME_TYPE, 'secure'))
            {
                $stream->next();
                if($stream->test(Twig_Token::OPERATOR_TYPE, '='))
                {
                    $stream->next();
                    $attributes['secure'] = 'true' == $stream->expect(\Twig_Token::NAME_TYPE, ['true', 'false'])->getValue();
                }
            }
            else
            {
                $token = $stream->getCurrent();
                throw new Twig_Error_Syntax(sprintf('Unexpected token "%s" of value "%s"', \Twig_Token::typeToEnglish($token->getType()), $token->getValue()), $token->getLine(), $stream->getFilename());
            }
        }

        $stream->expect(Twig_Token::BLOCK_END_TYPE);
        $body = $this->parser->subparse(array($this, 'decideCompressEnd'), true);
        $stream->expect(Twig_Token::BLOCK_END_TYPE);

        return new CompressNode($body, $attributes, $token->getLine(), $this->getTag());
    }

    public function decideCompressEnd(Twig_Token $token)
    {
        return $token->test('endcompress');
    }

    public function getTag()
    {
        return 'compress';
    }
}