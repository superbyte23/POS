<?php include 'includes/header.php'; ?>
 <body class="">
    <div class="page">
    	<div class="page-main">
	<?php include 'includes/topbar.php'; ?>
		<div class="my-3 my-md-5">
          	<div class="container-fluid">
           		<div class="row">
           			<div class="col">
           				<div class="card">
           					<div class="example" style="padding: 5px; padding-bottom: 0;">
		                        <form method="POST" action="add_item.php">
			                        <div class="row">
			                        	<input type="text" name="invoice_id" hidden="" value="<?php echo $_GET['invoice']; ?>">
			                        	<div class="form-group col-4">
				                          <label class="form-label">Enter Quanity</label>
				                          	<div class="input-icon">
				                            <input type="number" class="form-control" placeholder="Quantity" id="quantity_item" name="quantity" value="1">
				                          </div>
				                        </div>
				                        <div class="form-group col-8">
				                          <label class="form-label">Scan / Enter Item Code</label>
				                          	<div class="input-icon">
				                            <span class="input-icon-addon">
				                              <i><img src="./demo/menu/barcode.png" class="menu-icon" style="padding: 1px; margin-top: 5px; padding-left: 5px; "></i>
				                            </span>
				                            <input type="text" class="form-control" placeholder="Scan / Enter Item Code" id="barcode" name="barcode" autofocus="">
				                          </div>
				                        </div>
				                        <div class="col">
				                        	<?php
				                        		if (isset($_SESSION['invalid_item'])) {
				                        			echo '<div class="alert alert-danger" role="alert"> Item not found! </div>';
				                        		}elseif(isset($_SESSION['less_qty'])){
				                        			echo '<div class="alert alert-danger" role="alert"> Invalid Quantity </div>';
				                        		}			                        		
				                        		session_unset();
											?>
				                        </div>
			                        </div>
			                        <button type="submit" name="add" style="display: none">Add</button>
			                    </form>
		                      </div>
           						<div style="padding: 5px;">
           							<form action="test.php" method="POST" id="frm1">
           							<table class="table table-striped table-dark table-sm">
									  <thead>
									    <tr id="thead">
									    	<th style="width: 2px;" class="text-capitalize">Item#</th>
									      	<th style="width: 40%;" class="text-capitalize">Item Name</th>
									      	<th style="width: 15%;" class="text-capitalize text-right">Unit Price</th>
									      	<th style="width: 10%;" class="text-capitalize text-right">Quantity</th>
									      	<th style="width: 15%;" class="text-capitalize text-right">Net Price</th>
									      	<th style="width: 10%;" class="text-capitalize text-right">Vat 12%</th>
									      	<th style="width: 15%;" class="text-capitalize text-right">Total</th>
									      	<th class="text-capitalize">Action</th>
									    </tr>
									  </thead>
									  <tbody id="list">
									  	<?php

									  	$pdo->load_items($_GET['invoice']);

									  	 ?>
									  </tbody>
									</table>										
           						</form>
           								
           						</div>
           				</div>
           			</div>
           			<div class="col-lg-4 col">
           				<div class="card">
           					<div class="card-body bg-dark text-white">
           						Total Payment :
           						<div class="input-icon">
		                            <span class="input-icon-addon"> <i> <img src="./demo/peso_dark.png" width="20"></i></span>
		                            <input type="text" name="total_payment" id="total_payment" class="form-control form-control-lg text-right tst" value="<?php $pdo->get_total_payment($_GET['invoice']) ?>" autocomplete="none" readonly> 
		                        </div>
		                        <button type="submit" class="btn btn-success float-right" style="margin-top: 5px; border-radius: 0;" data-toggle="modal" data-target="#cash_out" id="compute" name="compute">Ctrl+Enter</button>
           					</div>
           				</div>
           			</div>
          		</div>
        	</div>
      	</div>
      	<div class="modal bd-example-modal-sm" id="cash_out" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		     	<div class="card">
		     		<form method="POST" action="cash_out.php" id="frm_cash_out">
					  <div class="card-header">
					    <h3 class="card-title">Cash Out</h3>
					    <div class="card-options">
					        <a href="#" class="btn btn-danger btn-sm">Cancel</a>
					        <a href="#" class="btn btn-primary btn-sm ml-2">Close</a>
					    </div>
					  </div>
					  <div class="card-body">
					  	<input type="text" name="invoice_number" hidden="" value="<?php echo $_GET['invoice']; ?>">
						  <div class="form-group">
						    <label class="form-label">Total Payment<span class="form-required">*</span></label>
						    <input type="text" readonly="" value="<?php $pdo->get_total_payment($_GET['invoice']) ?>" class="form-control text-right tst" id="total_payment" name="total_payment" required="">
						  </div>
						  <div class="form-group">
						    <label class="form-label">Cash Tendered<span class="form-required">*</span></label>
						    <input type="number" class="form-control text-right tst" id="cash_tendered" autofocus="" name="cash_tendered" required="" min="0">
						  </div>
						  <div class="form-group">
						    <label class="form-label">Change<span class="form-required">*</span></label>
						    <input type="text" class="form-control text-right tst" id="change" value="0.00" readonly="" name="change">
						  </div>
						  <div class="form-group">
					  		<button type="submit" name="cash_out" hidden="" id="btn_cash_out">Submit</button>
						  </div>
					  </div>
					</form>
				</div>
		    </div>
		  </div>
		</div>
		<?php include 'includes/footer.php'; ?>
      </div>
	</div>
	<script src="./assets/js/vendors/jquery-3.2.1.min.js"></script>
	<script>
		$(function(){
			
			$('#frm_cash_out').submit(function(){				
				var cash = $('#cash_tendered').val();
				var total_payment = $('#total_payment').val();
				var change = cash - total_payment;

				cash = parseFloat(cash);
				total_payment = parseFloat(total_payment);
				
				if (cash > total_payment) {
					return true;
				}else{
					alert("Invalid Pay Amount");		
					return false;
				}
			});			
			$('body').keydown(function(event){
				if (event.ctrlKey && event.keyCode === 13) {
						$('#compute').trigger('click');
						$('#cash_out').on('shown.bs.modal', function (e) {
						$('#cash_tendered').focus();
						});
						$('#cash_out').on('hidden.bs.modal', function (e) {
						$('#barcode').focus();
						});
						
				}
			});

			// sum
			$('#cash_tendered').keyup(function(){
				var cash = $('#cash_tendered').val();
				var total_payment = $('#total_payment').val();
				var change = cash - total_payment;
				if (change < 0) {
					$('#change').val('0.00');

				}else{
					$('#change').val(change.toFixed(2));
				}

			});
			// sum

			$('#quantity_item').on('change', function(){
				var x = $(this).val();
				if (x < 1) {
					$(this).val(1);
				}
			})
		})

		$
	</script>
	<style type="text/css">
		.tst{
			font-family: calibri; 
			font-size: 30px; 
			text-indent: 10px; 
			color: red;
			
		}
		.tst:focus, .tst:read-only{
			font-family: calibri; 
			font-size: 30px; 
			text-indent: 10px; 
			color: red;
			
		}
	</style>
  </body>
</html>