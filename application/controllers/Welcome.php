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
        $user->load(2);


        echo '<tt><pre>' . var_export($user, true) . '</pre></tt>';

//        $this->load->library('phpass');
        $pwd = '11111111';
//        $hashed = $this->phpass->hash($pwd);
        $hashed = $user->user_pwd;

        echo $pwd;
        echo '<br>';
        echo $hashed;
        echo '<br>';
        echo strlen($hashed);

        if ($this->phpass->check($pwd, $hashed)) {
            echo 'login in';
        }else {
            echo 'wrong password';
        }






        $this->load->view('welcome_message');
	}
}
