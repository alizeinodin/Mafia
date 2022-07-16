<?php

class Role
{
    private $roles = []; // array of role's

    /**
     * return roles
     *
     * @return array
     */
    public function getRoles(): array
    {
        return $this->roles;
    }

    /**
     * @param array $arr
     *
     * @return array
     * add role's to the array
     */
    public function addChars(array $arr): array
    {
        return $this->roles = $arr;
    }

    /**
     * @param $int
     *
     * delete element's of array of role
     */
    public function delete($int)
    {
        unset($this->roles[$int]);
    }

    /**
     * @return int
     *
     * return size of array of Role's
     */
    public function size(): int
    {
        return count($this->roles);
    }

    /**
     * convert all role's of mafia and citizen to an array
     * for random selection role for players by program
     *
     * @param array $citizen
     * @param int $citizenNumber
     * @param array $mafia
     * @param int $mafiaNumber
     * @param int $playerNumber
     */
    public function roleMaker(array $citizen, int $citizenNumber, array $mafia, int $mafiaNumber, int $playerNumber)
    {
        $this->validation(count($citizen), $citizenNumber, count($mafia), $mafiaNumber, $playerNumber);
    }

    /**
     * checking validation for equalization of number's of citizen and mafia role's and players
     * citizen array and mafia array members can lower or equal than citizenNumber and mafiaNumber
     * citizen and mafia number must equal to player numbers
     *
     * @param $citizenIs
     * @param $citizenExpected
     * @param $mafiaIs
     * @param $mafiaExpected
     * @param $playerNumber
     */
    private function validation($citizenIs, $citizenExpected, $mafiaIs, $mafiaExpected, $playerNumber)
    {

    }



}
