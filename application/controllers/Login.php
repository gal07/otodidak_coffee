<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->library('form_validation');
	}

	public function index($login = 'login')
	{
		if (!file_exists(APPPATH . 'views/auth/' . $login . '.php')) {
			show_404();
		} else {
			if ($this->session->userdata('username')) {
				redirect('forbidden/badrequest');
			}
			$this->form_validation->set_rules('username', 'Username', 'required|trim');
			$this->form_validation->set_rules('password', 'Password', 'required|trim');
			if ($this->form_validation->run() == false) {
				$data['title'] = 'Login';
				$this->load->view('templates/header', $data);
				$this->load->view('auth/' . $login);
				$this->load->view('templates/footer');
			} else {
				$this->_alurlogin();
			}
		}
	}


	private function _alurlogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$user = $this->db->get_where('user', ['username' => $username])->row_array();

		// user available
		if ($user) {

			// user active
			if ($user['aktif'] == 1) {

				// check password 
				if ($user['password'] == $password) {

					$data = [
						'username' => $user['username'],
						'role' => $user['role']
					];

					$this->session->set_userdata($data);

					if ($user['role'] == 1) {
						$this->session->set_flashdata('message', ' <div class="alert alert-success alert-rounded"> <i class="ti-user"></i> Anda berhasil login sebagai Admin.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>');
						redirect('admin');
					} elseif ($user['role'] == 2) {
						$this->session->set_flashdata('message', ' <div class="alert alert-success alert-rounded"> <i class="ti-user"></i> Anda berhasil login sebagai Kasir.
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
					</div>');
						redirect('kasir');
					}
				} else {
					$this->session->set_flashdata('message', '  <div class="alert alert-danger alert-rounded"> <i class="mdi mdi-account-remove"></i> Password anda salah.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>');
					redirect('login');
				}
			} else {
				$this->session->set_flashdata('message', '  <div class="alert alert-danger alert-rounded"> <i class="mdi mdi-account-remove"></i> Akun anda tidak aktif.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>');
				redirect('login');
			}
		} else {
			$this->session->set_flashdata('message', '  <div class="alert alert-danger alert-rounded"> <i class="mdi mdi-account-remove"></i> Akun anda tidak terdaftar.
					<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
				</div>');
			redirect('login');
		}
	}

	public function alurlogout()
	{
		$this->session->unset_userdata('email');
		$this->session->unset_userdata('username');
		$this->session->unset_userdata('password');
		$this->session->unset_userdata('nama');
		$this->session->set_flashdata('message', ' <div class="alert alert-success alert-rounded"> <i class="ti-user"></i> Anda berhasil logout.
		<button type="button" class="close" data-dismiss="alert" aria-label="Close"> <span aria-hidden="true">&times;</span> </button>
	</div>');
		redirect('login');
	}
}
