<?php

class Player // singleton for player class
{
    protected $players = [];

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
