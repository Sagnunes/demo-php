<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$config = require('config.php');
$db = new Database($config['database']);

$id = $_GET['id'];
$query = 'SELECT * FROM posts where id = :id';

$db->query($query, ['id' => $id])->fetchAll(PDO::FETCH_ASSOC);
