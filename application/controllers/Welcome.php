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

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Welcome_m');
	}
	public function index()
	{
		$data['soal1'] = array('Volvo', 'BMW', 'Toyota', 'Kijang');
		$data['soal4'] = array(
			'Bimo Nasuti' => 
				array(
					'mob' => '628191910',
					'email' => 'bimonasuti@gmail.com',
					'hp' => '0827161718',
				), 
			'BomBomi' => 
				array(
					'mob' => '1237681891',
					'email' => 'bombomi@gmail.com',
				), 
			'Yuni Salam' => 
				array(
					'mob' => '51237181',
					'email' => 'yunisalam@gmail.com',
					'hp' => '0812361718',
				), 
		);
		$this->load->view('welcome_message', $data);
	}

	public function getBuku()
	{
		$buku = $this->Welcome_m->getBuku();
		echo json_encode($buku);
	}

	public function getBukuFilterPrice()
	{
		$buku = $this->Welcome_m->getBukuFilterPrice();
		echo json_encode($buku);
	}

	public function getBukuFilterNotRent()
	{
		$buku = $this->Welcome_m->getBukuFilterNotRent();
		echo json_encode($buku);
	}

	public function getBukuSelect2()
	{
		$buku = $this->Welcome_m->getBuku();
		$result = [];
		if (empty($this->input->get('term'))) {
			for ($i=0; $i < count($buku['data']); $i++) {
				$result['results'][$i]['id'] = $buku['data'][$i]['Book_id'];
				$result['results'][$i]['text'] = $buku['data'][$i]['Title'];
			}
		}else{
			for ($i=0; $i < count($buku['data']); $i++) {
		       if (strpos($buku['data'][$i]['Title'], $this->input->get('q')) !== false) {
					$result['results'][0]['id'] = $buku['data'][$i]['Book_id'];
					$result['results'][0]['text'] = $buku['data'][$i]['Title'];
		       }
			}
		}
		echo json_encode($result);
	}

	public function insertBuku()
	{
		echo $this->Welcome_m->insertBuku($this->input->post());
	}

	public function getCustomer()
	{
		$customer = $this->Welcome_m->getCustomer();
		echo json_encode($customer);
	}

	public function getCustomerSelect2()
	{
		$customer = $this->Welcome_m->getCustomer();
		$result = [];
		if (empty($this->input->get('term'))) {
			for ($i=0; $i < count($customer['data']); $i++) {
				$result['results'][$i]['id'] = $customer['data'][$i]['Customer_id'];
				$result['results'][$i]['text'] = $customer['data'][$i]['Name'];
			}
		}else{
			for ($i=0; $i < count($customer['data']); $i++) {
		       if (strpos($customer['data'][$i]['Name'], $this->input->get('q')) !== false) {
					$result['results'][0]['id'] = $customer['data'][$i]['Customer_id'];
					$result['results'][0]['text'] = $customer['data'][$i]['Name'];
		       }
			}
		}
		echo json_encode($result);
	}

	public function insertCustomer()
	{
		echo $this->Welcome_m->insertCustomer($this->input->post());
	}

	public function getRent()
	{
		$rent = $this->Welcome_m->getRent();
		echo json_encode($rent);
	}

	public function insertRent()
	{
		echo $this->Welcome_m->insertRent($this->input->post());
	}
}
