
<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/stylist.php";
    require_once __DIR__."/../src/client.php";

    $server = 'mysql:host=localhost:8889;dbname=hair_salon';
    $username = 'root';
    $password = 'root';
    $DB = new PDO($server, $username, $password);

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
        'twig.path' => __DIR__.'/../views'
    ));

    $app['debug'] = true;

    use Symfony\Component\HttpFoundation\Request;
    Request::enableHttpMethodParameterOverride();

    $app->get("/", function() use ($app) {
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    $app->post("/", function() use ($app) {
        $new_stylist = new Stylist($id = null, $_POST['name'], $_POST['telephone'], $_POST['availability']);
        $new_stylist->save();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });

    return $app;
?>
