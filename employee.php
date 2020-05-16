<?php
require('top.inc.php');
if($_SESSION['ROLE']!=1){
	header('location:add_employee.php?id='.$_SESSION['USER_ID']);
	die();
}
if(isset($_GET['type']) && $_GET['type']=='delete' && isset($_GET['id'])){
	$id=mysqli_real_escape_string($con,$_GET['id']);
	mysqli_query($con,"delete from employee where id='$id'");
}
$res=mysqli_query($con,"select * from employee where role=2 order by id desc");

?>
<div class="content pb-0">
            <div class="orders">
               <div class="row">
                  <div class="col-xl-12">
                     <div class="card">
                        <div class="card-body">
                           <h4 class="box-title">Employee Master </h4>
						   <h4 class="box_title_link"><a href="add_employee.php">Add Employee</a> </h4>
                        </div>
                        <div class="card-body--">
                           <div class="table-stats order-table ov-h">
                              <table class="table ">
                                 <thead>
                                    <tr>
                                       <th width="5%">S.No</th>
                                       <th width="5%">ID</th>
                                       <th width="11%">Name</th>
                                       <th width="11%">Surname</th>
									            <th width="11%">Email</th>
                                       <th width="11%">Tel/EXT</th>
                                       <th width="11%">Department</th>
                                       <th width="11%">SLA</th>
                                       <th width="9%">Block</th>
                                       <th width="5%">Office</th>
                                       <th width="19%">Action</th>
                                    </tr>
                                 </thead>
                                 <tbody>
                                    <?php 
									$i=1;
									while($row=mysqli_fetch_assoc($res)){?>
									<tr>
                                       <td><?php echo $i?></td>
                                       <td><?php echo $row['id']?></td>
                                       <td><?php echo $row['fname']?></td>
                                       <td><?php echo $row['lname']?></td>
                                       <td><?php echo $row['email']?></td>
                                       <td><?php echo $row['telephone']?></td>
                                       <td><?php echo $row['department_id']?></td>
                                       <td><?php echo $row['sla_id']?></td>
                                       <td><?php echo $row['block_id']?></td>
                                       <td><?php echo $row['office_no']?></td>
                                       <td><a href="add_employee.php?id=<?php echo $row['id']?>">Edit</a> <a href="employee.php?id=<?php echo $row['id']?>&type=delete">Delete</a></td>
                                    </tr>
									<?php 
									$i++;
									} ?>
                                 </tbody>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
		  </div>
         
<?php
require('footer.inc.php');
?>