<?php
class Job_Group_Management extends Controller {
    function __construct() {
        parent::__construct();
    }//end constructor

    public function index() {
        $this -> listing();
    }//end index

    public function listing() {
        //$data['benefits'] = Benefits::getAll();
        $data['groups'] = Job_Groups::getAll();
        $data['title'] = "Job Group Management::All Groups";
        $data['content_view'] = "job_groups_v";
        $this -> base_params($data);
    }//end listing

    public function add() {
        $data['benefits'] = Benefits::getAll();
        $data['title'] = "Job Group Management::Add New Group";
        $data['quick_link'] = "new_group";
        $data['content_view'] = "add_job_group_v";
        $this -> base_params($data);
    }

    public function save() {
        $group_name = $this -> input -> post("group_name");
        $description = $this -> input -> post("description");
        $salary = $this -> input -> post("salary");
        $benefit = $this -> input -> post("benefits");
        $group_id = $this -> input -> post("group_id");
        $i = 0;

        foreach ($benefit as $r) {
            $grouper = new Job_Groups();
            $grouper -> Job_Group = $group_name;
            $grouper -> Salary = $salary;
            $grouper -> Description = $description;
            $grouper -> Benefit = $r;
            $grouper -> save();
            $i++;
        }

        redirect("job_group_management/listing");

    }//end save

    public function delete($id) {
        $this -> load -> database();
        $sql = 'delete from job_groups where id =' . $id . ' ';
        $query = $this -> db -> query($sql);
        redirect("job_group_management/listing", "refresh");
    }//end save

    public function edit_group($id) {
        $group = Job_Groups::getGroup($id);
        $data['group'] = $group[0];
        $data['title'] = "Job Group Management";
        $data['content_view'] = "add_job_group_v";
        $data['quick_link'] = "new_group";
        $this -> base_params($data);
    }

    public function manage_group($job_group) {
        $group = Job_Groups::manageGroup($job_group);
        $data['group'] = $group[0];
        //$benefits = Job_Groups::getBenefits($job_group);
        // $data['benefits'] = $benefits;

        $this -> load -> database();
        $sql = 'SELECT b.name AS Name FROM job_groups j, benefits b WHERE b.id = j.benefit AND j.job_group = ? ';
        $query = $this -> db -> query($sql, array($job_group));
        $data['benefits'] = $query -> result_array();

        $data['title'] = "Job Group Management";
        $data['content_view'] = "manage_job_group_v";
        $data['quick_link'] = "manage_job_group_v";
        $this -> base_params($data);
    }

    public function base_params($data) {
        $data['styles'] = array("jquery-ui.css", "jquery.ui.all.css");
        $data['scripts'] = array("jquery-ui.js");
        $this -> load -> view('template', $data);
    }//end base_params

}//end class
