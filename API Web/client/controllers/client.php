<?php defined('BASEPATH') or exit('No direct script access allowed');

class Client extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        $this->user = 'API_Web';
        $this->pass = 'pass_API_123';
    }

    public function index()
    {
        $data = [
            'title'     => 'Title website',
        ];

        $this->_render('link_view', $data);
    }

    // kirim data API versi 1 (single / array)
    private function CURL($url, $payload)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $output = curl_exec($ch);
        curl_close($ch);
        return json_decode($output, true);
    }

    // kirim data API versi 2 (array)
    private function CURL_array($url, $payload)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        $params = http_build_query($payload);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $output = curl_exec($ch);
        curl_close($ch);

        return json_decode($output, true);
    }

    public function send_versi_satu()
    {
        $data = [
            'id'    => 1,
            'name'  => 'Bams',
            'user'  => $this->user,
            'pass'  => $this->pass,
        ];

        $result = $this->CURL('https://server.com/server/server/versi_satu', $data); //urutan (html/folder/controller/function)

        echo json_encode($result);
    }

    public function send_versi_dua()
    {
        $data = [
            'id'    => 1,
            'name'  => 'Bama',
            'user'  => $this->user,
            'pass'  => $this->pass,
        ];

        $result = $this->CURL_array('https://server.com/server/server/versi_dua', $data); //urutan (html/folder/controller/function)

        echo json_encode($result);
    }
}
