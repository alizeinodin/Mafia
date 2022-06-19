<?php

class player // singleton method for player class
{
    private static $obg; // object of this class

    protected $players = [];

    /**
     * singleton for this class
     *
     * @return player
     */
    public static function singleton(): player
    {
        isset(self::$obg) ?: self::$obg = new player();
        return self::$obg;
    }

    /**
     * add players to player array
     *
     * @param array $arr
     *
     * @return array
     */
    public function addPlayer(array $arr): array
    {
        return $this->players = $arr;
    }

    /**
     * return players array
     *
     * @return array
     */
    public function getPlayers(): array
    {
        return $this->players;
    }
}
