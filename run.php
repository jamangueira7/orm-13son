<?php
/**
 * Created by PhpStorm.
 * User: mangueira
 * Date: 25/04/18
 * Time: 20:01
 */

require __DIR__.'/vendor/autoload.php';
use App\Model\Users as Model;
use JM\SON\Drivers\MySqlPdo;
$pdo = new PDO('mysql:host=localhost;dbname=orm-13son','root','');

$driver = new MySqlPdo($pdo);

$model = new Model;

$model->setDriver($driver);

$model->name = 'Joao';
$model->age = 32;
$model->email = 'joao@joao.com';
$model->save();

$model->findAll();
$model->findFirst(1);

$model->id = 1;
$model->name = 'Jose';
$model->save();

$model->id = 2;
$model->delete();


