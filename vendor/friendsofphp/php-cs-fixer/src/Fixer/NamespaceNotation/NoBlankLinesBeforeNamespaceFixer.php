<?php

/*
 * This file is part of PHP CS Fixer.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *     Dariusz Rumiński <dariusz.ruminski@gmail.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace MolliePrefix\PhpCsFixer\Fixer\NamespaceNotation;

use MolliePrefix\PhpCsFixer\AbstractLinesBeforeNamespaceFixer;
use MolliePrefix\PhpCsFixer\FixerDefinition\CodeSample;
use MolliePrefix\PhpCsFixer\FixerDefinition\FixerDefinition;
use MolliePrefix\PhpCsFixer\Tokenizer\Tokens;
/**
 * @author Graham Campbell <graham@alt-three.com>
 */
final class NoBlankLinesBeforeNamespaceFixer extends \MolliePrefix\PhpCsFixer\AbstractLinesBeforeNamespaceFixer
{
    /**
     * {@inheritdoc}
     */
    public function isCandidate(\MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens)
    {
        return $tokens->isTokenKindFound(\T_NAMESPACE);
    }
    /**
     * {@inheritdoc}
     */
    public function getDefinition()
    {
        return new \MolliePrefix\PhpCsFixer\FixerDefinition\FixerDefinition('There should be no blank lines before a namespace declaration.', [new \MolliePrefix\PhpCsFixer\FixerDefinition\CodeSample("<?php\n\n\n\nnamespace Example;\n")]);
    }
    /**
     * {@inheritdoc}
     *
     * Must run after BlankLineAfterOpeningTagFixer.
     */
    public function getPriority()
    {
        return 0;
    }
    /**
     * {@inheritdoc}
     */
    protected function applyFix(\SplFileInfo $file, \MolliePrefix\PhpCsFixer\Tokenizer\Tokens $tokens)
    {
        for ($index = 0, $limit = $tokens->count(); $index < $limit; ++$index) {
            $token = $tokens[$index];
            if (!$token->isGivenKind(\T_NAMESPACE)) {
                continue;
            }
            $this->fixLinesBeforeNamespace($tokens, $index, 0, 1);
        }
    }
}
