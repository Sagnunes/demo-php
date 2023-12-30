<?php

require 'functions.php';
require 'router.php';
require 'Database.php';

$db = new Database();
$db->query('SELECT * FROM posts')->fetchAll(PDO::FETCH_ASSOC);
