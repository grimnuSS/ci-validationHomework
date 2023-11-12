<?php
    class FormApp_Model extends CI_Model {
        public function __construct(){
            parent::__construct();
        }
        
        /* Tabloya Veri Ekleyen Fonksiyon */
        public function save($data = array()){
            return $this->db->insert("forms", $data);
        }

        /* Tablodaki Verileri Çeken Fonksiyon */
        public function getAll($order= "id ASC"){
            return $this->db->order_by($order)->get("forms")->result_array();
        }
    }
?>