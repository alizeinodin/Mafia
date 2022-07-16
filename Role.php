<?php

class Role
{
    private array $roles = []; // array of role's


    public function __construct(array $citizen, int $citizenNumber, array $mafia, int $mafiaNumber, int $playerNumber)
    {
        $this->roleMaker($citizen, $citizenNumber, $mafia, $mafiaNumber, $playerNumber);
    }

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
    private function roleMaker(array $citizen, int $citizenNumber, array $mafia, int $mafiaNumber, int $playerNumber)
    {
        if (!$this->validation($citizen, $citizenNumber, $mafia, $mafiaNumber, $playerNumber))
        {
            $error = "تعداد تیم مافیا و شهروند با تعداد بازیکنان برابر نیست! لطفا تعداد تیم مافیایی و شهروند را اصلاح کنید";
            header("location: /front/html/rules.php?citizen={$citizen}&mafia={$mafia}&error={$error}");
        }
        $this->roles = array_merge($citizen, $mafia);
        ksort($this->roles);
        var_dump($this->roles);
    }

    /**
     * checking validation for equalization of number's of citizen and mafia role's and players
     * citizen array and mafia array members can lower or equal than citizenNumber and mafiaNumber
     * citizen and mafia number must equal to player numbers
     *
     * @param array $citizen
     * @param int $citizenExpected
     * @param array $mafia
     * @param int $mafiaExpected
     * @param int $playerNumber
     *
     * @return bool
     */
    private function validation(array $citizen, int $citizenExpected, array $mafia, int $mafiaExpected, int $playerNumber): bool
    {
        // number's of players must equal with role's in the game so
        // number of mafia and citizen must equal with players but
        // role's can be lower than expected number because
        // program will fill with citizen and mafia role

        return ($citizenExpected + $mafiaExpected === $playerNumber)
            and (count($citizen) <= $citizenExpected)
            and (count($mafia) <= $mafiaExpected);

        // for strict in game
        // this code's is very nice :)
//        $condition2 = true;
//        $condition3 = true;
//
//        // citizen must include a simple citizen at last
//        if (count($citizen) === $citizenExpected) {
//            $condition2 = count(array_intersect($citizen, ['شهروند ساده', 'شهروند', 'shahrvand', 'citizen'])) > 0;
//        }
//
//        // mafia must include a simple mafia at last
//        if (count($mafia) === $mafiaExpected) {
//            $condition3 = count(array_intersect($mafia, ['مافیا ساده', 'مافیا', 'mafia']));
//        }
    }
}
