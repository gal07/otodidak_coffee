<?php

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();


        if (!$this->session->userdata('username')) {
            redirect('forbidden');
        } elseif ($this->session->userdata('role') == 2) {
            redirect('forbidden');
        }
    }
    public function index($admin = 'dasbor')
    {
        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();


            $data['title'] = 'Dasbor Admin';
            $this->load->view('admin/templates/header', $data);
            $this->load->view('admin/' . $admin);
            $this->load->view('admin/templates/footer');
        }
    }

    public function kategori($admin = 'kategori')
    {
        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['data'] = $this->kategori_model->get();

            $data['title'] = 'Kategori';

            $this->form_validation->set_rules('kategori', 'Kategori', 'required');
            if ($this->form_validation->run() ==  false) {
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/' . $admin);
                $this->load->view('admin/templates/footer');
            } else {
                $data = [
                    'kategori' => $this->input->post('kategori')
                ];
                $save = $this->kategori_model->save($data);
                if ($save) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-rounded"> <i class="mdi mdi-file-tree"></i> Anda berhasil menambahkan Kategori Baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>');
                    redirect('admin/kategori');
                } else {
                    // $this->session->set_flashdata('failed' , ' Created data Failed');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-rounded"> <i class="mdi mdi-file-tree"></i> Anda gagal menambahkan Kategori Baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>');
                    redirect(base_url('admin/kategori'));
                }
            }
        }
    }

    public function edit_kategori($admin = 'edit_kategori')
    {

        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['data'] = $this->kategori_model->get_spesific($this->input->get('id'));

            $this->form_validation->set_rules('kategori', 'Kategori', 'required|trim');
            $data['title'] = 'Edit Kategori';
            if ($this->form_validation->run() == false) {

                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/' . $admin);
                $this->load->view('admin/templates/footer');
            } else {
                $data = array(
                    'kategori' => $this->input->post('kategori'),
                );

                $id = $this->input->post('id_kategori');
                $update = $this->kategori_model->update($data, $id);
                $this->session->set_flashdata('message', '  <div class="alert alert-success alert-rounded"> <i class="mdi mdi-file-tree"></i> Anda berhasil edit Kategori
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
            </div>');
                redirect(base_url('admin/kategori'));
            }
        }
    }


    public function hk()
    {
        $id = $this->input->get('id');
        $delete = $this->kategori_model->delete($id);
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-rounded"> <i class="mdi mdi-file-tree"></i> Anda berhasil menghapus Kategori
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>');
        redirect(base_url('admin/kategori'));
    }



    public function produk($admin = 'produk')
    {
        if (!file_exists(APPPATH . 'views/admin/' . $admin . '.php')) {
            show_404();
        } else {
            $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
            $data['data'] = $this->produk_model->get();
            $data['kategori'] = $this->kategori_model->get();

            $data['title'] = 'Produk';

            $this->form_validation->set_rules('id_kategori', 'ID Kategori', 'required');
            $this->form_validation->set_rules('produk', 'Produk', 'required');
            $this->form_validation->set_rules('harga', 'Harga', 'required');

            if ($this->form_validation->run() ==  false) {
                $this->load->view('admin/templates/header', $data);
                $this->load->view('admin/' . $admin);
                $this->load->view('admin/templates/footer');
            } else {
                //upload image
                $config['upload_path'] = './assets/produk';
                $config['allowed_types'] = 'gif|jpg|png|jpeg|JPG|JPEG';
                $config['max_size'] = '1024';
                date_default_timezone_set('Asia/Jakarta');
                $config['file_name']  = date('Ymdhis') . '.jpg';
                $config['detect_mime'] = TRUE;
                $this->load->library('upload', $config);

                if ($_FILES['foto']['size'] != 0) {

                    if (!file_exists($config['upload_path'])) {
                        mkdir($config['upload_path']);
                    }

                    if ($this->upload->do_upload('foto')) {
                        echo "<script> alert('oke'); </script>";
                    }
                }
                // data Store
                $data_foto = ($_FILES['foto']['size'] = 1) ? $config['file_name'] : '';

                $data = [
                    'id_produk' => rand(),
                    'id_kategori' => $this->input->post('id_kategori'),
                    'produk' => $this->input->post('produk'),
                    'harga' => $this->input->post('harga'),
                    'foto' => $data_foto,
                    'status' => 1

                ];
                $save = $this->produk_model->save($data);
                if ($save) {
                    $this->session->set_flashdata('message', '<div class="alert alert-success alert-rounded"> <i class="mdi mdi-cart"></i> Anda berhasil menambahkan Kategori Baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>');
                    redirect('admin/produk');
                } else {
                    // $this->session->set_flashdata('failed' , ' Created data Failed');
                    $this->session->set_flashdata('message', '<div class="alert alert-danger alert-rounded"> <i class="mdi mdi-cart"></i> Anda gagal menambahkan Kategori Baru.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
                </div>');
                    redirect(base_url('admin/produk'));
                }
            }
        }
    }
    public function hp()
    {
        $id = $this->input->get('id');
        $delete = $this->produk_model->delete($id);
        $MyPaths = './assets/produk/' . $this->input->get('pict');
        unlink($MyPaths);
        $this->session->set_flashdata('message', '  <div class="alert alert-success alert-rounded"> <i class="mdi mdi-cart"></i> Anda berhasil menghapus Produk
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
    </div>');
        redirect(base_url('admin/produk'));
    }
}
