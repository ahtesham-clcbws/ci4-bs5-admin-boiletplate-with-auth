<?php

namespace App\Decorators;

use CodeIgniter\View\ViewDecoratorInterface;

class MobileViewDecorator implements ViewDecoratorInterface
{
    public static function decorate(string $html): string
    {
        // Modify the output here

        return $html;
    }
}