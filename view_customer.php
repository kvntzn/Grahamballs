<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
 
</head>

<body>
	<div class="container">


<!-- Modal -->
  		<form method="post" enctype="multipart/form-data">	
			<div class="modal modal-warning modal fade" id="AddPModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
			    <div class="modal-content">
			      <div class="modal-header">
			        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			        <h4 class="modal-title" id="myModalLabel">Add Product</h4>
			      </div>
			      <div class="modal-body">
			      	
						<div class="input-group">
							<label for="ProductName">Product Name</label>
							<input type="text" class="form-control" name="product_name" id="ProductName"placeholder="Product Name" required>
						</div>
<br>
						

						<div class="input-group">
							<label>Price</label>
							<input type="number" name="product_price" min="1" step="0.01" class="form-control" placeholder="Product Price" 	required>
						</div>
<br>

						<div class="input-group">
							<label>Quantity</label>
							<input type="number" name="product_quantity"  placeholder="Quantity" min="1" max="1000" class="form-control" required>
						</div>
<br>	
						<div class="input-group">
							<label>Category</label>
							<select name="product_category" id="product_category" placeholder="Product Category" class="form-control">
				                    <option>Phone Battery</option>
				                    <option>Car Battery</option>
				                    <option>Battery</option>
				                    <option>Console Batteries</option>
		                  </select>
						</div>
<br>
						<div class="input-group">
							<label>Brand</label>
							<input type="text" class="form-control" name="product_brand" id="ProductName"placeholder="Product Brand" required>
						</div>
<br>
	
						<div class="input-group">
							<label>Image</label>
							<input type="file" name="product_image"   class="form-control" placeholder="Product Image" required>
						</div>
<br>
						<br>

						
			      </div>
			      <div class="modal-footer">
			        <button type="submit" class="btn   btn-outline" name ="add_pro" id ="add_pro">Add</button>	
			      </div>
			    </div>
			  </div>
			</div>
		

		</form>


	</div>
</body>

</html>



 