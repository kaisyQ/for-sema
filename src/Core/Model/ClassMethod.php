<?php

declare(strict_types=1);

namespace Jason\Backend\Core\Model;

class ClassMethod
{
    private string $methodName;

    private string $className;

    public function getClassName(): string
    {
        return $this->className;
    }
   
    /** @param class-string $className */
    public function setClassName(string $className): self
    {
        $this->className = $className;

        return $this;
    }

    public function getMethodName(): string
    {
        return $this->methodName;
    }

    public function setMethodName(string $methodName): self
    {
        $this->methodName = $methodName;

        return $this;
    }
}