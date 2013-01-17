<?php
class Sunday_Money extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['sunday'] = Sunday::getAll();
        $data['title'] = "Tithes and Offerings";
        $data['content_view'] = "sundays_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['title'] = "Tithes and Offerings";
        $data['quick_link'] = "new_tithe";
        $data['content_view'] = "add_titheoffering_v";
        $this -> base_params($data);
    }

    public function save() {
        $youthservice = $this -> input -> post("youthservice");
        $teens = $this -> input -> post("teens");
        $sunday_school = $this -> input -> post("sunday_school");
        $english_service = $this -> input -> post("english_service");
        $swahili_service = $this -> input -> post("swahili_service");
        $monthly_pledge = $this -> input -> post("monthly_pledge");
        $thanksgiving = $this -> input -> post("thanksgiving");
        $tithe = $this -> input -> post("tithe");
        $date = date('Y-m-d');
        
        $sunday = new Sunday();

        $sunday -> Youth_Service = $youthservice;
        $sunday -> Teens = $teens;
        $sunday -> Sunday_School = $sunday_school;
        $sunday -> English_Service = $english_service;
        $sunday -> Swahili_Service = $swahili_service;
        $sunday -> Monthly_Pledge = $monthly_pledge;
        $sunday -> Thanksgiving = $thanksgiving;
        $sunday -> Tithe = $tithe;
        $sunday -> Date = $date;

        $sunday -> save();
        redirect("sunday_money/listing");

    }//end save

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from assets where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("asset_management/listing", "refresh");
    }//end save


    public function view_sunday($id) {        
        $sunday = Sunday::getSunday($id);
        $data['sunday'] = $sunday[0];
        $data['title'] = "Tithes and Offerings";
        $data['content_view'] = "sunday_management_v";
        $data['quick_link'] = "";
        $this -> base_params($data);
    }


    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
