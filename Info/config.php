<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 30/03/2017
 * Time: 19.34
 */
date_default_timezone_set('Europe/Helsinki');

$servername = 'localhost';
$username = 'root';
$password = 'root';
$db = 'planningPoker';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);
// Check connection

function finnish_dateformat($date)
{
    return date('d.m.Y', strtotime($date));
}

