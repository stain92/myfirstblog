<?php
session_start();
spl_autoload_register();
$config = parse_ini_file('Config/db.ini');

$pdo= new PDO($config['dsn'],$config['user'],$config['password'],[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION, PDO::ATTR_CASE=>PDO::CASE_LOWER]);
$db = new \Database\PDODatabase($pdo);

$template = new \Core\Template();
$data_bind = new \Core\DataBinding();

$user_repository = new \Repository\UserRepository($db);
$user_service= new \Service\UserService($user_repository);
$user= new \Http\UserHttp($template,$user_service);

$category_repository = new \Repository\CategoryRepository($db);
$category_service = new \Service\CategoryService($category_repository);
$category = new \Http\CategoryHttp($template,$data_bind,$category_service);

$image_repository = new \Repository\ImageRepository($db);
$image_service = new \Service\ImageService($image_repository);

$post_repository = new \Repository\PostRepository($db);
$post_service = new \Service\PostService($post_repository);
$post = new \Http\PostHttp($template,$data_bind,$post_service,$category_service,$image_service);