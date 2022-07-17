<?php
session_start();
require_once 'Player.php';
require_once 'Role.php';
require_once 'Mafia.php';

class Main
{
    protected Role $role;

    public function addUser_HTTP()
    {
        $data = $_POST['frm'];
        $array = $this->inputToArray($data['name']);

        $_SESSION["players"] = $array;

        $citizenNumber = ceil(count($array) * 2 / 3);
        $mafiaNumber = count($array) - $citizenNumber;

        header("location: /front/html/rules.php?citizen={$citizenNumber}&mafia={$mafiaNumber}");
    }

    public function rules_HTTP()
    {
        $data = $_POST['frm'];

        $citizen = $this->inputToArray($data['citizen']);
        $mafia = $this->inputToArray($data['mafia']);

        $citizenNumber = (int) $data['citizenNumber'];
        $mafiaNumber = (int) $data['mafiaNumber'];

        $this->run($citizen, $citizenNumber, $mafia, $mafiaNumber);
    }

    private function inputToArray($data): array
    {
        return array_map('trim', explode(',', $data));
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

        if (curl_error($ch)) {
            echo "CURL ERROR: " . curl_error($ch);
        }
        curl_close($ch);

        return $result;
    }

    public function run(array $citizen, int $citizenNumber, array $mafia, int $mafiaNumber)
    {
        $player = new Player();
        $player->players = $_SESSION['players'];

        $role = new Role($citizen, $citizenNumber, $mafia, $mafiaNumber, count($_SESSION['players']));

        $mafia = new Mafia($player, $role);
        $_SESSION['Mafia'] = $mafia->select();
        $_SESSION['counter'] = 0; // for show data of ith user
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
        $main->rules_HTTP();
        break;
}
