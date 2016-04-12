<?php

$container = new Slim\Container();

$container['view'] = function($container){
	$view = new \Slim\Views\Twig(__DIR__ . '/../templates',
		['cache' => false]
	);
	$view->addExtension(new \Slim\Views\TwigExtension(
		$container['router'],
		$container['request']->getUri()
	));

	return $view;
};