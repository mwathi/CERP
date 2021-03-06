<?php
class Flock_Management extends Controller {
    function __construct() {
        parent::__construct();
        $this -> load -> library("pagination");

    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    //all adults, not parents
    public function allParentsListing($offset = 0) {
        $items_per_page = 20;
        $number_of_parents = Flock::getTotalNumberAdults();
        $parents = Flock::getPagedAdults($offset, $items_per_page);
        if ($number_of_parents > $items_per_page) {
            $config['base_url'] = base_url() . "flock_management/allParentsListing/";
            $config['total_rows'] = $number_of_parents;
            $config['per_page'] = $items_per_page;
            $config['uri_segment'] = 3;
            $config['num_links'] = 5;
            $this -> pagination -> initialize($config);
            $data['pagination'] = $this -> pagination -> create_links();
        }
        $data['parents'] = $parents;
        $data['title'] = "Flock Management::All Parents";
        $data['content_view'] = "parents_v";
        $this -> base_params($data);
    }//end listing

    public function allYouthListing($offset = 0) {
        $items_per_page = 20;
        $number_of_youth = Flock::getTotalNumberYouth();
        $youth = Flock::getPagedYouth($offset, $items_per_page);
        if ($number_of_youth > $items_per_page) {
            $config['base_url'] = base_url() . "flock_management/allYouthListing/";
            $config['total_rows'] = $number_of_youth;
            $config['per_page'] = $items_per_page;
            $config['uri_segment'] = 3;
            $config['num_links'] = 5;
            $this -> pagination -> initialize($config);
            $data['pagination'] = $this -> pagination -> create_links();
        }
        $data['youth'] = $youth;
        $data['title'] = "Flock Management::All Youth";
        $data['content_view'] = "youth_v";
        $this -> base_params($data);
    }//end listing

    public function allChildrenListing($offset = 0) {
        $items_per_page = 20;
        $number_of_children = Flock::getTotalNumberChildren();
        $children = Flock::getPagedChildren($offset, $items_per_page);
        if ($number_of_children > $items_per_page) {
            $config['base_url'] = base_url() . "flock_management/allChildrenListing/";
            $config['total_rows'] = $number_of_children;
            $config['per_page'] = $items_per_page;
            $config['uri_segment'] = 3;
            $config['num_links'] = 5;
            $this -> pagination -> initialize($config);
            $data['pagination'] = $this -> pagination -> create_links();
        }
        $data['children'] = $children;
        $data['title'] = "Flock Management::All Children";
        $data['content_view'] = "children_v";
        $this -> base_params($data);
    }//end listing

    public function listing($orderitem = '') {
        $orderitem = 'First_Name';
        $data['parentmembers'] = Flock::getLatestParents($orderitem);
        $data['youthmembers'] = Flock::getLatestYouth();
        $data['childrenmembers'] = Flock::getLatestChildren();
        $data['username'] = $this -> session -> userdata('names');
        $data['title'] = "Flock Management::All Flock";
        $data['content_view'] = "flock_v";
        $this -> base_params($data);
    }//end listing

    public function searchMember($name) {
        if ($this -> input -> post('search')) {
            redirect('/flock_management/searchMember/' . $this -> input -> post('search'));
        }
        $memberinfo = Flock::getMemberInformation($name);
        $data['content_view'] = "find_member_v";
        $data['memberinfo'] = $memberinfo;
        $data['title'] = "Church ERP Search Results";
        $this -> load -> view('template', $data);
    }

    public function professionListing() {
        error_reporting(E_ALL ^ E_NOTICE);
        $profession = $_POST['profession'];
        //$data['totalmembers'] = Flock::getTotalMembers();
        $data['professions'] = Flock::getProfessions($profession);
        $data['allprofessions'] = Flock::getAllProfessions();
        $data['title'] = "Flock Management::Professions";
        $data['content_view'] = "profession_v";
        $this -> base_params($data);
    }//end listing

    public function genderListing() {
        error_reporting(E_ALL ^ E_NOTICE);
        $gender = $_POST['member_gender'];
        $data['members'] = Flock::getAll();
        //$data['totalmembers'] = Flock::getTotalMembers();
        $data['genders'] = Flock::getGenders($gender);
        $data['allgenders'] = Flock::getAllGenders();
        $data['title'] = "Flock Management::Genders";
        $data['content_view'] = "gender_v";
        $this -> base_params($data);
    }//end listing

    public function groupListing() {
        error_reporting(E_ALL ^ E_NOTICE);
        $group = $_POST['member_group'];
        $data['groups'] = Flock::getGroup($group);
        $data['member_groups'] = Groups::getAll();
        $data['title'] = "Flock Management::Groups";
        $data['content_view'] = "group_v";
        $this -> base_params($data);
    }//end listing

    public function statusListing() {
        error_reporting(E_ALL ^ E_NOTICE);
        $status = $_POST['member_status'];
        //$data['totalmembers'] = Flock::getTotalMembers();
        $data['statuses'] = Flock::getStatus($status);
        $data['allstatuses'] = Flock::getAllStatuses();
        $data['title'] = "Flock Management::Marital Statuses";
        $data['content_view'] = "status_v";
        $this -> base_params($data);
    }//end listing

    public function allListing() {
        $data['members'] = Flock::getAll();

        $data['allprofessions'] = Flock::getAllProfessions();
        $data['allgenders'] = Flock::getAllGenders();
        $data['allstatuses'] = Flock::getAllStatuses();

        $data['totalmembers'] = Flock::getTotalMembers();
        $data['title'] = "Flock Management::All Flock";
        $data['content_view'] = "all_flock_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $this -> load -> database();
        $sql = 'Select MAX(Member_Number) as Member_Number From Flock';
        $query = $this -> db -> query($sql);
        $data['maxno'] = $query -> result();

        $data['member_groups'] = Groups::getAll();
        $data['countries'] = Countries::getAll();
        $data['maleparents'] = Flock::getMaleParents();
        $data['femaleparents'] = Flock::getFemaleParents();
        $data['title'] = "Flock Management::Add New Flock";
        $data['quick_link'] = "new_category";
        $data['content_view'] = "add_flock_v";
        $this -> base_params($data);
		}else{
			$this -> load -> view('restricted_v');
		}
    }

    public function save() {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $parentyesno = 0;
        $i = 0;

        $other_member_groups = $this -> input -> post("other_member_groups");
        $member_number = $this -> input -> post("member_number");

        $child_firstname = $this -> input -> post("child_firstname");
        $handler = $this -> input -> post("child_firstname");
        $child_surname = $this -> input -> post("child_surname");
        $child_lastname = $this -> input -> post("child_lastname");

        $nationality = $this -> input -> post("nationality");
        $otherlanguage = $this -> input -> post("otherlanguage");
        $member_id = $this -> input -> post("member_id");
        $first_name = $this -> input -> post("first_name");
        $last_name = $this -> input -> post("last_name");
        $surname = $this -> input -> post("surname");
        $house = $this -> input -> post("house");

        $profession = $this -> input -> post("profession");
        $marital_status = $this -> input -> post("marital_status");
        $disability_status = $this -> input -> post("disability_status");
        $level_of_education = $this -> input -> post("level_of_education");
        $place_of_work = $this -> input -> post("place_of_work");
        $darasa = $this -> input -> post("darasa");
        $school = $this -> input -> post("school");
        $national_id = $this -> input -> post("national_id");
        $passport = $this -> input -> post("passport");
        $country = $this -> input -> post("country");
        $residence = $this -> input -> post("residence");
        $physical_address = $this -> input -> post("physical_address");

        $member_group = $this -> input -> post("member_group");
        $parent_name = $this -> input -> post("parent");
        $member_gender = $this -> input -> post("gender");

        $member_phone_number = $this -> input -> post("member_phone_number");
        $date_of_birth = $this -> input -> post("date_of_birth");
        $spouse = $this -> input -> post("spouse");
        $number_of_children = $this -> input -> post("number_of_children");
        $email = $this -> input -> post("email");

        if ($this -> input -> post("number_of_children") > 0) {
            $parentyesno = 1;
        } else {
            $parentyesno = 0;
        }
        if ($number_of_children > 0) {
            foreach ($child_firstname as $childrens) {
                $member = new Flock();
                $member -> Member_Number = $member_number;
                $member -> Member_Group = $member_group;
                $member -> Gender = $member_gender;
                $member -> Parent = $parentyesno;

                $member -> Nationality = $nationality;
                $member -> Other_Language = $otherlanguage;

                $member -> First_Name = $first_name;
                $member -> Surname = $surname;
                $member -> Last_Name = $last_name;
                $member -> House = $house;

                $member -> Profession = $profession;
                $member -> Marital_Status = $marital_status;
                $member -> Disability_Status = $disability_status;
                $member -> Level_of_education = $level_of_education;
                $member -> Place_of_work = $place_of_work;
                $member -> Darasa = $darasa;
                $member -> School = $school;
                $member -> National_id = $national_id;
                $member -> Passport = $passport;
                $member -> Country = $country;
                $member -> Residence = $residence;
                $member -> Physical_Address = $physical_address;

                $member -> Phone = $member_phone_number;
                $member -> Date_of_Birth = $date_of_birth;
                $member -> Spouse = $spouse;
                $member -> Children = $number_of_children;
                $member -> Email = $email;

                $member -> Child_First_Name = $handler[$i];
                $member -> Child_Surname = $child_surname[$i];
                $member -> Child_Last_Name = $child_lastname[$i];

                $j = 0;
                foreach ($other_member_groups as $r) {
                    $member_groups = new Member_Groups();
                    $member_groups -> Groupings = $r;
                    $member_groups -> Member_Number = $member_number;
                    $member_groups -> save();
                    $j++;
                }
                
                $member -> save();
                $i++;
            }//end for
        } else {
            $member = new Flock();
            $member -> Member_Number = $member_number;
            $member -> Member_Group = $member_group;
            $member -> Gender = $member_gender;
            $member -> Parent = $parentyesno;

            $member -> Nationality = $nationality;
            $member -> Other_Language = $otherlanguage;

            $member -> First_Name = $first_name;
            $member -> Surname = $surname;
            $member -> Last_Name = $last_name;
            $member -> House = $house;

            $member -> Profession = $profession;
            $member -> Marital_Status = $marital_status;
            $member -> Disability_Status = $disability_status;
            $member -> Level_of_education = $level_of_education;
            $member -> Place_of_work = $place_of_work;
            $member -> Darasa = $darasa;
            $member -> School = $school;
            $member -> National_id = $national_id;
            $member -> Passport = $passport;
            $member -> Country = $country;
            $member -> Residence = $residence;
            $member -> Physical_Address = $physical_address;

            $member -> Phone = $member_phone_number;
            $member -> Date_of_Birth = $date_of_birth;
            $member -> Spouse = $spouse;

            $member -> Email = $email;
            $member -> save();

            $j = 0;
            foreach ($other_member_groups as $r) {
                $member_groups = new Member_Groups();
                $member_groups -> Groupings = $r;
                $member_groups -> Member_Number = $member_number;
                $member_groups -> save();
                $j++;
            }
        }

        redirect("flock_management/listing");
		}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function delete($id) {
        if($this -> session -> userdata('username') == 'dmwathi'){	
        $this -> load -> database();
        $sql = 'delete from flock where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("flock_management/listing", "refresh");
		}else{
			$this -> load -> view('restricted_v');
		}
    }//end save

    public function order($orderitem) {
        //$orderitem = 'First_Name';
        $data['parentmembers'] = Flock::getLatestParents($orderitem);
        $data['youthmembers'] = Flock::getLatestYouth();
        $data['childrenmembers'] = Flock::getLatestChildren();
        $data['title'] = "Flock Management::All Flock";
        $data['content_view'] = "flock_v";
        $this -> base_params($data);
    }//end save

    public function edit_member($id) {
    	if($this -> session -> userdata('username') == 'dmwathi'){
        $member = Flock::getMember($id);
        $data['parents'] = Flock::getParents();
        $data['member_groups'] = Groups::getAll();
        $data['member'] = $member[0];
        $data['title'] = "Flock Management";
        $data['content_view'] = "add_flock_v";
        $data['quick_link'] = "new_flock";
        $this -> base_params($data);
        }else{
			$this -> load -> view('restricted_v');
		}
    }

    public function manage_member($member_number) {
        $member = Flock::getMemberData($member_number);
        $data['parents'] = Flock::getParents();
        $data['member_groups'] = Groups::getAll();
        $data['other_groups_for_me'] = Member_Groups::getMemberGroup($member_number);
        $data['member'] = $member[0];
        $data['title'] = "Flock Management";
        $data['content_view'] = "member_details_v";
        $data['quick_link'] = "new_flock";
        $this -> base_params($data);
    }

    public function birthdays() {
        $data['members'] = Flock::getBirthdaysToday();
        $data['upcomingbdays'] = Flock::getBirthdaysUpcoming();
        $data['title'] = "Flock Management";
        $data['content_view'] = "birthdays_v";
        $data['quick_link'] = "new_flock";
        $this -> base_params($data);
    }

    function fatherSuggestions() {
        $term = $this -> input -> post('term', TRUE);
        $manname = Flock::getFatherPersonName($term);
        $json_array = array();
        foreach ($manname as $row)
            array_push($json_array, $row -> First_Name . " " . $row -> Last_Name);

        echo json_encode($json_array);
    }

    function motherSuggestions() {
        $term = $this -> input -> post('term', TRUE);
        $womanname = Flock::getMotherPersonName($term);
        $json_array = array();
        foreach ($womanname as $row)
            array_push($json_array, $row -> First_Name . " " . $row -> Last_Name);

        echo json_encode($json_array);
    }

    function employerSuggestions() {
        $term = $this -> input -> post('term', TRUE);
        $companyname = Employers::getCompanyName($term);
        $json_array = array();
        foreach ($companyname as $row)
            array_push($json_array, $row -> Company);

        echo json_encode($json_array);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js", "jquery.ui.datepicker.js");
		$data['username'] = $this -> session -> userdata('names');
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
