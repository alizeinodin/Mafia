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

        $citizenNumber = ceil(count($array) * 2 / 3);
        $mafiaNumber = count($array) - $citizenNumber;

        header("location: /front/html/rules.php?citizen={$citizenNumber}&mafia={$mafiaNumber}");
    }

    /**
     * send a json request to a url
     *
     * @param string $URL
     * @param bool $post
     * @param array $data
     * @param bool $SSL
     *
     * @return bool|string
     */
    public function sendRequest(string $URL, bool $post, array $data, bool $SSL = false): bool|string
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, $SSL);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, $SSL);
        curl_setopt($ch, CURLOPT_VERBOSE, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);

        $result = curl_exec($ch);

        if(curl_error($ch))
        {
            echo "CURL ERROR: ". curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }
}

$order = explode('/', $_SERVER['HTTP_REFERER']);
$order = end($order);
$order = explode('?', $order);
$order = $order[0];

$main = new Main();

switch ($order) {
    case 'addUser.php':
        $main->addUser_HTTP();
        break;
    case 'rules.php':

        break;
}
