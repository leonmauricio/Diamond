<?php

require "vendor/autoload.php";
include 'config.php';
include 'helpers.php';
session_start();

// Register the application routes
$router = new Router;

// Books
$router->registerRoute('GET', 'books', ['BooksController', 'index']);
$router->registerRoute('GET', 'book', ['BooksController', 'show']);
$router->registerRoute('GET', 'books/admin', ['BooksController', 'admin']);
$router->registerRoute('GET', 'books/create', ['BooksController', 'create']);
$router->registerRoute('GET', 'books/update', ['BooksController', 'edit']);
$router->registerRoute('POST', 'books', ['BooksController', 'store']);
$router->registerRoute('POST', 'books/delete', ['BooksController', 'delete']);
$router->registerRoute('POST', 'books/update', ['BooksController', 'update']);

// Categories
$router->registerRoute('GET', 'categories', ['CategoriesController', 'index']);
$router->registerRoute('GET', 'category', ['CategoriesController', 'show']);
$router->registerRoute('GET', 'categories/admin', ['CategoriesController', 'admin']);
$router->registerRoute('GET', 'categories/create', ['CategoriesController', 'create']);
$router->registerRoute('GET', 'categories/update', ['CategoriesController', 'edit']);
$router->registerRoute('POST', 'categories', ['CategoriesController', 'store']);
$router->registerRoute('POST', 'categories/delete', ['CategoriesController', 'delete']);
$router->registerRoute('POST', 'categories/update', ['CategoriesController', 'update']);

// Authors
$router->registerRoute('GET', 'authors', ['AuthorsController', 'index']);
$router->registerRoute('GET', 'author', ['AuthorsController', 'show']);
$router->registerRoute('GET', 'authors/admin', ['AuthorsController', 'admin']);
$router->registerRoute('GET', 'authors/create', ['AuthorsController', 'create']);
$router->registerRoute('GET', 'authors/update', ['AuthorsController', 'edit']);
$router->registerRoute('POST', 'authors', ['AuthorsController', 'store']);
$router->registerRoute('POST', 'authors/delete', ['AuthorsController', 'delete']);
$router->registerRoute('POST', 'authors/update', ['AuthorsController', 'update']);

// Session
$router->registerRoute('GET', 'login', ['SessionsController', 'create']);
$router->registerRoute('GET', 'logout', ['SessionsController', 'delete']);
$router->registerRoute('POST', 'login',  ['SessionsController', 'store']);

// Users
$router->registerRoute('GET', 'users', ['UsersController', 'index']);
$router->registerRoute('GET', 'user', ['UsersController', 'show']);
$router->registerRoute('GET', 'users/admin', ['UsersController', 'admin']);
$router->registerRoute('GET', 'users/create',  ['UsersController', 'create']);
$router->registerRoute('GET', 'users/update', ['UsersController', 'edit']);
$router->registerRoute('POST', 'users',  ['UsersController', 'store']);
$router->registerRoute('POST', 'users/delete', ['UsersController', 'delete']);
$router->registerRoute('POST', 'users/update', ['UsersController', 'update']);

// Contact form
$router->registerRoute('GET', 'contact-form', ['ContactFormController', 'create']);
$router->registerRoute('POST', 'contact-form', ['ContactFormController', 'store']);

// Cart
$router->registerRoute('GET', 'cart', ['ProductsCartController', 'index']);
$router->registerRoute('GET', 'cart/add', ['ProductsCartController', 'store']);
$router->registerRoute('POST', 'cart/delete', ['ProductsCartController', 'delete']);

// Order
$router->registerRoute('POST', 'orders', ['OrdersController', 'store']);

// Home
$router->registerRoute('GET', 'home', ['PagesController', 'index']);

// Get requested method and URI
$uri = isset($_GET['route'])? $_GET['route'] : 'home';
$router->getController($_SERVER['REQUEST_METHOD'], $uri, $config);