<?php
/**
 * Created by PhpStorm.
 * User: lxt
 * Date: 17/1/25
 * Time: 03:07
 */
class User extends EDU_Model {

    const DB_TABLE = 'users';
    const DB_TABLE_PK = 'user_id';
    /*
     * @var int
     * */
    public $user_id;
    /*
     * @var string;
     * */
    public $user_phone;
    /*
     * @var string;
     * */
    public $user_pwd;

}