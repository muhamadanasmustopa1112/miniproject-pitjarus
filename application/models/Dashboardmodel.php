<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboardmodel extends CI_Model
{
    public function selectArea()
    {
        return $this->db->get('store_area')->result();

    }

    public function reportWhereAreaId($id)
    {
        return $this->db->query("SELECT 
        COUNT(*) AS total_rows,
            SUM(compliance) AS sum_compliance,
            store_name
        FROM 
            report_product INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store_area.area_id = store.area_id WHERE store_area.area_id = '$id' ")->result();
    }
    public function report()
    {
        return $this->db->query("SELECT 
        COUNT(*) AS total_rows,
            SUM(compliance) AS sum_compliance,
            store_name
        FROM 
            report_product INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store_area.area_id = store.area_id")->result();
    }

    public function brand()
    {
        return $this->db->query("SELECT brand_name FROM product_brand")->result();
    }

    public function sumBrandDKI()
    {
        return $this->db->query("SELECT SUM(compliance) AS sum_compliance FROM product_brand INNER JOIN product ON product_brand.brand_id = product.brand_id INNER JOIN report_product ON product.product_id = report_product.product_id INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store.area_id = store_area.area_id  WHERE store_area.area_id = 1")->row_array();
    }
    public function sumBrandJawaBarat()
    {
        return $this->db->query("SELECT SUM(compliance) AS sum_compliance FROM product_brand INNER JOIN product ON product_brand.brand_id = product.brand_id INNER JOIN report_product ON product.product_id = report_product.product_id INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store.area_id = store_area.area_id  WHERE store_area.area_id = 2")->row_array();
    }
    public function sumBrandKalimantan()
    {
        return $this->db->query("SELECT SUM(compliance) AS sum_compliance FROM product_brand INNER JOIN product ON product_brand.brand_id = product.brand_id INNER JOIN report_product ON product.product_id = report_product.product_id INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store.area_id = store_area.area_id  WHERE store_area.area_id = 3")->row_array();
    }
    public function sumBrandJawaTengah()
    {
        return $this->db->query("SELECT SUM(compliance) AS sum_compliance FROM product_brand INNER JOIN product ON product_brand.brand_id = product.brand_id INNER JOIN report_product ON product.product_id = report_product.product_id INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store.area_id = store_area.area_id  WHERE store_area.area_id = 4")->row_array();
    }
    public function sumBrandBali()
    {
        return $this->db->query("SELECT SUM(compliance) AS sum_compliance FROM product_brand INNER JOIN product ON product_brand.brand_id = product.brand_id INNER JOIN report_product ON product.product_id = report_product.product_id INNER JOIN store ON report_product.store_id = store.store_id INNER JOIN store_area ON store.area_id = store_area.area_id  WHERE store_area.area_id = 5")->row_array();
    }


}