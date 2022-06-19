<?php

class Mafia {

    private $characters = []; // array of character's of mafia
    private $players = []; // name of players of mafia
    private $result = []; // result of program

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
     * @return array
     *
     * select a random role for player's
     */
    public function select(): array
    {
        $keys = []; // selected keys
        $i = 0;
        while (count($this->characters) > 0) // until a character is available
        {
            $item = array_rand($this->characters);
            if (!in_array($item, $keys))
            {
                $this->result[$this->players[$i++]] = $this->characters[$item]; // player => role
                unset($this->characters[$item]);
            }
            $keys[] = $item;
        }
        return $this->result;
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
