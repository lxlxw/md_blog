<?php
error_reporting(0);
header('Content-Type:text/html;charset=utf-8');
date_default_timezone_set('prc');

function file2info($file)
{
    $name = rtrim(basename($file), '.md');
    list($id, $date, $title) = explode('-', $name);
    $date = date('Y-m-d', strtotime($date));
    return ['id' => (int)$id, 'date' => $date, 'title' => $title];
}