<?php
require_once __DIR__ . '/../vendor/autoload.php';

use App\Standard;
use App\Premium;
use App\Featured;
use App\Cost;

$app = new Silex\Application();
$app['debug'] = true;

$app->register(
    new Silex\Provider\TwigServiceProvider(), [
        'twig.path' => __DIR__ . '/../views'
    ]
);

$app->get(
    '/',
    function () use ($app) {
        return $app['twig']->render('home.twig',
            [
                'advert_types' => [
                    'standard',
                    'premium',
                    'featured'
                ]
            ]
        );
    }
);

$app->get(
    '/standard',
    function () use ($app) {

        $standard = new Standard(new Cost);

        return $app['twig']->render(
            'standard.twig',
            [
                'advert_type' => $standard->getName(),
                'standard_features' => $standard->getFeatures(),
                'cost' => $standard->getCost()
            ]
        );
    }
);

$app->get(
    '/premium',
    function () use ($app) {

        $premium = new Premium(new Standard(new Cost()));

        return $app['twig']->render(
            'premium.twig',
            [
                'advert_type' => $premium->getName(),
                'premium_features' => $premium->getFeatures(),
                'cost' => $premium->getCost()
            ]
        );
    }
);

$app->get(
    '/featured',
    function () use ($app) {

        $featured = new Featured(new Premium(new Standard(new Cost)));

        return $app['twig']->render(
            'featured.twig',
            [
                'advert_type' => $featured->getName(),
                'featured_features' => $featured->getFeatures(),
                'cost' => $featured->getCost()
            ]
        );
    }
);
$app->run();
