<?php

class Mafia {

    private $array = []; // array of character's of mafia
    private $players = []; // name of players of mafia

    /**
     * @param array $arr
     *
     * @return array
     * add character's to the array
     */
    public function addChars(array $arr): array
    {
        return $this->array = $arr;
    }

    /**
     * @param $int
     *
     * delete element's of array
     */
    public function delete($int)
    {
        unset($this->array[$int]);
    }

    /**
     * @return mixed
     *
     * select a random char's for player
     */
    public function select()
    {
        $int = mt_rand(0, count($this->array) - 1);
        $instance = $this->array[$int];
        $this->delete($int);
        return $instance;
    }

    /**
     * @return int
     *
     * return size of array
     */
    public function size(): int
    {
        return count($this->array);
    }


}
