<?php
defined('BASEPATH') or exit('No direct script access allowed');
class LogInController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct(); //load tất cả mọi thứ
    }
    public function index()
    {
        $this->load->view('template/header');
        $this->load->view('login/index');
        $this->load->view('template/footer');
    }
    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required', ['required' => 'Bạn phải điền %s.']);

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $this->load->model('LoginModel');

            $result = $this->LoginModel->checkLogin($email, $password);
            if ($result) {
                $session_array = [
                    'id' => $result[0]->id,
                    'username' => $result[0]->username,
                    'email' =>  $result[0]->email,
                ];
                $this->session->set_userdata('LoggedIn', $session_array);
                $this->session->set_flashdata('success', 'Đăng nhập thành công!');
                redirect(base_url('/dashboard'));
            } else {
                $this->session->set_flashdata('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại email hoặc mật khẩu!');
                redirect(base_url('login'));
            }
        } else {
            $this->index();
        }
    }
    public function login_customer()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('password', 'Mật khẩu', 'trim|required', ['required' => 'Bạn phải điền %s.']);

        if ($this->form_validation->run()) {
            $email = $this->input->post('email');
            $password = md5($this->input->post('password'));

            $this->load->model('LoginModel');

            $result = $this->LoginModel->checkLoginCustomer($email, $password);
            if ($result) {
                $session_array = [
                    'id' => $result[0]->id,
                    'username' => $result[0]->name,
                    'email' =>  $result[0]->email,
                ];
                $this->session->set_userdata('LoggedInCustomer', $session_array);
                $this->session->set_flashdata('success', 'Đăng nhập thành công!');
                redirect(base_url('/dang-nhap'));
            } else {
                $this->session->set_flashdata('error', 'Đăng nhập thất bại, vui lòng kiểm tra lại email hoặc mật khẩu!');
                redirect(base_url('dang-nhap'));
            }
        } else {
            redirect(base_url("/dang-nhap"));
        }
    }
}
