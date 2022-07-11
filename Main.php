<?php
require_once 'Player.php';

class Main
{
    protected Player $player;

    public function addUser_HTTP()
    {
        $data = $_POST['frm'];
        $array = array_map('trim', explode(',', $data['name']));

        $this->player = new Player();
        $this->player->players = $array;

        var_dump($this->player);
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
