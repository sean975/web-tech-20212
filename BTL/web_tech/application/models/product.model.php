<?php

Class ProductModel
{
  private $db;

  public function __construct() {
    $this->db = Database::newInstance();
  }


	public function create($DATA,$FILES,$image_class = null)
	{
		$_SESSION['error'] = "";

		$DB = Database::newInstance();
		$arr['name'] = ucwords($DATA->name);
		$arr['brand'] = ucwords($DATA->brand);
		$arr['description'] = ucwords($DATA->description);
		$arr['quantity'] 	= ucwords($DATA->quantity);
		$arr['category'] 	= ucwords($DATA->category);
		$arr['price'] 		= ucwords($DATA->price);
		$arr['date'] 		= date("Y-m-d H:i:s");
		$arr['slag'] 		= $this->strToURL($DATA->description);

		if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", trim($arr['description'])))
		{
			$_SESSION['error'] .= "Please enter a valid description for this product<br>";
		}

		if(!is_numeric($arr['quantity']))
		{
			$_SESSION['error'] .= "Please enter a valid quantity<br>";
		}

		if(!is_numeric($arr['category']))
		{
			$_SESSION['error'] .= "Please enter a valid category<br>";
		}

		if(!is_numeric($arr['price']))
		{
			$_SESSION['error'] .= "Please enter a valid price<br>";
		}

		//make sure slag is unique
		$slag_arr['slag'] = $arr['slag'];
		$query = "select slag from products where slag = :slag limit 1";
		$check = $DB->read($query,$slag_arr);

		if($check){
			$arr['slag'] .= "-" . rand(0,99999);
		}

		$arr['image'] = "";
		$arr['image2'] = "";
		$arr['image3'] = "";
		$arr['image4'] = "";

		$allowed[] = "image/jpeg";
		$size = 10;
		$size = ($size * 1024 * 1024);

	 	$folder = "uploads/";

	 	if(!file_exists($folder))
	 	{
	 		mkdir($folder,0777,true);
	 	}

		//check for files
		foreach ($FILES as $key => $img_row) {
			# code...
			if($img_row['error'] == 0 && in_array($img_row['type'], $allowed))
			{
				if($img_row['size'] < $size)
				{
					$destination = $folder . $image_class->generate_filename(60) . ".jpg";
					move_uploaded_file($img_row['tmp_name'], $destination);
					$arr[$key] = $destination;

					$image_class->resize_image($destination,$destination,1500,1500);
				}else
				{
					$_SESSION['error'] .= $key . " is bigger than required size<br>";
				}
			}

		}

		if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){
			$query = "insert into products (name,brand,description,quantity,category,price,date,image,image2,image3,image4,slag) values (:name,:brand,:description,:quantity,:category,:price,:date,:image,:image2,:image3,:image4,:slag)";
			$check = $DB->write($query,$arr);

			if($check){
				return true;
			}
		}

		return false;

	}

	public function edit($data,$FILES,$image_class = null)
	{

 		$arr['id'] = $data->id;
		$arr['name'] = $data->name;
		$arr['brand'] = $data->brand;
		$arr['description'] = $data->description;
		$arr['quantity'] = $data->quantity;
		$arr['category'] = $data->category;
		$arr['price'] = $data->price;
		$images_string = "";

		if(!preg_match("/^[a-zA-Z 0-9._\-,]+$/", trim($arr['description'])))
		{
			$_SESSION['error'] .= "Please enter a valid description for this product<br>";
		}

		if(!is_numeric($arr['quantity']))
		{
			$_SESSION['error'] .= "Please enter a valid quantity<br>";
		}

		if(!is_numeric($arr['category']))
		{
			$_SESSION['error'] .= "Please enter a valid category<br>";
		}

		if(!is_numeric($arr['price']))
		{
			$_SESSION['error'] .= "Please enter a valid price<br>";
		}

		$allowed[] = "image/jpeg";
		$size = 10;
		$size = ($size * 1024 * 1024);

	 	$folder = "uploads/";

	 	if(!file_exists($folder))
	 	{
	 		mkdir($folder,0777,true);
	 	}

		//check for files
		foreach ($FILES as $key => $img_row) {
			# code...
			if($img_row['error'] == 0 && in_array($img_row['type'], $allowed))
			{
				if($img_row['size'] < $size)
				{
					$destination = $folder . $image_class->generate_filename(60) . ".jpg";
					move_uploaded_file($img_row['tmp_name'], $destination);
					$arr[$key] = $destination;
					$image_class->resize_image($destination,$destination,1500,1500);

					$images_string .= ",". $key ." = :".$key;
				}else
				{
					$_SESSION['error'] .= $key . " is bigger than required size<br>";
				}
			}

		}

		if(!isset($_SESSION['error']) || $_SESSION['error'] == ""){

			$DB = Database::newInstance();
	 		$query = "update products set description = :description, name =:name, brand =:brand, quantity = :quantity,category = :category,price = :price $images_string where id = :id limit 1";

			$DB->write($query,$arr);
		}
	}

	public function delete($id)
	{

		$DB = Database::newInstance();
		$id = (int)$id;
		$query = "delete from products where id = '$id' limit 1";
		$DB->write($query);
	}

	public function getAllProds()
	{

		$DB = Database::newInstance();
		return $DB->read("select * from products order by id desc");

	}

  public function getProdById($id) {
    $sql = 'select * from products where id = :id';
    $this->db->read($sql, ['id'=>$id]);
  }

  public function getProdBySlag($slag) {
    $this->db->read('select * from products where slag = :slag', ['slag'=>$slag]);
  }

  public function getProdByCat($catId) {
    $sql = 'select * from products where category = :id';
    $this->db->read($sql, ['id'=>$catId]);
  }

  public function search($search) {
    $sql = "select * from products where name like '%$search' or description like '%$search' or brand like '%$search'";
    $this->db->read($sql);
  }

	public function makeTable($cats,$model = null)
	{

		$result = "";
		if(is_array($cats)){
			foreach ($cats as $cat_row) {
				# code...

 				$edit_args = $cat_row->id.",'".$cat_row->name."'";

 				$info = array();
 				$info['id'] = $cat_row->id;
 				$info['name'] = $cat_row->name;
 				$info['brand'] = $cat_row->brand;
 				$info['description'] = $cat_row->description;
 				$info['quantity'] = $cat_row->quantity;
 				$info['price'] = $cat_row->price;
 				$info['category'] = $cat_row->category;
 				$info['image'] = $cat_row->image;
 				$info['image2'] = $cat_row->image2;
 				$info['image3'] = $cat_row->image3;
 				$info['image4'] = $cat_row->image4;

 				$info = str_replace('"', "'", json_encode($info));

 				$one_cat = $model->get_one($cat_row->category);
 				$result .= "<tr>";

					$result .= '
						<td>'.$cat_row->id.'</td>
						<td>'.$cat_row->name.'</td>
						<td>'.$cat_row->brand.'</td>
						<td>'.$cat_row->description.'</td>
						<td>'.number_format($cat_row->quantity).'</td>
						<td>'.$one_cat->category.'</td>
						<td>'.number_format($cat_row->price).'</td>
						<td>'.date("jS M, Y H:i:s",strtotime($cat_row->date)).'</td>
						<td><img src="'.ROOT . $cat_row->image.'" style="width:70px; height:70px;" /></td>

	                  <td>

	                      <button info="'.$info.'" onclick="show_edit_product('.$edit_args.',event)" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
	                      <button onclick="delete_row('.$cat_row->id.')" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
	                  </td>
					';

				$result .= "</tr>";
			}
		}

		return $result;
	}


	public function strToURL($url) {
	   $url = preg_replace('~[^\\pL0-9_]+~u', '-', $url);
	   $url = trim($url, "-");
	   $url = iconv("utf-8", "us-ascii//TRANSLIT", $url);
	   $url = strtolower($url);
	   $url = preg_replace('~[^-a-z0-9_]+~', '', $url);
	   return $url;
	}



}
