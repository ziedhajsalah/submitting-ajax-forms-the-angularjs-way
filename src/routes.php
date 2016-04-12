<?php

use Slim\Http\Request;
use Slim\Http\Response;

$app->get('/', function (Request $request, Response $response){
	return $this->view->render(
		$response,
		'home.html.twig',
		[]
	);
})->setName('home');

$app->get('/login', function (Request $request, Response $response){
	return $this->view->render(
		$response,
		'login.html.twig',
		[]
	);
})->setName('loginForm');

$app->post('/login', function (Request $request, Response $response){
	$errors = []; // array to hold validation errors
	$data = []; // array to pass back data

	// validate the variables
	if(empty($request->getParsedBody()['name'])){
		$errors['name'] = 'Name is required.';
	}

	if(empty($request->getParsedBody()['email'])){
		$errors['email'] = 'Email is required.';
	}

	// return a response ==========
	// 
	// response if there are errors
	if(!empty($errors)){
		// if there are items in our errors array, return those errors
		$data['success'] = false;
		$data['errors'] = $errors;
	}else{
		// if there are no errors
		$data['success'] = true;
		$data['message'] = 'success!';
	}

	return $response->withJson($data);
})->setName('loginHandler');