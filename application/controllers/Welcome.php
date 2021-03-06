<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

        $this->output->enable_profiler(true);

        $this->load->library('table');
        $this->load->model(array('User'));

        $user = new User();

        echo $user::DB_TABLE_PK;
        echo $user::DB_TABLE;

        $result = $user->verifyByPhone(18601199806,'11111111');

        echo '<tt><pre>' . var_export($result, true) . '</pre></tt>';

        if ($result[0]) {
            echo '<tt><pre>' . var_export($user, true) . '</pre></tt>';
//            $user->save();
        } else {
            echo $result[1];
        }


        $this->load->view('welcome_message');
	}

	public function test () {
        $this->output->enable_profiler(true);

//        $ctime = getdate()[0];
//
//        $vtime = getdate()[0] - 1403895882;

        $this->load->helper('date');

        $now = time();
//        echo unix_to_human($now); // U.S. time, no seconds
//        echo unix_to_human($now, TRUE, 'us'); // U.S. time with seconds
        echo unix_to_human($now, TRUE, 'eu'); // Euro time with seconds


        $ip = $this->input->ip_address();



        echo '<tt><pre>' . var_export($ip, true) . '</pre></tt>';

        $user_agent = substr($this->input->user_agent(),0,149);
        echo '<tt><pre>' . var_export($user_agent, true) . '</pre></tt>';

        echo time() - 86400;
    }

    public function test1($phone=null) {
        $this->output->enable_profiler(true);

//        echo $phone;

        $this->load->library('table');
        $this->load->model(array('User'));

        $user = new User();

        $result = $user->get_user_by_id($phone);

        echo '<tt><pre>' . var_export($result, true) . '</pre></tt>';

        echo '<tt><pre>' . var_export($user, true) . '</pre></tt>';


    }
}
