<?php defined('BASEPATH') or exit('No direct script access allowed');

class Server extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->load->model('server_model', 'model');

        $this->user = 'API_Web';
        $this->pass = 'pass_API_123';
    }

    private function _cekAPI($user, $pass)
    {
        if ($user == $this->user) {
            if (password_verify($pass, $this->pass)) {
                return true;
            } else {
                echo json_encode(array(
                    'status' => false,
                    'message' => 'Password Salah',
                    'data' => '',
                ), JSON_PRETTY_PRINT);
                exit();
            }
        } else {
            echo json_encode(array(
                'status' => false,
                'message' => 'User tidak tersedia',
                'data' => '',
            ), JSON_PRETTY_PRINT);
            exit();
        }

        return true;
    }

    // terima data API versi 1
    public function versi_satu()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $validasi = $this->_cekAPI($user, $pass);

        if ($validasi) {
            $data = $this->model->model_versi_satu($id, $name);
        }

        if ($data) {
            echo json_encode(array(
                'status' => true,
                'total' => count($data),
                'data' => $data,
            ), JSON_PRETTY_PRINT);
        }else{
            echo json_encode(array(
                'status' => false,
                'total' => 0,
                'data' => '',
            ), JSON_PRETTY_PRINT);
        }
    }

    // terima data API versi 2
    public function versi_dua()
    {
        $id = $this->input->post('id');
        $name = $this->input->post('name');
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $validasi = $this->_cekAPI($user, $pass);

        if ($validasi) {
            $data = $this->model->model_versi_dua($id, $name);
        }

        if ($data) {
            echo json_encode(array(
                'status' => true,
                'total' => count($data),
                'data' => $data,
            ), JSON_PRETTY_PRINT);
        }else{
            echo json_encode(array(
                'status' => false,
                'total' => 0,
                'data' => '',
            ), JSON_PRETTY_PRINT);
        }
    }
}
