<?php

class Main
{
    public function addUser_HTTP()
    {
        $data = $_POST['frm'];
        $array = array_map('trim', explode(',', $data['name']));
        var_dump($array);
    }
}

$order = explode('/', $_SERVER['HTTP_REFERER']);
$order = end($order);

$main = new Main();

switch ($order) {
    case 'addUser.php':
        $main->addUser_HTTP();
        break;
}
