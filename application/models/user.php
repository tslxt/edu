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

    public function verifyByPhone($phone, $pwd) {

        $result = $this->loadByPhone($phone);

        if ($result) {
            echo 'in user';
            echo '<tt><pre>' . var_export($this, true) . '</pre></tt>';
            echo 'in user';
        } else {
            return array(false, LoginMessage::$USER_NOT_EXIST);
        }
    }

    private function loadByPhone($phone) {
        $query = $this->db->get_where($this::DB_TABLE, array('user_phone' => $phone));
        if ($query->row()) {
            $this->populate($query->row());
            return true;
        } else {
            return false;
        }
    }

}