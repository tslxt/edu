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
     * @var string
     * */
    public $user_phone;
    /*
     * @var string
     * */
    public $user_pwd;
    /*
     * @var string
     * */
    public $last_ip;
    /*
     * @var string
     * */
    public $last_login;
    /*
     * @var datetime
     * */
    public $created;

    public function verifyByPhone($phone, $pwd) {

        $this->load->helper('date');

        $this->load->model(array('loginmessage'));

        $result = $this->loadByPhone($phone);

        if ($result) {

            if ($this->phpass->check($pwd, $this->user_pwd)) {

                $this->last_ip = $this->input->ip_address();

                $this->last_login = unix_to_human(time(), TRUE, 'eu');

                $this->save();

                return array(true);
            }else {
                return array(false, LoginMessage::$WRONG_PWD);
            }


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