
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Forgot extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model("forgot_model", "forgot");
    }

    public function index()
    {
        if ($_POST) {
            $result = $this->forgot->validate_user($_POST);
            if (!empty($result)) {
                $to_email=$result->email;
                $username = $result->username;
                $password = ($result->password);

                $this->session->set_flashdata('flash_data', '<div class="alert alert-success text-center">Password sent to your email!<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>');
                $this->emailSend($to_email, $username, $password);
                redirect('forgot');
            } else {
                $this->session->set_flashdata('flash_data', '<div class="alert alert-danger text-center">Student ID or Email not found!<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>');
                redirect('forgot');
            }
        }

        $this->load->view("forgot_view");
    }
    function hex2raw( $str ){
        $op='';
        $chunks = str_split($str, 2);
        for( $i = 0; $i < sizeof($chunks); $i++ ) {
            $op .= chr( hexdec( $chunks[$i] ) );
        }
        return $op;
    }

    function emailSend($email_receiver, $user_id, $password){
        $name = 'Alumni- CSE, BUET';
        $from_email = 'alumni@ugrad.cse.buet.ac.bd';
        $subject = 'Forgot Password';
        $link='<a href="http://cse.buet.ac.bd/alumni/login">alumni login</a>';
        $message = 'Dear User, <br> Your User ID: '.$user_id.' and password: '.$password.'<br>For signin go to '.$link;

        //set to_email id to which you want to receive mails
        $to_email = $email_receiver;

        //configure email settings
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com';
        $config['smtp_port'] = '465';
        $config['smtp_user'] = 'alumni@ugrad.cse.buet.ac.bd';
        $config['smtp_pass'] = 'alumni1alumni';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n"; //use double quotes
        //$this->load->library('email', $config);
        $this->email->initialize($config);

        //send mail
        $this->email->from($from_email, $name);
        $this->email->to($to_email);
        $this->email->subject($subject);
        $this->email->message($message);
        if ($this->email->send())
        {
            print 'OK! Email sent.';
        }
        else
        {
            print 'Error! Email sending fail.';
        }
    }

}