<?php

class Mafia {

    private $characters = []; // array of character's of mafia
    private $players = []; // name of players of mafia

    /**
     * @param array $arr
     *
     * @return array
     * add character's to the array
     */
    public function addChars(array $arr): array
    {
        return $this->characters = $arr;
    }

    /**
     * @param $int
     *
     * delete element's of array
     */
    public function delete($int)
    {
        unset($this->characters[$int]);
    }

    /**
     * @return int
     *
     * return size of array
     */
    public function size(): int
    {
        return count($this->characters);
    }

    /**
     * @return mixed
     *
     * select a random char's for player
     */
    public function select()
    {
        $int = mt_rand(0, count($this->characters) - 1);
        $instance = $this->characters[$int];
        $this->delete($int);
        return $instance;
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
     * number of characters must equal to number of players
     *
     * @return bool
     */
    public function validation(): bool
    {
        return count($this->characters) === count($this->players);
    }


}
