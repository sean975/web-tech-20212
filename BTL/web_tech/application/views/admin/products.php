<?php $this->view("admin/header",$data); ?>

<?php $this->view("admin/sidebar",$data); ?>

	<style type="text/css">
    	.title_pu {
		text-align: center;
	}

  .popup {
		background-color: #eae8e8;
		box-shadow: 0px 0px 10px #aaa;
		/* position: absolute; */
		padding: 6px;
		position: fixed;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		width: 250px;
	}

		.add_edit_panel{

			width: 500px;
			height:700px;
			background-color: #eae8e8;
			box-shadow: 0px 0px 10px #aaa;
			position: absolute;
			padding: 6px;
		}

		.show{
			display: block;
 		}

 		.hide{
			display: none;
 		}

 		.edit_product_images{

 			display: flex;
 			width: 100%;

 		}

 		.edit_product_images img{

 			flex: 1;
 			width: 50px;
 			margin: 2px;
 			height: 80px;
 		}

	</style>
	<div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
	                  	  	  <h4>Sản phẩm<button class="btn btn-primary btn-xs" onclick="show_add_new(event)"><i class="fa fa-plus"></i>Thêm sản phẩm</button></h4>

	                  	  	  <!--add new product-->
	                  	  	  <div class="add_new add_edit_panel hide">

				                  <h4 class="mb">Thêm mới sản phẩm </h4>

			                      <form class="form-horizontal style-form" method="post">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Tên sản phẩm</label>
			                              <div class="col-sm-10">
			                                  <input id="name" name="name" type="text" class="form-control" autofocus required>

			                              </div>
			                          </div>
			                          <br><br style="clear: both;">
                                <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
			                              <div class="col-sm-10">
			                                  <input id="description" name="description" type="text" class="form-control" required>
			                              </div>
			                          </div>
			                          <br><br style="clear: both;">
                                <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Hãng</label>
			                              <div class="col-sm-10">
			                                  <input id="brand" name="brand" type="text" class="form-control" required>
			                              </div>
			                          </div>
			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Số lượng</label>
			                              <div class="col-sm-10">
			                                  <input id="quantity" name="quantity" type="number" value="1" class="form-control" required>
			                              </div>
			                          </div>

			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Thể loại</label>
			                              <div class="col-sm-10">
			                              	<select id="category" name="category"  class="form-control" required>
			                              		<option></option>
			                              		<?php if(is_array($categories)): ?>
				                              		<?php foreach($categories as $categ): ?>

				                              			<option value="<?=$categ->id?>"><?=$categ->category?></option>
				                              		<?php endforeach; ?>
			                              		<?php endif; ?>
			                              	</select>
 			                              </div>
			                          </div>

			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Giá</label>
			                              <div class="col-sm-10">
			                                  <input id="price" name="price" type="number" placeholder="0" step="0.01" class="form-control" required>
			                              </div>
			                          </div>

			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh chính</label>
			                              <div class="col-sm-10">
			                                  <input id="image" name="image" type="file"  onchange="display_image(this.files[0],this.name,'js-product-images-add')" class="form-control" required>
			                              </div>
			                          </div>
 											<br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh (optional)</label>
			                              <div class="col-sm-10">
			                                  <input id="image2" name="image2" type="file"  onchange="display_image(this.files[0],this.name,'js-product-images-add')" class="form-control" >
			                              </div>
			                          </div>
 											<br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh (optional)</label>
			                              <div class="col-sm-10">
			                                  <input id="image3" name="image3" type="file"  onchange="display_image(this.files[0],this.name,'js-product-images-add')" class="form-control" >
			                              </div>
			                          </div>
 											<br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh (optional)</label>
			                              <div class="col-sm-10">
			                                  <input id="image4" name="image4" type="file"  onchange="display_image(this.files[0],this.name,'js-product-images-add')" class="form-control" >
			                              </div>
			                          </div>
 										<div class="js-product-images-add edit_product_images">
              	  	  						<img src="">
              	  	  						<img src="">
              	  	  						<img src="">
              	  	  						<img src="">
              	  	  					</div>

              	  	  					<button type="button" class="btn btn-warning" onclick="show_add_new(event)" style="position:absolute;bottom:10px; left:10px;"> Đóng</button>
              	  	  					<button type="button" class="btn btn-primary" onclick="collect_data(event)" style="position:absolute;bottom:10px; right:10px;">Lưu</button>

			                      </form>

					            <br><br>
	                  	  	  </div>
	                  	  	  <!--add new product end-->

	                  	  	  <!--edit product-->
	                  	  	  <div class="edit_product add_edit_panel hide" >

				                  <h4 class="mb"><i class="fa fa-angle-right"></i> Chỉnh sửa sản phẩm</h4>
			                      <form class="form-horizontal style-form" method="post">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Tên sản phẩm</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_name" name="name" type="text" class="form-control" autofocus required>
			                              </div>
			                          </div>
			                          <br><br style="clear: both;">
                                 <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Mô tả</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_description" name="description" type="text" class="form-control" required>
			                              </div>
			                          </div>
			                          <br><br style="clear: both;">
                                 <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Hãng</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_brand" name="brand" type="text" class="form-control" required>
			                              </div>
			                          </div>
			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Số lượng</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_quantity" name="quantity" type="number" value="1" class="form-control" required>
			                              </div>
			                          </div>

			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Danh mục</label>
			                              <div class="col-sm-10">
			                              	<select id="edit_category" name="category"  class="form-control" required>
			                              		<option></option>
			                              		<?php if(is_array($categories)): ?>
				                              		<?php foreach($categories as $categ): ?>

				                              			<option value="<?=$categ->id?>"><?=$categ->category?></option>
				                              		<?php endforeach; ?>
			                              		<?php endif; ?>
			                              	</select>
 			                              </div>
			                          </div>

			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Giá</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_price" name="price" type="number" placeholder="0.00" step="0.01" class="form-control" required>
			                              </div>
			                          </div>

			                          <br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh chính</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_image" name="image" type="file" onchange="display_image(this.files[0],this.name,'js-product-images-edit')" class="form-control" required>
			                              </div>
			                          </div>
 											<br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh (optional)</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_image2" name="image2" type="file" onchange="display_image(this.files[0],this.name,'js-product-images-edit')" class="form-control" >
			                              </div>
			                          </div>
 											<br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh (optional)</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_image3" name="image3" type="file" onchange="display_image(this.files[0],this.name,'js-product-images-edit')" class="form-control" >
			                              </div>
			                          </div>
 											<br><br style="clear: both;">
			                          <div class="form-group">
			                              <label class="col-sm-2 col-sm-2 control-label">Ảnh (optional)</label>
			                              <div class="col-sm-10">
			                                  <input id="edit_image4" name="image4" type="file" onchange="display_image(this.files[0],this.name,'js-product-images-edit')" class="form-control" >
			                              </div>
			                          </div>
              	  	  					<br>
              	  	  					<div class="js-product-images-edit edit_product_images">

              	  	  					</div>
              	  	  					<button type="button" class="btn btn-warning" onclick="show_edit_product(0,'',false)" style="position:absolute;bottom:10px; left:10px;">Huỷ bỏ</button>
              	  	  					<button type="button" class="btn btn-primary" onclick="collect_edit_data(event)" style="position:absolute;bottom:10px; right:10px;">Lưu</button>

			                      </form>

					            <br><br>
	                  	  	  </div>
	                  	  	  <!--edit product end-->





					<br><br>
				</div>
<!-- Popup -->
          <div class="popup hide">

					<h4 class="title_pu">Bạn có muốn xoá sản phẩm?</h4>

					<button type="button" class="btn btn-warning" onclick="close_popup(false)" style="position:absolute;bottom:10px; left:10px; width: 80px">Đóng</button>
					<button type="button" class="btn btn-primary" onclick="close_popup(true)" style="position:absolute;bottom:10px; right:10px; width: 80px">Xóa</button>



					<br><br>
				</div>


	                  	  	  <hr>


                              <thead>
                              <tr>
                                	<th>Mã sản phẩm</th>
                                	<th>Tên sản phẩm</th>
                                	<th>Hãng</th>
                                	<th>Mô tả</th>
                                	<th>Số lượng</th>
                                	<th>Danh mục</th>
                                	<th>Giá</th>
                                	<th>Ngày thêm</th>
                                	<th>Ảnh sản phẩm</th>
                                	<th><i class=" fa fa-edit"></i> Tùy chọn</th>
                              </tr>
                              </thead>
                              <tbody id="table_body">

                              	<?=$tbl_rows?>

                              </tbody>
                          </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->

<script type="text/javascript">

	var EDIT_ID = 0;

	function show_add_new()
	{

      const list = document.querySelectorAll('.validate');
      for (let e of list ) {
        e.classList.add('hide');
      }

		var show_edit_box = document.querySelector(".add_new");
 		var name_input = document.querySelector("#name");

		if(show_edit_box.classList.contains("hide")){

 			show_edit_box.classList.remove("hide");
      name_input.value = "";
 			name_input.focus();

      var description_input = document.querySelector("#description");
			description_input.value = "";

      var brand_input = document.querySelector("#brand");
			brand_input.value = "";

			var quantity_input = document.querySelector("#quantity");
			quantity_input.value = "";

			var category_input = document.querySelector("#category");
			category_input.value = "";

			var price_input = document.querySelector("#price");
			price_input.value = "";

      // var product_images_input = document.querySelector(".js-product-images-add");
      // product_images_input.innerHTML = '';
		}else{

 			show_edit_box.classList.add("hide");
 			name_input.value = "";
		}


	}

	function show_edit_product(id,product,e)
	{
    const list = document.querySelectorAll('.validate');
      for (let e of list ) {
        e.classList.add('hide');
      }

		var show_add_box = document.querySelector(".edit_product");
	 	var edit_name_input = document.querySelector("#edit_name");

		if(e){

			var a = (e.currentTarget.getAttribute("info"));
			var info = JSON.parse(a.replaceAll("'",'"'));

			EDIT_ID = info.id;
			//show_add_box.style.left = (e.clientX - 700) + "px";
			show_add_box.style.top = (e.clientY - 100) + "px";

			edit_name_input.value = info.name;

      var edit_description_input = document.querySelector("#edit_description");
			edit_description_input.value = info.description;

      var edit_brand_input = document.querySelector("#edit_brand");
			edit_brand_input.value = info.brand;

			var edit_quantity_input = document.querySelector("#edit_quantity");
			edit_quantity_input.value = info.quantity;

			var edit_category_input = document.querySelector("#edit_category");
			edit_category_input.value = info.category;

			var edit_price_input = document.querySelector("#edit_price");
			edit_price_input.value = info.price;

			var product_images_input = document.querySelector(".js-product-images-edit");
			product_images_input.innerHTML = `<img src="<?=ROOT?>${info.image}" />`;
			product_images_input.innerHTML += `<img src="<?=ROOT?>${info.image2}" />`;
			product_images_input.innerHTML += `<img src="<?=ROOT?>${info.image3}" />`;
			product_images_input.innerHTML += `<img src="<?=ROOT?>${info.image4}" />`;

		}


		if(show_add_box.classList.contains("hide")){

 			show_add_box.classList.remove("hide");
 			edit_name_input.focus();
		}else{

 			show_add_box.classList.add("hide");
 			edit_name_input.value = "";
		}


	}

  function close_popup(action) {
		var popup = document.querySelector(".popup");
		if (!popup.classList.contains('hide')) {
			popup.classList.add("hide");
		} else {
			popup.classList.remove("hide")
		}
		if (action == true) {
			send_data({
				data_type: "delete_row",
				id: EDIT_ID
			});
		}
	}

  function insertAfter(newNode, existingNode) {
            existingNode.parentNode.insertBefore(newNode, existingNode.nextSibling);
        }
  function validate(element, msg) {
    const p = document.createElement('p');
    p.innerText = msg;
    p.setAttribute("style", "color: red;");
    p.className = 'validate';
    insertAfter(p, element);

  }

	function collect_data(e)
	{

		var name_input = document.querySelector("#name");
		if(name_input.value.trim() == "" || !isNaN(name_input.value.trim()))
		{
			// alert("Please enter a valid product name");
      validate(name_input,"Please enter a valid product name" );
			return;
		}

    	var description_input = document.querySelector("#description");
		if(description_input.value.trim() == "" || !isNaN(description_input.value.trim()))
		{
			// alert("Please enter a valid description");
      validate(description_input,"Please enter a valid description" );
			return;
		}
   		var brand_input = document.querySelector("#brand");
		if(brand_input.value.trim() == "" || !isNaN(brand_input.value.trim()))
		{
			// alert("Please enter a valid brand");
      validate(brand_input,"Please enter a valid brand" );
			return;
		}
		var quantity_input = document.querySelector("#quantity");
		if(quantity_input.value.trim() == "" || isNaN(quantity_input.value.trim()))
		{
			// alert("Please enter a valid quantity");
      validate(quantity_input, "Please enter a valid quantity" );
			return;
		}

		var category_input = document.querySelector("#category");
		if(category_input.value.trim() == "" || isNaN(category_input.value.trim()))
		{
			// alert("Please enter a valid category");
      validate(category_input, "Please enter a valid category");
			return;
		}

		var price_input = document.querySelector("#price");
		if(price_input.value.trim() == "" || isNaN(price_input.value.trim()))
		{
			// alert("Please enter a valid price");
      validate(price_input,"Please enter a valid price");
			return;
		}

 		var image_input = document.querySelector("#image");
		if(image_input.files.length == 0)
		{
			// alert("Please enter a valid main image");
      validate(image_input,"Please enter a valid main image" );
			return;
		}

    const list = document.querySelectorAll('.validate');
    for (let e of list ) {
      e.classList.add('hide');
    }
 		//create a form
		var data = new FormData();


 		var image2_input = document.querySelector("#image2");
		if(image2_input.files.length > 0)
		{
			data.append('image2',image2_input.files[0]);
		}

 		var image3_input = document.querySelector("#image3");
		if(image3_input.files.length > 0)
		{
			data.append('image3',image3_input.files[0]);
		}

 		var image4_input = document.querySelector("#image4");
		if(image4_input.files.length > 0)
		{
			data.append('image4',image4_input.files[0]);
		}


    	data.append('name',name_input.value.trim());
		data.append('brand',brand_input.value.trim());
		data.append('description',description_input.value.trim());
		data.append('quantity',quantity_input.value.trim());
		data.append('category',category_input.value.trim());
		data.append('price',price_input.value.trim());
		data.append('data_type','add_product');
		data.append('image',image_input.files[0]);

		send_data_files(data);

	}


	function collect_edit_data(e)
	{
    var name_input = document.querySelector("#edit_name");
    if(name_input.value.trim() == "" || !isNaN(name_input.value.trim()))
    {
      // alert("Please enter a valid product name");
      validate(name_input,"Please enter a valid product name" );
      return;
    }

		var description_input = document.querySelector("#edit_description");
		if(description_input.value.trim() == "" || !isNaN(description_input.value.trim()))
		{
			// alert("Please enter a valid description");
      validate(description_input,"Please enter a valid description" );
			return;
		}


    var brand_input = document.querySelector("#edit_brand");
		if(brand_input.value.trim() == "" || !isNaN(brand_input.value.trim()))
		{
			// alert("Please enter a valid brand");
      validate(brand_input,"Please enter a valid brand" );
			return;
		}

		var quantity_input = document.querySelector("#edit_quantity");
		if(quantity_input.value.trim() == "" || isNaN(quantity_input.value.trim()))
		{
			// alert("Please enter a valid quantity");
      validate(quantity_input, "Please enter a valid quantity" );
			return;
		}

		var category_input = document.querySelector("#edit_category");
		if(category_input.value.trim() == "" || isNaN(category_input.value.trim()))
		{
			// alert("Please enter a valid category");
      validate(category_input, "Please enter a valid category");
			return;
		}

		var price_input = document.querySelector("#edit_price");
		if(price_input.value.trim() == "" || isNaN(price_input.value.trim()))
		{
			// alert("Please enter a valid price");
      validate(price_input,"Please enter a valid price");
			return;
		}

 		//create a form
		var data = new FormData();

 		var image_input = document.querySelector("#edit_image");
		if(image_input.files.length > 0)
		{
			data.append('image',image_input.files[0]);
		}

		var image2_input = document.querySelector("#edit_image2");
		if(image2_input.files.length > 0)
		{
			data.append('image2',image2_input.files[0]);
		}


 		var image3_input = document.querySelector("#edit_image3");
		if(image3_input.files.length > 0)
		{
			data.append('image3',image3_input.files[0]);
		}

 		var image4_input = document.querySelector("#edit_image4");
		if(image4_input.files.length > 0)
		{
			data.append('image4',image4_input.files[0]);
		}


    	data.append('name',name_input.value.trim());
    	data.append('brand',brand_input.value.trim());
		data.append('description',description_input.value.trim());
		data.append('quantity',quantity_input.value.trim());
		data.append('category',category_input.value.trim());
		data.append('price',price_input.value.trim());
		data.append('data_type','edit_product');
		data.append('id',EDIT_ID);

		send_data_files(data);
	}



	function send_data(data = {})
	{

 		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function(){

			if(ajax.readyState == 4 && ajax.status == 200)
			{
				handle_result(ajax.responseText);
			}
		});

		ajax.open("POST","<?=ROOT?>product/ajax",true);
		ajax.send(JSON.stringify(data));
	}

	function send_data_files(data)
	{

 		var ajax = new XMLHttpRequest();

		ajax.addEventListener('readystatechange', function(){

			if(ajax.readyState == 4 && ajax.status == 200)
			{
				handle_result(ajax.responseText);
			}
		});

		ajax.open("POST","<?=ROOT?>product/ajax",true);
		ajax.send(data);
	}



	function handle_result(result)
	{
		if(result != ""){
			var obj = JSON.parse(result);

			if(typeof obj.data_type != 'undefined')
			{

				if(obj.data_type == "add_new")
				{
					if(obj.message_type == "info")
					{
						// alert(obj.message);
						show_add_new();

						var table_body = document.querySelector("#table_body");
						table_body.innerHTML = obj.data;
					}else
					{
						alert(obj.message);
					}
				}else
				if(obj.data_type == "edit_product")
				{

					if(obj.message_type == "info")
					{
						show_edit_product(0,'',false);

						var table_body = document.querySelector("#table_body");
						table_body.innerHTML = obj.data;
					}else{
						alert(obj.message);
					}

				}else
				if(obj.data_type == "disable_row")
				{

					var table_body = document.querySelector("#table_body");
					table_body.innerHTML = obj.data;

				}else
				if(obj.data_type == "delete_row")
				{

					var table_body = document.querySelector("#table_body");
					table_body.innerHTML = obj.data;

					alert(obj.message);
				}


			}
		}
	}

	function display_image(file,name,element)
	{
		var index = 0;
		if(name == "image2"){
			index = 1;
		}else
		if(name == "image3"){
			index = 2;
		}else
		if(name == "image4"){
			index = 3;
		}

		var image_holder = document.querySelector("."+element);

		var images = image_holder.querySelectorAll("IMG");

		images[index].src = URL.createObjectURL(file);


	}

	function edit_row(id)
	{

 		send_data({
 			data_type: ""
 		});
	}

	function delete_row(id)
	{
		EDIT_ID = id
		var popup = document.querySelector(".popup");
		if (!popup.classList.contains('hide')) {
			popup.classList.add("hide");
		} else {
			popup.classList.remove("hide")
		}
	}

	function disable_row(id,state)
	{
		send_data({
 			data_type: "disable_row",
 			id:id,
 			current_state:state,
 		});
	}

</script>

<?php $this->view("admin/footer",$data); ?>
