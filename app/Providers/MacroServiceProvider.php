<?php

namespace App\Providers;

use App\Components\Macros;
use Collective\Html\HtmlServiceProvider;

class MacroServiceProvider extends HtmlServiceProvider
{
    protected function registerFormBuilder()
    {
        $this->app->singleton('form', function ($app)
        {
            $form = new Macros($app['html'], $app['url'], $app['view'], $app['session.store']->token());
            return $form->setSessionStore($app['session.store']);
        });
    }
}
