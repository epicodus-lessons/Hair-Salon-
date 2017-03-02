
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
        $new_stylist = new Stylist($_POST['name'], $_POST['telephone'], $_POST['availability'], $id = null);
        $new_stylist->save();
        return $app->redirect("/");
    });

    $app->get("/stylist/{id}", function($id) use ($app) {
        return $app['twig']->render('stylist.html.twig', array('clients' => Client::find($id)));
    });

    $app->post("/stylist", function() use ($app) {

        $new_client = new Client($_POST['name'], $_POST['telephone'], $POST['stylist_id']);
        $new_client->save();
        $found_stylists = Stylist::find($id);
        return $app['twig']->render('stylist.html.twig', array('clients' => $found_stylists->getClients()));
    });

    $app->post("/delete", function() use($app) {
        Stylist::deleteAll();
        Client::deleteAll();
        return $app['twig']->render('index.html.twig', array('stylists' => Stylist::getAll()));
    });
    return $app;
?>
