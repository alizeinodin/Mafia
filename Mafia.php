<?php

class Mafia {

    private $roles = []; // array of character's of mafia
    private $playerClass; // player class
    private $players = []; // array of players
    private $result = []; // result of program

    public function __construct(Player $player)
    {
        $this->playerClass = $player;
        $this->players = $this->playerClass->getPlayers();
    }

    /**
     * @param array $arr
     *
     * @return array
     * add character's to the array
     */
    public function addChars(array $arr): array
    {
        return $this->roles = $arr;
    }

    /**
     * @param $int
     *
     * delete element's of array
     */
    public function delete($int)
    {
        unset($this->roles[$int]);
    }

    /**
     * @return int
     *
     * return size of array
     */
    public function size(): int
    {
        return count($this->roles);
    }

    /**
     * @return array
     *
     * select a random role for player's
     */
    public function select(): array
    {
        $keys = []; // selected keys
        $i = 0;
        while (count($this->roles) > 0) // until a character is available
        {
            $item = array_rand($this->roles);
            if (!in_array($item, $keys))
            {
                $this->result[$this->players[$i++]] = $this->roles[$item]; // player => role
                unset($this->roles[$item]);
            }
            $keys[] = $item;
        }
        return $this->result;
    }

    /**
     * number of roles must equal to number of players
     *
     * @return bool
     */
    public function validation(): bool
    {
        return count($this->roles) === count($this->players);
    }
}
