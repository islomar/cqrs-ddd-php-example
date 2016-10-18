<?php

namespace CodelyTv\Test\PhpUnit\TestCase;

use CodelyTv\Api\ApiKernel;

abstract class FunctionalTestCase extends UnitTestCase
{
    /** @var ApiKernel */
    private $kernel;

    protected function setUp()
    {
        parent::setUp();

        $this->kernel()->boot();
    }

    protected function service($id)
    {
        return $this->container()->get($id);
    }

    protected function parameter($parameter)
    {
        return $this->container()->getParameter($parameter);
    }

    private function kernel()
    {
        return $this->kernel = $this->kernel ?: new ApiKernel('test', true);
    }

    private function container()
    {
        return $this->kernel()->getContainer();
    }
}
