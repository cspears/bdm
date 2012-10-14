<?php
use Symfony\Component\HttpFoundation\Request;

class Bootstrap
{
    public static function bootstrapApp($debug = false)
    {
        $app = new Silex\Application();
        $app->register(new Igorw\Silex\ConfigServiceProvider(__DIR__ . "/../config/application.yml"));
        //twig
        $app->register(
            new Silex\Provider\TwigServiceProvider(),
            array(
                'twig.path' => APPLICATION_PATH . '/../views',
            )
        );
        // definitions
        $app->get(
            '/',
            function () use ($app) {
                return $app['twig']->render('index.html');
            }
        );

        return $app;
    }
}
