<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('Master_model', '', TRUE);
	}

	function cek_login()
    {
        if(empty($this->session->userdata('login')))
        {
			redirect(base_url('auth'));
		}
    }

	function dashboard()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'dashboard';
		$foot['js'] = 'dashboard';

		$data['obat'] = $this->db->query('SELECT * from ms_obat')->num_rows();
		$data['supplier'] = $this->db->query('SELECT * from ms_supplier')->num_rows();
		$data['pembelian'] = $this->db->query('SELECT sum(qty) as total from tb_pembelian')->row();
		$data['penjualan'] = $this->db->query('SELECT sum(qty) as total from tb_penjualan')->row();

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/dashboard', $data);
		$this->load->view('template/footer',$foot);
	}

	function data_obat()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'obat';
		$foot['js'] = 'data_obat';

		$data['alert'] = $this->session->flashdata('alert');
		$data['data'] = $this->Master_model->view_by_id('ms_obat', [], 'result');

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/data_obat', $data);
		$this->load->view('template/footer', $foot);
	}

	function form_obat()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'obat';
		$foot['js'] = 'data_obat';

		$id = $this->input->get('id');
		$data['data'] = $this->Master_model->view_by_id('ms_obat', ['id'=>$id], 'row');

		$data['alert'] = $this->session->flashdata('alert');

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/form_obat', $data);
		$this->load->view('template/footer', $foot);
	}

	function simpan_obat()
	{
		$id = $this->input->post('id');
		$kode = $this->input->post('kode');
		$nama = $this->input->post('nama');
		$satuan = $this->input->post('satuan');
		$beli = $this->input->post('beli');
		$jual = $this->input->post('jual');

		$data = array(
			'kode' => $kode,
			'nama' => $nama,
			'satuan' => $satuan,
			'harga_beli' => $beli,
			'harga_jual' => $jual,
			);

		if(!empty($id))
	    {
	    	$save = $this->Master_model->process_data('ms_obat', $data, ['id' => $id]);
	    }else{
	    	$save = $this->Master_model->process_data('ms_obat', $data);
	    }

	    if($save){
	    	$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			              <strong>Sukses!</strong> Data berhasil tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
	    	redirect(base_url('admin/data_obat'), 'refresh');
	    }else{
	    	$alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			              <strong>Error!</strong> Data gagal tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
  			redirect(base_url('admin/form_obat'));
	    }
	}

	function hapus_obat()
	{
		$id = $this->input->get('id');
		$hapus = $this->db->delete('ms_obat', array('id' => $id)); 

		$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Sukses!</strong> Data berhasil dihapus.
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>';
		$this->session->set_flashdata('alert', $alert);
    	redirect(base_url('admin/data_obat'), 'refresh');
	}

	function data_supplier()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'supplier';
		$foot['js'] = 'data_supplier';

		$data['alert'] = $this->session->flashdata('alert');
		$data['data'] = $this->Master_model->view_by_id('ms_supplier', [], 'result');

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/data_supplier', $data);
		$this->load->view('template/footer', $foot);
	}


	function form_supplier()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'supplier';
		$foot['js'] = 'data_supplier';

		$id = $this->input->get('id');
		$data['data'] = $this->Master_model->view_by_id('ms_supplier', ['id'=>$id], 'row');

		$data['alert'] = $this->session->flashdata('alert');

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/form_supplier', $data);
		$this->load->view('template/footer', $foot);
	}

	function simpan_supplier()
	{
		$id = $this->input->post('id');
		$alamat = $this->input->post('alamat');
		$nama = $this->input->post('nama');

		$data = array(
			'nama' => $nama,
			'alamat' => $alamat,
			);

		if(!empty($id))
	    {
	    	$save = $this->Master_model->process_data('ms_supplier', $data, ['id' => $id]);
	    }else{
	    	$save = $this->Master_model->process_data('ms_supplier', $data);
	    }

	    if($save){
	    	$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			              <strong>Sukses!</strong> Data berhasil tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
	    	redirect(base_url('admin/data_supplier'), 'refresh');
	    }else{
	    	$alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			              <strong>Error!</strong> Data gagal tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
  			redirect(base_url('admin/form_supplier'));
	    }
	}

	function hapus_supplier()
	{
		$id = $this->input->get('id');
		$hapus = $this->db->delete('ms_supplier', array('id' => $id)); 

		$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Sukses!</strong> Data berhasil dihapus.
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>';
		$this->session->set_flashdata('alert', $alert);
    	redirect(base_url('admin/data_supplier'), 'refresh');
	}

	function transaksi_pembelian()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'pembelian';
		$foot['js'] = 'transaksi_pembelian';

		$data['alert'] = $this->session->flashdata('alert');
		$data['data'] = $this->Master_model->get_pembelian()->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/transaksi_pembelian', $data);
		$this->load->view('template/footer', $foot);
	}

	function form_pembelian()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'pembelian';
		$foot['js'] = 'transaksi_pembelian';

		$id = $this->input->get('id');
		if(!empty($id)){
			$data['data'] = $this->Master_model->get_pembelian($id)->row();
		}
		
		$data['obat'] = $this->Master_model->view_by_id('ms_obat', [], 'result');
		$data['supplier'] = $this->Master_model->view_by_id('ms_supplier', [], 'result');

		$data['alert'] = $this->session->flashdata('alert');

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/form_pembelian', $data);
		$this->load->view('template/footer', $foot);
	}

	function simpan_pembelian()
	{
		$id = $this->input->post('id');
		$obat = $this->input->post('obat');
		$supplier = $this->input->post('supplier');
		$qty = $this->input->post('qty');
		$tanggal = $this->input->post('tanggal');

		$get_obat = $this->Master_model->view_by_id('ms_obat', ['id'=>$obat], 'row');
		$harga = $get_obat->harga_beli;
		$total = (int)$qty * $harga;

		$data = array(
			'id_obat' => $obat,
			'id_supplier' => $supplier,
			'qty' => $qty,
			'total' => $total,
			'tanggal' => $tanggal,
		);

		if(!empty($id))
	    {
	    	$save = $this->Master_model->process_data('tb_pembelian', $data, ['id' => $id]);
	    }else{
	    	$save = $this->Master_model->process_data('tb_pembelian', $data);
	    }

	    if($save){
	    	$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			              <strong>Sukses!</strong> Data berhasil tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
	    	redirect(base_url('admin/transaksi_pembelian'), 'refresh');
	    }else{
	    	$alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			              <strong>Error!</strong> Data gagal tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
  			redirect(base_url('admin/form_pembelian'));
	    }
	}

	function hapus_pembelian()
	{
		$id = $this->input->get('id');
		$hapus = $this->db->delete('tb_pembelian', array('id' => $id)); 

		$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Sukses!</strong> Data berhasil dihapus.
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>';
		$this->session->set_flashdata('alert', $alert);
    	redirect(base_url('admin/transaksi_pembelian'), 'refresh');
	}

	function transaksi_penjualan()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'penjualan';
		$foot['js'] = 'transaksi_penjualan';

		$data['alert'] = $this->session->flashdata('alert');
		$data['data'] = $this->Master_model->get_penjualan()->result();

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/transaksi_penjualan', $data);
		$this->load->view('template/footer', $foot);
	}

	function form_penjualan()
	{
		$this->cek_login();
		$sidebar['sidebar'] = 'penjualan';
		$foot['js'] = 'transaksi_penjualan';

		$id = $this->input->get('id');
		if(!empty($id)){
			$data['data'] = $this->Master_model->get_penjualan($id)->row();
		}
		$data['obat'] = $this->Master_model->view_by_id('ms_obat', [], 'result');
		$data['supplier'] = $this->Master_model->view_by_id('ms_supplier', [], 'result');

		$data['alert'] = $this->session->flashdata('alert');

		$this->load->view('template/header');
		$this->load->view('template/sidebar', $sidebar);
		$this->load->view('admin/form_penjualan', $data);
		$this->load->view('template/footer', $foot);
	}

	function simpan_penjualan()
	{
		$id = $this->input->post('id');
		$obat = $this->input->post('obat');
		$qty = $this->input->post('qty');
		$tanggal = $this->input->post('tanggal');

		$get_obat = $this->Master_model->view_by_id('ms_obat', ['id'=>$obat], 'row');
		$harga = $get_obat->harga_jual;
		$total = (int)$qty * $harga;

		$data = array(
			'id_obat' => $obat,
			'qty' => $qty,
			'total' => $total,
			'tanggal' => $tanggal,
		);

		if(!empty($id))
	    {
	    	$save = $this->Master_model->process_data('tb_penjualan', $data, ['id' => $id]);
	    }else{
	    	$data['invoice'] = 'INV'.date('Ymd').rand(10,1000);
	    	$save = $this->Master_model->process_data('tb_penjualan', $data);
	    }

	    if($save){
	    	$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
			              <strong>Sukses!</strong> Data berhasil tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
	    	redirect(base_url('admin/transaksi_penjualan'), 'refresh');
	    }else{
	    	$alert = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
			              <strong>Error!</strong> Data gagal tersimpan.
			              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
			                <span aria-hidden="true">&times;</span>
			              </button>
			            </div>';
  			$this->session->set_flashdata('alert', $alert);
  			redirect(base_url('admin/form_penjualan'));
	    }
	}

	function hapus_penjualan()
	{
		$id = $this->input->get('id');
		$hapus = $this->db->delete('tb_penjualan', array('id' => $id)); 

		$alert = '<div class="alert alert-success alert-dismissible fade show" role="alert">
		              <strong>Sukses!</strong> Data berhasil dihapus.
		              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
		                <span aria-hidden="true">&times;</span>
		              </button>
		            </div>';
		$this->session->set_flashdata('alert', $alert);
    	redirect(base_url('admin/transaksi_penjualan'), 'refresh');
	}
}