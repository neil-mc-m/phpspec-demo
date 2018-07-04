<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Standard;
use App\Premium;
use App\Featured;
use App\EntityManager;

$app = new Silex\Application();
$app['debug'] = true;
$app->register(new Silex\Provider\TwigServiceProvider(), array(
	'twig.path' => __DIR__.'/../views'
));


$app->get('/', function() use ($app) {
	return $app['twig']->render('home.twig', array(
		'advert_types' => array(
			'standard', 'premium', 'featured'
		)
	));
});

$app->get('/standard', function() use ($app) {

	$standard = new Standard(new EntityManager());
	$cost = $standard->getCost();
	$advertType = $standard->getName();
	$standardFeautures = $standard->getFeatures();

	return $app['twig']->render('standard.twig', array(
		'advert_type' => $advertType,
		'standard_features' => $standardFeautures,
		'cost' => $cost 
	));
});

$app->get('/premium', function() use ($app) {

	$premium = new Premium(new Standard(new EntityManager()));
	$cost = $premium->getCost();
	$advertType = $premium->getName();
	$premiumFeatures = $premium->getFeatures();

	return $app['twig']->render('premium.twig', array(
		'advert_type' => $advertType,
		'premium_features' => $premiumFeatures,
		'cost' => $cost 
	));
});

$app->get('/featured', function() use ($app) {
	
	$featured = new Featured(new Premium(new Standard(new EntityManager())));
	$cost = $featured->getCost();
	$advertType = $featured->getName();

	return $app['twig']->render('featured.twig', array(
		'advert_type' => $advertType,
		'featured_features' => $featured->getFeatures(),
		'cost' => $cost 
	));
});
$app->run();
