<?php include 'includes/header.php';

if (isset($_POST['submit'])) {
   $product->add_product($_POST);
}

?>
 <body class="">
    <div class="page">
    	<div class="page-main">
	<?php include 'includes/topbar.php'; ?>
		<div class="my-3">
      	<div class="container-fluid row">
            <div class="col-3">
                <div class="card">
                  <!-- <div class="card-status card-status-left bg-red "></div> -->
                  <div class="card-header">
                    <h3 class="card-title">Add Products</h3>
                  </div>
                  <div class="card-body">
                    <form action="#" method="POST">
                      <div class="form-group">
                        <label for="code">Code <span class="text-danger">*</span></label>
                        <input type="text" name="code" id="code" class="form-control" placeholder="Item Code">
                      </div>
                      <div class="form-group">
                        <label for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Item Name">
                      </div>
                       <div class="form-group">
                        <label for="quantity">Quantity <span class="text-danger">*</span></label>
                        <input type="text" name="quantity" id="quantity" class="form-control" placeholder="Quantity">
                      </div>
                       <div class="form-group">
                        <label for="price">Price <span class="text-danger">*</span></label>
                        <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                      </div>
                      <div class="form-group">
                        <button type="submit" name="submit" class="btn btn-primary float-right"><i class="fe fe-save"></i> Save</button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="col">
                <div class="card">
                  <!-- <div class="card-status card-status-left bg-red "></div> -->
                  <div class="card-header">
                    <h3 class="card-title">Products</h3>
                    <div class="card-options"> 
                        <div class="input-icon">
                            <input type="text" class="form-control" placeholder="Search Product">
                            <span class="input-icon-addon">
                              <i class="fe fe-search"></i>
                            </span>
                        </div>
                    </div>
                  </div>
                  <div class="card-body" style="padding: 5px; margin: 0;">                        
                        <div class="table-responsive dataTable">
                            <table class="table table-striped table-sm table-hover" id="product_table" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Item Code</th>
                                        <th>Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th width="10">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                      $num_per_page = 5;                                     
                                      if (!isset($_GET['page'])) {
                                        $start = 0;
                                      }else{
                                        $start = $_GET['page'] * $num_per_page - $num_per_page;
                                      }

                                      $result = $product->load_products("SELECT * FROM tbl_items ORDER BY item_name LIMIT $start, $num_per_page");

                                      

                                      foreach ($result as $row) { 
                                          echo '<tr>
                                                  <td>'.$row["item_code"].'</td>
                                                  <td>'.$row["item_name"].'</td>
                                                  <td>'.$row["item_quantity"].'</td>
                                                  <td>Php '.$row["item_price"].'</td>
                                                  <td>
                                                    <a href="#" id="" class="btn btn-info btn-sm"><i class="fe fe-edit"></i> Edit</a>
                                                  </td>
                                                </tr>'; 
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="float-right">
                          <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              
                              <?php
                              $num_records = $product->load_products('SELECT * FROM tbl_items')->rowCount();
                              $num_links =  ceil($num_records/$num_per_page);
                              for ($i=1; $i <= $num_links; $i++) {
                                $link = '';
                                if (isset($_GET['page'])) {
                                  if ($_GET['page'] == $i) {
                                    $link = 'active';
                                  }  
                                }
                                  echo '<li class="page-item '.$link.'"><a class="page-link" href="products.php?page='.$i.'">'.$i.'</a></li> ';
                              }
                              ?> 
                            </ul>
                          </nav>
                        </div>
                  </div>
                </div>
            </div>

        	</div>
      	</div> 
		<?php include 'includes/footer.php'; ?>
      </div>
	</div>
	<script>
        require(['datatable'], function(){
            $(document).ready(function(){
                $('#product_table').DataTable({
                    pageLength: 10,
                    "order": [[0, "desc"]]
                });
            });
        });
    </script>
  </body>
</html>