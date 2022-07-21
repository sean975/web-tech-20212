<?php
Class Home extends Controller {
    public function index()
    {
        $search = false;
		if(isset($_GET['find']))
		{
			$find = addslashes($_GET['find']);
			$search = true;
		}

        $User = $this->load_model('User');
        $image_class = $this->load_model('Image');
        $user_data = $User->checkLogin();

        if(is_object($user_data)){
			$data['user_data'] = $user_data;
		}

        $DB = Database::newInstance();

        if($search){
			$arr['name'] = "%". $find . "%";
			$ROWS = $DB->read("select * from products where name like :name ",$arr);
		}else{
			$ROWS = $DB->read("select * from products");
		}


        $data['page_title'] = "Home";
        
        if($ROWS){
			foreach ($ROWS as $key => $row) {
				# code...
				$ROWS[$key]->image = $image_class->get_thumb_post($ROWS[$key]->image);
			}
		}

        //get all categories
		$category = $this->load_model('category');
		$data['categories'] = $category->get_all();

        //get all slider content
        $Slider = $this->load_model('Slider');
		$data['slider'] = $Slider->get_all();

        if($data['slider']){
			foreach ($data['slider'] as $key => $row) {
				# code...
				$data['slider'][$key]->image = $image_class->get_thumb_post($data['slider'][$key]->image,484,441);
			}
		}
        
        $data['ROWS'] = $ROWS;
        $data['show_search'] = true;
		if($search){
			$this->view("products/index", $data);
		}
		else{
        $this->view("home", $data);
		}
    }
}