<?php 
class FormApp extends CI_CONTROLLER{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $this->load->view("formApp_view");
    }

    public function save(){
        /* Form Validation */
        $this->load->library("form_validation");
        
        /* Form Validation Kuralları */
        $this->form_validation->set_rules("ad", "İsim", "required|trim");
        $this->form_validation->set_rules("soyad", "Soyisim", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email");
        $this->form_validation->set_rules("sifre", "Password", "required|trim|min_length[8]");
        $this->form_validation->set_rules("sifreOnay", "Password Confirmation", "required|trim|matches[sifre]");

        /* Mesaj Şablonu */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field} Alanı Doldurulmalıdır.</b>"
            )
        );

        /* Form Validation Çalıştırma */
        $validate = $this->form_validation->run();
        if($validate){
            $data = array(
                "name" => $this->input->post("ad"),
                "surname" => $this->input->post("soyad"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("sifre")
            );
            $this->load->model("FormApp_Model");
            $this->FormApp_Model->save($data);
            
            echo "Validasyon Başarılı";

            
        }else{
            echo "Validasyon Başarısız";

            $viewData = new stdClass();
            $viewData->form_error = true;
            $this->load->view("formApp_view", $viewData);

        }
    }

}
?>