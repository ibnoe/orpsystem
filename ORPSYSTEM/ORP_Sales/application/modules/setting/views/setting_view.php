
<?php echo Modules::run('front_templates/front_templates/header'); ?>
<?php echo Modules::run('front_templates/front_templates/menu'); ?>
	  

<!-- START CONTENT -->
<div class="content">

  <!-- Start Page Header -->
  <div class="page-header">
    <h1 class="title">Configuration</h1>
      <ol class="breadcrumb">
	   <li><a href="index.html">Configuration</a></li>
        <li class="active">Configuration Setting</li>
      </ol>

    <!-- Start Page Header Right Div -->
    <div class="right">
      <div class="btn-group" role="group" aria-label="...">
        <a data-toggle="modal" data-target="#myModalAdd" class="btn btn-default btn-xl"><i class="fa fa-plus"></i>Add New</a>
      </div>
    </div>
    <!-- End Page Header Right Div -->

  </div>
  <!-- End Page Header -->



<!-- START CONTAINER -->
<div class="container-padding">
  <!-- Start Row -->
  <div class="row">
    <!-- Start Panel -->
    <div class="col-lg-16">
      <div class="panel panel-default">
        <div class="panel-title">
         Data Username
        </div>
        <div class="panel-body table-responsive">
            <table id="example0" class="table display">
                <thead>
                    <tr>
						<th>ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Nama</th>
                        <th>Nomor HP</th>
						<th>Email</th>
						<th>Role</th>
						<th>Action</th>
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>01</td>
                        <td>Imam Mudzakir</td>
                        <td>123456</td>
						<td>Muhammad Imam Mudzakir</td>
						<td>08561603287</td>
						<td>imam@gmail.com</td>
						<td>SuperAdmin</td>
						<td> <a href="#" data-toggle="modal" data-target="#myModalEdit" class="btn btn-option3"><i class="fa fa-edit"></i>Edit</a></td>
						<td> <a href="#" id="button6" data-toggle="modal" data-target="#myModalDelete" class="btn btn-danger"><i class="fa fa-times-circle"></i>Delete</a></td>
                    </tr>
            </table>
        </div>
		      
      </div>
	   <nav>
              <ul class="pagination">
                <li>
                  <a href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                  </a>
                </li>
                <li class="disabled"><a href="#">1</a></li>
                <li class="active"><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li>
                  <a href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                  </a>
                </li>
              </ul>
            </nav>
    </div>
    <!-- End Panel -->
  </div>
  <!-- End Row -->
</div>
<!-- END CONTAINER -->



<!-- Modal Add New -->
            <div class="modal fade" id="myModalAdd" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Add New Data Username</h4>
                  </div>
                  <div class="modal-body">
            <div class="panel-body">
              <form class="form-horizontal">
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Hape</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Role</label>
                   <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-primary">
                        <option>SuperAdmin</option>
                        <option>Admin</option>
                        <option>User</option>
                      </select>                  
                  </div>
            </div>
          </form> 
         </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Modal Add New -->


<!-- Modal Edit New -->
            <div class="modal fade" id="myModalEdit" tabindex="-2" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Data Username</h4>
                  </div>
                  <div class="modal-body">
            <div class="panel-body">
              <form class="form-horizontal">
			  
			    <div class="panel-body">
              <form class="form-horizontal">
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Username</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Password</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nama Lengkap</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Nomor Hape</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="input002">
                  </div>
            </div>
			<div class="form-group">
                  <label for="input002" class="col-sm-2 control-label form-label">Role</label>
                   <div class="col-sm-10">
                    <select class="selectpicker" data-style="btn-primary">
                        <option>SuperAdmin</option>
                        <option>Admin</option>
                        <option>User</option>
                      </select>                  
                  </div>
            </div>
          </form> 
         </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-success">Save</button>
                  </div>
                </div>
              </div>
            </div>
		</div>
	</div>
<!-- Modal Edit New -->


<!-- Delete Data -->
            <div class="modal fade" id="myModalDelete" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog modal-sm">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Confirmation Delete</h4>
                  </div>
                  <div class="modal-body">
                    Are You Sure To Delete This Data
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-danger">Delete</button>
                  </div>
                </div>
              </div>
            </div>
<!-- Delete Data -->



<!-- FOOTER-->
<?php echo Modules::run('front_templates/front_templates/footer'); ?>
<!-- FOOTER-->
</div>
<!-- END CONTAINER -->
<!-- End Content -->
<!-- START SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/notification'); ?>
<!-- END SIDEPANEL -->
<?php echo Modules::run('front_templates/front_templates/js'); ?>
