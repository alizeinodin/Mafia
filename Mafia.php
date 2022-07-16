<?php

class Mafia {


    private Player $playerClass; // player class
    private Role $roleClass; // role class

    private array $roles = []; // array of character's of mafia
    private array $players = []; // array of players
    private array $result = []; // result of program

    public function __construct(Player $player, Role $role)
    {
        $this->playerClass = $player;
        $this->players = $this->playerClass->players;

        $this->roleClass = $role;
        $this->roles = $this->roleClass->getRoles();

        if (!$this->validation())
        {
            exit("ERROR");
        }
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
     * return result array
     * the result of random selection in program
     *
     * @return array
     */
    public function getResult(): array
    {
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
