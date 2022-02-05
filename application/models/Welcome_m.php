<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome_m extends CI_Model {

	public function getBuku()
	{
		$buku = [];
		$buku['data'] = $this->db->get('buku', $this->input->post('length'), $this->input->post('start'))->result_array();
		$count = $this->db->count_all('buku');
		$buku['draw'] = $this->input->post('draw');
		$buku['recordsTotal'] = $count;
		$buku['recordsFiltered'] = $count;
		return $buku;
	}

	public function getBukuFilterPrice()
	{
		$buku = [];
		$this->db->where('Price_rent >= 2000 AND Price_rent <=6000');
		$buku['data'] = $this->db->get('buku', $this->input->post('length'), $this->input->post('start'))->result_array();
		$count = $this->db->count_all('buku');
		$buku['draw'] = $this->input->post('draw');
		$buku['recordsTotal'] = $count;
		$buku['recordsFiltered'] = $count;
		return $buku;
	}

	public function getBukuFilterNotRent()
	{
		$buku = [];
		$buku['data'] = $this->db->query('SELECT * FROM `buku` WHERE `Book_id` NOT IN (SELECT `Book_id` FROM `rent`)')->result_array();
		$count = $this->db->count_all('buku');
		$buku['draw'] = $this->input->post('draw');
		$buku['recordsTotal'] = $count;
		$buku['recordsFiltered'] = $count;
		return $buku;
	}

	public function insertBuku($data)
	{
		$buku = array(
			'Title' => $data['title'],
			'Author' => $data['author'],
			'Price_rent' => $data['price_rent'],
			'Book_Category' => $data['book_category']
		);
		echo $this->db->insert('buku', $buku);
	}

	public function getCustomer()
	{
		$customer = [];
		$customer['data'] = $this->db->get('customer', $this->input->post('length'), $this->input->post('start'))->result_array();
		$count = $this->db->count_all('customer');
		$customer['draw'] = $this->input->post('draw');
		$customer['recordsTotal'] = $count;
		$customer['recordsFiltered'] = $count;
		return $customer;
	}

	public function insertCustomer($data)
	{
		$customer = array(
			'Name' => $data['name'],
			'Identity_card_number' => $data['identity'],
			'Address' => $data['address']
		);
		echo $this->db->insert('customer', $customer);
	}

	public function getRent()
	{
		$rent = [];
		$rent['data'] = $this->db->query('SELECT r.Rent_id as rent_id, c.Name as customer, b.Title as title, count(r.Book_id) as count_book, (SELECT count(r2.Rent_id) FROM rent as r2 WHERE r2.Customer_id = r.Customer_id) as count_rent FROM rent as r, buku as b, customer as c WHERE r.Book_id = b.Book_id AND r.Customer_id = c.Customer_id GROUP BY r.Book_id, r.Customer_id')->result_array();
		$count = $this->db->count_all('rent');
		$rent['draw'] = $this->input->post('draw');
		$rent['recordsTotal'] = $count;
		$rent['recordsFiltered'] = $count;
		return $rent;
	}

	public function getRentFilter()
	{
		$rent = [];
		$rent['data'] = $this->db->query('SELECT r.Rent_id as rent_id, c.Name as customer, b.Title as title, count(r.Book_id) as count_book, (SELECT count(r2.Rent_id) FROM rent as r2 WHERE r2.Customer_id = r.Customer_id) as count_rent FROM rent as r, buku as b, customer as c WHERE r.Book_id = b.Book_id AND (SELECT count(r2.Rent_id) FROM rent as r2 WHERE r2.Customer_id = r.Customer_id) >= 10 AND r.Customer_id = c.Customer_id GROUP BY r.Book_id, r.Customer_id')->result_array();
		$count = $this->db->count_all('rent');
		$rent['draw'] = $this->input->post('draw');
		$rent['recordsTotal'] = $count;
		$rent['recordsFiltered'] = $count;
		return $rent;
	}

	public function insertRent($data)
	{
		$rent = array(
			'Book_id' => $data['idbuku'],
			'Customer_id' => $data['idcustomer'],
			'Date_Rent' => $data['daterent'],
			'Date_Return' => $data['datereturn']
		);
		echo $this->db->insert('rent', $rent);
	}

}

/* End of file Welcome_m.php */
/* Location: ./application/models/Welcome_m.php */