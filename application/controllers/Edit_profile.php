<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit_profile extends CI_Controller
{

    function __construct() {
        parent::__construct();
        $this->load->model('edit_profile_model');
        if(empty($this->session->userdata('role'))) {
            $this->session->set_flashdata('flash_data', 'You don\'t have access!');
            redirect('login');
        }
    }

    public function index() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $data['s_personal'] =$this->edit_profile_model->getPersonalInfo($student_id);
        $data['district'] = $this->edit_profile_model->getDistrict();
        $this->load->view('edit_profile_personal_view', $data);
    }
    public function update_personal_info() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $full_name=$this->input->post('full_name');
        $father_name=$this->input->post('father_name');
        $mother_name=$this->input->post('mother_name');
        $email=$this->input->post('email');
        $mobile=$this->input->post('mobile');
        if(isset($_POST['mobile_yn'])) {
            $mobile_yn=1;
        }
        else {
            $mobile_yn=0;
        }
        $gender=$this->input->post('gender');
        $birth_date=$this->input->post('birth_date');
        $district=$this->input->post('district');
        if(isset($_POST['district_yn'])) {
            $district_yn=1;
        }
        else {
            $district_yn=0;
        }

        $data = array(
            'full_name' => $full_name,
            'father_name' => $father_name,
            'mother_name' => $mother_name,
            'email' => $email,
            'mobile' => $mobile,
            'mobile_yn' => $mobile_yn,
            'gender' => $gender,
            'birth_date' => $birth_date,
            'district' => $district,
            'district_yn' => $district_yn,
        );
        $this->edit_profile_model->updateProfile($student_id, $data);
        $data['s_personal'] =$this->edit_profile_model->getPersonalInfo($student_id);
        $data['district'] = $this->edit_profile_model->getDistrict();
        $data['success_msg'] = '<div class="alert alert-success text-center">Your personal information updated successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
        $this->load->view('edit_profile_personal_view', $data);
    }

    public function password() {
        $this->load->view('edit_password_view');
    }

    public function update_password() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $old_password=$this->input->post('old_password');
        $result =$this->edit_profile_model->verify_password($student_id, $old_password);
        if(!empty($result)){
            $new_password=$this->input->post('new_password');
            $data = array(
                //'password' => md5($new_password),
                'password' => $new_password,
            );
            $this->edit_profile_model->updatePassword($student_id, $data);
            $data['msg'] = '<div class="alert alert-success text-center">Your password changed successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
            $this->load->view('edit_password_view', $data);
        }
        else{
            $data['msg'] = '<div class="alert alert-danger text-center">Your current password was wrong.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
            $this->load->view('edit_password_view', $data);
        }
    }

    public function education() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $data['s_education'] =$this->edit_profile_model->getEducationInfo($student_id);
        //$data['district'] = $this->edit_profile_model->getDistrict();
        $this->load->view('edit_profile_education_view', $data);
    }
    public function update_education_info() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $high_school_name=$this->input->post('high_school_name');
        $high_school_location=$this->input->post('high_school_location');
        $high_school_passing_year=$this->input->post('high_school_passing_year');
        $college_name=$this->input->post('college_name');
        $college_location=$this->input->post('college_location');
        $college_passing_year=$this->input->post('college_passing_year');
        $u_university_name=$this->input->post('u_university_name');
        $u_university_location=$this->input->post('u_university_location');
        $u_university_subject=$this->input->post('u_university_subject');
        $u_university_admission_year=$this->input->post('u_university_admission_year');
        //$u_university_a_year_privateyn=$this->input->post('u_university_a_year_privateyn');
        if(isset($_POST['u_university_a_year_privateyn'])) {
            $u_university_a_year_privateyn=1;
        }
        else {
            $u_university_a_year_privateyn=0;
        }
        $u_university_passing_year=$this->input->post('u_university_passing_year');
        $p_university_name=$this->input->post('p_university_name');
        $p_university_location=$this->input->post('p_university_location');
        $p_university_subject=$this->input->post('p_university_subject');
        $p_university_admission_year=$this->input->post('p_university_admission_year');
        if(isset($_POST['p_university_a_year_privateyn'])) {
            $p_university_a_year_privateyn=1;
        }
        else {
            $p_university_a_year_privateyn=0;
        }
        $p_university_passing_year=$this->input->post('p_university_passing_year');
        $d_university_name=$this->input->post('d_university_name');
        $d_university_location=$this->input->post('d_university_location');
        $d_university_subject=$this->input->post('d_university_subject');
        $d_university_admission_year=$this->input->post('d_university_admission_year');
        if(isset($_POST['d_university_a_year_privateyn'])) {
            $d_university_a_year_privateyn=1;
        }
        else {
            $d_university_a_year_privateyn=0;
        }
        $d_university_passing_year=$this->input->post('d_university_passing_year');

        $data = array(
            'high_school_name' => $high_school_name,
            'high_school_location' => $high_school_location,
            'high_school_passing_year' => $high_school_passing_year,
            'college_name' => $college_name,
            'college_location' => $college_location,
            'college_passing_year' => $college_passing_year,
            'u_university_name' => $u_university_name,
            'u_university_location' => $u_university_location,
            'u_university_subject' => $u_university_subject,
            'u_university_admission_year' => $u_university_admission_year,
            'u_university_a_year_privateyn' => $u_university_a_year_privateyn,
            'u_university_passing_year' => $u_university_passing_year,
            'p_university_name' => $p_university_name,
            'p_university_location' => $p_university_location,
            'p_university_subject' => $p_university_subject,
            'p_university_admission_year' => $p_university_admission_year,
            'p_university_a_year_privateyn' => $p_university_a_year_privateyn,
            'p_university_passing_year' => $p_university_passing_year,
            'd_university_name' => $d_university_name,
            'd_university_location' => $d_university_location,
            'd_university_subject' => $d_university_subject,
            'd_university_admission_year' => $d_university_admission_year,
            'd_university_a_year_privateyn' => $d_university_a_year_privateyn,
            'd_university_passing_year' => $d_university_passing_year,

        );
        $this->edit_profile_model->updateProfile($student_id, $data);
        $data['s_education'] =$this->edit_profile_model->getEducationInfo($student_id);
        $data['success_msg'] = '<div class="alert alert-success text-center">Your educational information updated successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
        $this->load->view('edit_profile_education_view', $data);
    }

    public function biography() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $data['s_biography'] =$this->edit_profile_model->getBiography($student_id);
        $this->load->view('edit_profile_biography_view', $data);
    }
    public function update_biography() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $biography=$this->input->post('biography');
        $data = array(
            'biography' => $biography,
        );
        $this->edit_profile_model->updateProfile($student_id, $data);
        $data['s_biography'] =$this->edit_profile_model->getBiography($student_id);
        $data['success_msg'] = '<div class="alert alert-success text-center">Your biography updated successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
        $this->load->view('edit_profile_biography_view', $data);
    }

    public function employment() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $data['s_employment'] =$this->edit_profile_model->getEmployment($student_id);
        $this->load->view('edit_profile_employment_view', $data);
    }
    public function update_employment() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $designation=$this->input->post('designation');
        $organization=$this->input->post('organization');
        $location=$this->input->post('location');
        $data = array(
            'designation' => $designation,
            'organization' => $organization,
            'location' => $location,
        );
        $this->edit_profile_model->updateProfile($student_id, $data);
        $data['s_employment'] =$this->edit_profile_model->getEmployment($student_id);
        $data['success_msg'] = '<div class="alert alert-success text-center">Your employment updated successfully.<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
        $this->load->view('edit_profile_employment_view', $data);
    }
    public function photograph() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $data['s_photograph'] =$student_id;
        $this->load->view('edit_profile_photograph_view', $data);
    }
    public function update_photograph() {
        $CI = &get_instance();
        $student_id = $CI->session->userdata('username');
        $config['upload_path'] = 'assets/img/profile/';
        $config['allowed_types'] = 'jpg';
        $config['max_size']   = '1000';
        $config['file_name'] = $student_id;
        $config['max_width']  = '360';
        $config['max_height']  = '400';
        $config['min_width']  = '360';
        $config['min_height']  = '400';

        $this->load->library('upload', $config);
        $this->upload->overwrite = true;

        if (!$this->upload->do_upload('profile_img'))
        {
            $CI = &get_instance();
            $student_id = $CI->session->userdata('username');
            $data = array('error' => $this->upload->display_errors(), 's_photograph'=>$student_id);
            //print_r($upload_error);
            $this->load->view('edit_profile_photograph_view', $data);
        }
        else
        {
            $CI = &get_instance();
            $student_id = $CI->session->userdata('username');
            $upload_data = $this->upload->data();
            $success_msg_con='<div class="alert alert-success text-center">Your photograph  was successfully uploaded!<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>';
            //$data = array('success_msg' => $success_msg_con, 's_photograph'=>$student_id);
            $this->session->set_flashdata('success_msg_pho', '<div class="alert alert-success text-center">Your photograph  was successfully uploaded!<a class="close" title="close" aria-label="close" data-dismiss="alert" href="#">×</a></div>');
            //$this->load->view('edit_profile_photograph_view', $data);
            redirect('edit_profile/photograph');
        }
    }

}
?>