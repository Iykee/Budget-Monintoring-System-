 <?php 
 include('include/mainheader.php');
 include('include/config.php');

 if (isset($_GET['id'])) {
  $id =$_GET['id'];
  $sql =mysqli_query($db,"DELETE FROM budget_line 
    WHERE id='$id'");
  if ($sql) {
   echo "<script>alter('data deleted');</script>"; 
 }
 }
?>
<div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="dashboard.php">Admin </a></li>
          
            <a href="dashboard.php" class="breadcrumb-item ">Dashboard </a>
            <a href="currentbudget.php" class="breadcrumb-item ">Capital Budget </a>


          </li>
         

          </li>
          <li class="breadcrumb-item active">Budget Line</li>

        </ol>

        <!-- Icon Cards-->
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-list"></i>
                </div>
                <div class="mr-5">  Budget Lines</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" 
              href="">
                <span class="float-left">Manage Budget Lines</span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-danger o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-plus"></i>
                </div>
                <div class="mr-5">  Budget Line </div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="addMainBudgetLine.php">
                <span class="float-left">Add Budget Line  </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-info o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-th"></i>
                </div>
                <div class="mr-5">SubLine / Budget Item</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="budgetItem.php">
                <span class="float-left">Manage Budget Items </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fas fa-fw fa-plus"></i>
                </div>
                <div class="mr-5">Budget Item</div>
              </div>
              <a class="card-footer text-white clearfix small z-1" href="#">
                <span class="float-left">Add New Budget Item  </span>
                <span class="float-right">
                  <i class="fas fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
        </div>

        

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Manage Budget Line</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>S/no</th>
                    <th>Financial Year</th>
                    <th>Budget Name</th>
                    <th>Cost Center Code</th>
                    <th>Budget Line </th>
                    <th>Account Code </th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>S/no</th>
                    <th>Financial Year</th>
                    <th>Budget Name</th>
                    <th>Cost Center Code</th>
                    <th>Budget Line </th>
                    <th>Account Code </th>
                    <th>Amount</th>
                    <th>Action</th>
                  </tr>
                </tfoot>
                <tbody>
                  <?php
    $aid=$_SESSION['id'];              
$query = "SELECT * FROM budget_line";
$result = mysqli_query($db,$query);
$number =  mysqli_num_rows($result);
  
if($number > 0){
foreach($result as $key => $data){
?>          
  <tr>
    <td><?= ++$key ?></td>
    <td><?= $data['Fy'] ?></td>
    <td><?= $data['BudgetName'] ?></td>
    <td><?= $data['CostCenter'] ?></td>
    <td><?= $data['AccountName'] ?></td>
    <td><?= $data['AccountCode'] ?></td>
    <td><?= $data['ApprovedAmount'] ?></td>
    <td>     
<a href="budgetLine.php?id=<?php echo $row['id'];?>" onClick="return confirm('Are You Sure You Want To Delete')" ><i class="fa fa-trash" style="color: gray;">delete</i></a>
                    
    </td>
  </tr>
<?php } }else{ ?>
  <tr>
    <td colspan="7">No Data Found</td>
  </tr>';
<?php } ?>                
                
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->






      <!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © BoU 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>