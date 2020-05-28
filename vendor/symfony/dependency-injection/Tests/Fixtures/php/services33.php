<?php

namespace _PhpScoper5ece82d7231e4;

use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Argument\RewindableGenerator;
use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\ContainerInterface;
use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Container;
use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Exception\LogicException;
use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Exception\RuntimeException;
use _PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\ParameterBag\FrozenParameterBag;
/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
class ProjectServiceContainer extends \_PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Container
{
    private $parameters = [];
    private $targetDirs = [];
    public function __construct()
    {
        $this->services = [];
        $this->normalizedIds = ['_PhpScoper5ece82d7231e4\\bar\\foo' => '_PhpScoper5ece82d7231e4\\Bar\\Foo', '_PhpScoper5ece82d7231e4\\foo\\foo' => '_PhpScoper5ece82d7231e4\\Foo\\Foo'];
        $this->methodMap = ['_PhpScoper5ece82d7231e4\\Bar\\Foo' => 'getFooService', '_PhpScoper5ece82d7231e4\\Foo\\Foo' => 'getFoo2Service'];
        $this->aliases = [];
    }
    public function getRemovedIds()
    {
        return ['_PhpScoper5ece82d7231e4\\Psr\\Container\\ContainerInterface' => \true, '_PhpScoper5ece82d7231e4\\Symfony\\Component\\DependencyInjection\\ContainerInterface' => \true];
    }
    public function compile()
    {
        throw new \_PhpScoper5ece82d7231e4\Symfony\Component\DependencyInjection\Exception\LogicException('You cannot compile a dumped container that was already compiled.');
    }
    public function isCompiled()
    {
        return \true;
    }
    public function isFrozen()
    {
        @\trigger_error(\sprintf('The %s() method is deprecated since Symfony 3.3 and will be removed in 4.0. Use the isCompiled() method instead.', __METHOD__), \E_USER_DEPRECATED);
        return \true;
    }
    /**
     * Gets the public 'Bar\Foo' shared service.
     *
     * @return \Bar\Foo
     */
    protected function getFooService()
    {
        return $this->services['Bar\\Foo'] = new \_PhpScoper5ece82d7231e4\Bar\Foo();
    }
    /**
     * Gets the public 'Foo\Foo' shared service.
     *
     * @return \Foo\Foo
     */
    protected function getFoo2Service()
    {
        return $this->services['Foo\\Foo'] = new \_PhpScoper5ece82d7231e4\Foo\Foo();
    }
}
/**
 * This class has been auto-generated
 * by the Symfony Dependency Injection Component.
 *
 * @final since Symfony 3.3
 */
\class_alias('_PhpScoper5ece82d7231e4\\ProjectServiceContainer', 'ProjectServiceContainer', \false);
