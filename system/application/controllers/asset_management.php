<?php
class Asset_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        $data['assets'] = Assets::getAll();
        $data['title'] = "Asset Management::All Assets";
        $data['content_view'] = "assets_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['assetes'] = Asset_Types::getAll();
        $data['title'] = "Asset Management::Add New Asset";
        $data['quick_link'] = "new_asset";
        $data['content_view'] = "asset_registration";
        $this -> base_params($data);
    }

    public function save() {
        $asset_id = $this -> input -> post("asset_id");
        $asset_name = $this -> input -> post("asset_name");
        $asset_type = $this -> input -> post("asset_type");
        $model = $this -> input -> post("model");
        $number_of_assets = $this -> input -> post("number_of_assets");
        $serial_number = $this -> input -> post("serial_number");
        $location = $this -> input -> post("location");
        $value = $this -> input -> post("value");
        $date_purchased = $this -> input -> post("date_purchased");
        $description = $this -> input -> post("description");

        if (strlen($asset_id) > 0) {
            $asset = Assets::getAsset($asset_id);
            $asset = $asset[0];

        } else {
            $asset = new Assets();
        }

        $valid = $this -> _validate_submission();
        if ($valid == false) {
            $this -> listing();
        } else {
            $asset -> Name = $asset_name;
            $asset -> Type = $asset_type;
            $asset -> Model = $model;
            $asset -> Number_of_Assets = $number_of_assets;
            $asset -> Serial_Number = $serial_number;
            $asset -> Location = $location;
            $asset -> Value = $value;
            $asset -> Date_Purchased = $date_purchased;
            $asset -> Description = $description;

            $asset -> save();
            redirect("asset_management/listing");
        }//end else
    }//end save

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from assets where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("asset_management/listing", "refresh");
    }//end save

    public function edit_asset($id) {
        $data['assetes'] = Asset_Types::getAll();
        $asset = Assets::getAsset($id);
        $data['asset'] = $asset[0];
        $data['title'] = "Asset Management";
        $data['content_view'] = "asset_registration";
        $data['quick_link'] = "new_asset";
        $this -> base_params($data);
    }

    public function manage_asset($id) {
        $data['assetes'] = Asset_Types::getAll();
        $asset = Assets::getAsset($id);
        $data['asset'] = $asset[0];
        $data['title'] = "Asset Management";
        $data['content_view'] = "asset_management_v";
        $data['quick_link'] = "manage_asset";
        $this -> base_params($data);
    }

    private function _validate_submission() {
        $this -> form_validation -> set_rules('asset_name', 'Asset Name', 'trim|required|min_length[1]');
        return $this -> form_validation -> run();
    }//end validate_submission

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
