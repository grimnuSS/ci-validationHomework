<?php

class FormApp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("FormApp_Model");
    }

    public function index()
    {
        $this->load->view("formApp_view");
    }

    public function save()
    {
        /* Form Validation */
        $this->load->library("form_validation");

        /* Form Validation Kuralları */
        $this->form_validation->set_rules("ad", "İsim", "required|trim");
        $this->form_validation->set_rules("soyad", "Soyisim", "required|trim");
        $this->form_validation->set_rules("email", "E-Posta", "required|trim|valid_email|is_unique[forms.email]");
        $this->form_validation->set_rules("sifre", "Şifre", "required|trim|min_length[8]");
        $this->form_validation->set_rules("sifreOnay", "Şifre Tekrarı", "required|trim|matches[sifre]");

        /* Mesaj Şablonu */
        $this->form_validation->set_message(
            array(
                "required" => "<b>{field} Alanı Doldurulmalıdır.</b>",
                "min_length" => "<b>{field} Alanı Minimum 3 Karakter Olmalıdır.</b>",
                "max_length" => "<b>{field} Alanı Maksimum 8 Karakter Olmalıdır.</b>",
                "matches" => "<b>{field} Alanı {param} Alanı İle Eşleşmiyor.</b>",
                "valid_email" => "<b>{field} Alanı İçin Geçerli Bir E-Posta Adresi Giriniz.</b>",
                "is_unique" => "<b>E-Posta Zaten Kayıtlı.</b>"
            )
        );

        /* Form Validation Çalıştırma */
        $validate = $this->form_validation->run();
        if ($validate) {
            $data = array(
                "name" => $this->input->post("ad"),
                "surname" => $this->input->post("soyad"),
                "email" => $this->input->post("email"),
                "password" => $this->input->post("sifre")
            );

            //Verinin gönderilmesi için modelin çağırılması
            $insert = $this->FormApp_Model->save($data);

            //Kayıt durumu kontrolü
            if ($insert) {
                // Tüm kayıtları çekmek için
                $liste = $this->FormApp_Model->getAll();
    
                // View'e verileri taşıyarak yönlendirme
                $this->load->view("formAppList_view", array('liste' => $liste));
            } else {
                echo "Kayıt Başarısız";
            }

        } else {
            echo "Validasyon Başarısız";
            $viewData = new stdClass();
            $viewData->form_error = true;
            $this->load->view("formApp_view", $viewData);
        }
    }
}
?>
