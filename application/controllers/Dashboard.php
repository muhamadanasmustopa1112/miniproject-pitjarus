<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    public function __construct()
	{
		parent::__construct();
        $this->load->model('dashboardmodel');
    }
	public function index()
	{
        
        $data['data'] = $this->dashboardmodel->report();
        $data['area'] = $this->dashboardmodel->selectArea();
        $data['brand'] = $this->dashboardmodel->brand();
        $data['brandDKI'] = $this->dashboardmodel->sumBrandDKI();
        $data['brandJawaBarat'] = $this->dashboardmodel->sumBrandJawaBarat();
        $data['brandKalimantan'] = $this->dashboardmodel->sumBrandKalimantan();
        $data['brandJawaTengah'] = $this->dashboardmodel->sumBrandJawaTengah();
        $data['brandBali'] = $this->dashboardmodel->sumBrandBali();
        $this->load->view('dashboard', $data);

    }
    public function report()
    {
        $area = $this->input->post('area');
        $dateFrom = $this->input->post('dateFrom');
        $dateTo = $this->input->post('dateTo');
        $data['area'] = $this->dashboardmodel->selectArea();
        $data['brand'] = $this->dashboardmodel->brand();
        $data['data'] = $this->dashboardmodel->reportWhereAreaId($area);
        $data['brandDKI'] = $this->dashboardmodel->sumBrandDKI();
        $data['brandJawaBarat'] = $this->dashboardmodel->sumBrandJawaBarat();
        $data['brandKalimantan'] = $this->dashboardmodel->sumBrandKalimantan();
        $data['brandJawaTengah'] = $this->dashboardmodel->sumBrandJawaTengah();
        $data['brandBali'] = $this->dashboardmodel->sumBrandBali();
        
        $this->load->view('dashboard', $data);
      

    }

}