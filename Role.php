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


}
