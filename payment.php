<?php session_start();
if(empty($_SESSION['id'])):
header('Location:index.php');
endif;
?>


<body>
	
		<div class = "mysqlitent">
			<div class = "col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class = "col-md-9 col-lg-9">
					<div class="widget wgreen">
                
                <div class="widget-head">
                  <div class="pull-left">Payment Details</div>
                  <div class="widget-imysqlis pull-right">
                    <a href="#" class="wminimize"><i class="fa fa-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="fa fa-times"></i></a>
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-mysqlitent">
                  <div class="padd">

                    <br>
                    <!-- Form starts.  -->
                     <form class="form-horizontal" role="form" action="payment_save.php" method="post">
                                <div class="form-group">
                                  <label class="col-lg-2 mysqlitrol-label">Package Details</label>
                                  <div class="col-lg-5">
<?php 
include('db.php');
$id = $_SESSION['id'];
$query = mysqli_query($mysqli, "SELECT * FROM reservation natural join combo WHERE rid='$id'");
      $row=mysqli_fetch_array($query);
        $cid=$row['combo_id'];
          echo "<b>".$row['combo_name']."</b>";
      $query1 = mysqli_query($mysqli, "SELECT * FROM combo_details natural join menu WHERE combo_id='$cid'");
        while($row1=mysqli_fetch_array($query1))
        {


?>
                                    <?php   
                                      echo "<br>";
                                      echo $row1['menu_name'];
                                    ?>
         <?php }?>                           
                                  </div>
                                </div>    

                                <div class="form-group">
                                  <label class="col-lg-2 mysqlitrol-label">Payment Details</label>
                                  <div class="col-lg-5">
                                  <h4>
                                    <?php
                                      echo $row['pax'];
                                      echo " x ";
                                      echo number_format($row['price'],2);
                                      echo " = ";
                                      echo number_format($row['payable'],2);
                                    ?>
                                   </h4> 
                                  </div>
                                </div>


                                <div class="form-group">
                                  <label class="col-lg-2 mysqlitrol-label">Mode of Payment</label>
                                  <div class="col-lg-5">
                                    <select class="form-mysqlitrol select2 " id="exampleSelect1" name="mode" placeholder="Select occasion" required>
                                      <option>Bank to Bank</option>
                                      <option>Pera Padala</option>
                                      <option>Cash</option>
                                    </select>
                                  </div>
                                </div>  
                  
                </div>
              </div>

            </div>
         </div>
      </div> 
                                <div class="form-group">
                                  <div class="col-lg-offset-2 col-lg-6">
                                    <button type="reset" class="btn btn-sm btn-default">Clear</button>
                                    <button type="submit" class="btn btn-sm btn-primary">Next</button>
                                    
                                  </div>
                                </div>
                              </form>
                  </div>
                </div>
                  <div class="widget-foot">
                    <!-- Footer goes here -->
                  </div>
              </div>		
				</div>
				
				
			</div>	

<script>
  $(function () {
  //Initialize Select2 Elements
    $(".select2").select2();
  })
$( "#datepicker" ).datepicker({ minDate: 0});


</script>
</body>
</html>



