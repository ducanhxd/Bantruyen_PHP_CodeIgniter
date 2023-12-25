<?php
defined('BASEPATH') or exit('No direct script access allowed');
class ProductController extends CI_Controller
{
    public function checkLogin()
    {
        if (!$this->session->userdata('LoggedIn')) {
            redirect(base_url('/login'));
        }
    }

    public function index()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->model('ProductModel');
        $data['product'] = $this->ProductModel->selectAllProduct();
        $this->load->view('product/list', $data);
        $this->load->view('admin_template/footer');
    }

    public function create()
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');

        $this->load->model('BrandModel');
        $data['brand'] = $this->BrandModel->selectBrand();

        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

        $this->load->view('product/create', $data);
        $this->load->view('admin_template/footer');
    }

    public function store()
    {
        $this->form_validation->set_rules('title', 'Tên nhà xuất bản', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('quantity', 'Số lượng', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('description', 'Mô tả', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('price', 'Giá tiền', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        if ($this->form_validation->run() == TRUE) {
            //upload image
            $ori_filename = $_FILES['image']['name'];
            $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
            $config = [
                'upload_path' => './uploads/product',
                'allowed_types' => 'gif|jpg|png|jpeg',
                'file_name' => $new_name,
            ];
            //move_uploaded_file(path, $new_name);
            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('image')) {
                $error = array('error' => $this->upload->display_errors());
                $this->load->view('admin_template/header');
                $this->load->view('admin_template/navbar');
                $this->load->view('product/create', $error);
                $this->load->view('admin_template/footer');
            } else {
                $filename = $this->upload->data('file_name');
                $data = [
                    'title' => $this->input->post('title'),
                    'price' => $this->input->post('price'),
                    'description' => $this->input->post('description'),
                    'slug' => $this->input->post('slug'),
                    'quantity' => $this->input->post('quantity'),
                    'category_id' => $this->input->post('category_id'),
                    'brand_id' => $this->input->post('brand_id'),
                    'status' => $this->input->post('status'),
                    'image' => $filename
                ];
                $this->load->model('ProductModel');
                $this->ProductModel->insertProduct($data);
                $this->session->set_flashdata('success', 'Thêm truyện thành công');
                redirect(base_url('product/list'));
            }
        } else {
            $this->create();
        }
    }
    public function edit($id)
    {
        $this->checkLogin();
        $this->load->view('admin_template/header');
        $this->load->view('admin_template/navbar');
        $this->load->model('BrandModel');
        $data['brand'] = $this->BrandModel->selectBrand();

        $this->load->model('CategoryModel');
        $data['category'] = $this->CategoryModel->selectCategory();

        $this->load->model('ProductModel');
        $data['product'] = $this->ProductModel->selectProductById($id);
        $this->load->view('product/edit', $data);
        $this->load->view('admin_template/footer');
    }
    public function update($id)
    {
        $this->form_validation->set_rules('title', 'Tên nhà xuất bản', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('price', 'Giá tiền', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('slug', 'Slug', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('quantity', 'Số lượng', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        $this->form_validation->set_rules('description', 'Mô tả', 'trim|required', ['required' => 'Bạn phải điền %s.']);
        if ($this->form_validation->run() == TRUE) {
            //upload image
            if (!empty($_FILES['image']['name'])) {
                $ori_filename = $_FILES['image']['name'];
                $new_name = time() . "" . str_replace(' ', '-', $ori_filename);
                $config = [
                    'upload_path' => './uploads/product',
                    'allowed_types' => 'gif|jpg|png|jpeg',
                    'file_name' => $new_name,
                ];
                //move_uploaded_file(path, $new_name);
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('image')) {
                    $error = array('error' => $this->upload->display_errors());
                    $this->load->view('admin_template/header');
                    $this->load->view('admin_template/navbar');
                    $this->load->view('product/edit/' . $id, $error);
                    $this->load->view('admin_template/footer');
                } else {
                    $filename = $this->upload->data('file_name');
                    $data = [
                        'title' => $this->input->post('title'),
                        'description' => $this->input->post('description'),
                        'price' => $this->input->post('price'),
                        'slug' => $this->input->post('slug'),
                        'quantity' => $this->input->post('quantity'),
                        'price' => $this->input->post('price'),
                        'category_id' => $this->input->post('category_id'),
                        'brand_id' => $this->input->post('brand_id'),
                        'status' => $this->input->post('status'),
                        'image' => $filename
                    ];
                }
            } else {
                $data = [
                    'title' => $this->input->post('title'),
                    'description' => $this->input->post('description'),
                    'price' => $this->input->post('price'),
                    'slug' => $this->input->post('slug'),
                    'quantity' => $this->input->post('quantity'),
                    'category_id' => $this->input->post('category_id'),
                    'brand_id' => $this->input->post('brand_id'),
                    'status' => $this->input->post('status'),
                ];
            }
            $this->load->model('ProductModel');
            $this->ProductModel->updateProduct($id, $data);
            $this->session->set_flashdata('success', 'Sửa thông tin truyện thành công');
            redirect(base_url('product/list'));
        } else {
            $this->edit($id);
        }
    }
    public function delete($id)
    {
        $this->load->model('ProductModel');
        $this->ProductModel->deleteProduct($id);
        $this->session->set_flashdata('success', 'Xóa truyện thành công');
        redirect(base_url('product/list'));
    }
}
