<?php

session_start();
spl_autoload_register();
$template = new \Core\Template();
$dbInfo = parse_ini_file("config/db.ini");
$pdo = new PDO($dbInfo["dsn"],$dbInfo["user"],$dbInfo["pass"]);
$db = new \Database\PDODatabase($pdo);
$userRepository = new \App\Repository\UserRepository($db);
$userService = new \App\Service\UserService($userRepository);
$genreRepo=new \App\Repository\GenreRepository($db);
$genreService = new \App\Service\GenreService($genreRepo);
$booksRepo = new \App\Repository\BooksRepository($db);
$bookService = new \App\Service\BooksService($booksRepo);
$bookHandler = new \App\Http\BooksHandler($template,new \Core\DataBinder());
$userHttpHandler = new \App\Http\HttpHandler($template,new \Core\DataBinder());