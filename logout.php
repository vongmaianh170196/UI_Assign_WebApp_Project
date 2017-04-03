<?php
/**
 * Created by PhpStorm.
 * User: nguyenlinh
 * Date: 03/04/2017
 * Time: 9.11
 */
session_start();
session_destroy();

header('Location: index.html');