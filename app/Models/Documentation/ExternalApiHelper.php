<?php

/**
 * From Andrew Schmelyun Video on How to use laravel's bind and singleton methods.
 */

namespace App\Models\Documentation;

class ExternalApiHelper
{

    private $foo;

    public function __construct($foo)
    {

        $this->foo = $foo;

    }

    public function foo()
    {

        return $this->foo;

    }

    public static function bar()
    {

        return app(ExternalApiHelper::class)->foo();

    }

    public static function setFoo($foo)
    {

        $externalApi = app(ExternalApiHelper::class);
        $externalApi->foo = $foo;

        // and let's return the whole object so that we don't have to initialize ExternalApiHelper
        // just for calling foo method.

        return $externalApi;

    }

}
