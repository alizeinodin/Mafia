<?php

class Player // singleton for player class
{
    private array $players = [];

    /**
     * add players to player array
     *
     * @param $name
     * @param array $arr
     *
     * @return array
     */
    public function __set($name, array $arr)
    {
        return $this->players = $arr;
    }

    /**
     * return players array
     *
     * @param $name
     *
     * @return array
     */
    public function __get($name): array
    {
        return $this->players;
    }
}
