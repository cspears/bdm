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

        //reports
        $reports = array(
            array(
                'id' => 1,
                'name' => 'Report 1',
                'description' =>"Now that we know who you are, I know who I am. I'm not a mistake! It all makes sense! In a comic, you know how you can tell who the arch-villain's going to be? He's the exact opposite of the hero."
                ),
            array(
                'id' => 2,
                'name' => 'Report Other',
                'description' => "And most times they're friends, like you and me! I should've known way back when... You know why, David? Because of the kids. They called me Mr Glass."
                )
            );

        // definitions
        $app->get(
            '/',
            function () use ($app, $reports) {
                return $app['twig']->render('index.twig', array('reports'=>$reports));
            }
        );

        $app->get(
            '/report/show/{id}',
            function (Silex\Application $app, $id) use ($reports) {
                switch ($id) {
                    case 1:
                        $data = array(
                            'headers'=>array(
                                'Name', 'Age'
                            ), 
                            'rows'=> array(
                                array('John', 12), 
                                array('Eric', 28)
                                )
                            );
                        break;
                    default:
                        $app->abort(404, "Post $id does not exist.");
                }

                return $app['twig']->render('report.twig', array('report'=>$reports[$id-1], 'data'=>$data));




            }
        );

        return $app;
    }
}
