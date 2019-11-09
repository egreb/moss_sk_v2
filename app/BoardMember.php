<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BoardMember extends Model
{
    public $name;
    public $role;
    public $email;
    public $phone;

    /**
     * BoardMember represents a member on the board
     * of Moss Schakklub.
     *
     * @param string $name
     * @param string $role
     * @param string $email
     * @param int $phone
     * @return BoardMember
     */
    public static function Create($name, $role, $email = null, $phone = null): BoardMember
    {
        $member = new BoardMember;
        $member->name = $name;
        $member->role = $role;
        $member->email = $email;
        $member->phone = $phone;

        return $member;
    }
}
