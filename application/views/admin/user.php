<div class="content-wrapper">
    <a class="btn btn-success" href="" data-toggle='modal' data-target='#addUser' style="margin:2rem" ><i class="fa-solid fa-plus"></i> Add User</a>
    <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" style="text-align:center" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Position</th>
                <th>Branch</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($user_list as $ul) : ?>
                <tr class="table-active"> 
                    <td><?php echo $ul['user_id']; ?></td>
                    <td><?php echo $ul['name']; ?></td>
                    <td><?php echo $ul['type']; ?></td>
                    <td>
                        <?php 
                            foreach($branches as $bl){
                                if($bl['id'] == $ul['branch_id']){
                                    echo $bl['name'];
                                }
                            }
                        ?>
                    </td>
                    <td><?php if($ul['status'] == 1){ echo 'Active'; }else{ echo 'Inactive'; }; ?></td>
                    <td>
                        <?php if($ul['type']!="Super Admin") : ?>
                            <a class='btn btn-primary' href="" data-toggle='modal' data-target='#editUser-<?php echo $ul['user_id']; ?>'><i class="fa-solid fa-edit"></i></a>&nbsp;&nbsp;
                            <a class='btn btn-danger' onclick="return confirm('Press OK to confirm delete user?')" href='<?= base_url('Admincontroller/deleteUser/'.$ul['user_id']); ?>' title='Delete'><i class='fa-solid fa-trash' ></i></a>
                        <?php endif; ?>
                    </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    
    <form action="<?= base_url('Admincontroller/addUser'); ?>" method="post" enctype="multipart/form-data">
        <div id="addUser" class="modal fade" role="dialog">
            <div class="modal-dialog modal-md">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                       <h4>Add New User</h4>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body"> 
                        <table>
                            <tr>
                                <td>Name: </td>
                                <td><input type="text" name="name" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Username: </td>
                                <td><input type="text" name="username" class="form-control" required></td>
                            </tr>
                            <tr>
                                <td>Password: </td>
                                <td>
                                    <input type="password" name="password" id="upassword" class="form-control" required>
                                    <input type="checkbox" id="show-password">
                                    <label for="show-password">Show Password
                                </td>
                            </tr>
                            <tr>
                                <td>Position: </td>
                                <td>
                                    <select name="type" class="form-control" required>
                                        <option value="" selected disabled>-- SELECT --</option> 
                                        <option value="Branch Manager" >Branch Manager</option>
                                        <option value="Room Reservations" >Room Reservations</option>
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Branch: </td>
                                <td>
                                <select name="branch_id" class="form-control" required>
                                    <option value="" selected disabled>-- SELECT --</option> 
                                    <?php foreach($branches as $bl) : ?>
                                        <option value="<?php echo $bl['id']; ?>" ><?php echo $bl['name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                </td>
                            </tr>
                            <tr>
                                <td>Status: </td>
                                <td>
                                    <select name="status" class="form-control" required>
                                        <option value="1" >Active</option>
                                        <option value="0" >Inactive</option>
                                </td>
                            </tr>
                        </table> 
                        
                        
                    </div>

                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <input onclick="return confirm('Press OK to confirm Add.')"  type="submit" value="Add" class="btn btn-primary" name="submit">
                        <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    </div>

                </div>
            </div>
        </div>
    </form>


    <?php foreach($user_list as $ul) : ?>
        <form action="<?= base_url('Admincontroller/updateUser/' . $ul['user_id']); ?>" method="post" enctype="multipart/form-data">
            <div id="editUser-<?php echo $ul['user_id'];?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-md">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">Access Level</h4>
                            <h5><?php echo $ul['name'];?> - <?php 
                            foreach($branches as $bl){
                                if($bl['id'] == $ul['branch_id']){
                                    echo $bl['name'];
                                }
                            }
                        ?></h5>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body"> 
                            <table>
                                <tr>
                                    <td>Name: </td>
                                    <td><input type="text" name="name" class="form-control" value="<?php echo $ul['name']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Username: </td>
                                    <td><input type="text" name="username" class="form-control" value="<?php echo $ul['username']; ?>"></td>
                                </tr>
                                <tr>
                                    <td>Password: </td>
                                    <td>
                                        <input type="password" name="password" id="upassword-<?php echo $ul['user_id'];?>" class="form-control" value="<?php echo $ul['password']; ?>">
                                        <input type="checkbox" id="show-password-<?php echo $ul['user_id'];?>">
                                        <label for="show-password">Show Password
                                    </td>
                                </tr>
                                <tr>
                                    <td>Position: </td>
                                    <td>
                                        <select name="type" class="form-control" >
                                            <option <?= $ul['type'] == 'Branch Manager' ? 'selected=""' : '' ?> value="Branch Manager" >Branch Manager</option>
                                            <option <?= $ul['type'] == 'Room Reservations' ? 'selected=""' : '' ?> value="Room Reservations" >Room Reservations</option>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Branch: </td>
                                    <td>
                                    <select name="branch_id" class="form-control" required>
                                        <?php foreach($branches as $bl) : ?>
                                            <option <?= $bl['id'] == $ul['branch_id'] ? 'selected=""' : '' ?> value="<?php echo $bl['id']; ?>" ><?php echo $bl['name']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Status: </td>
                                    <td>
                                        <select name="status" class="form-control" >
                                            <option <?= $ul['status'] == '1' ? 'selected=""' : '' ?> value="1" >Active</option>
                                            <option <?= $ul['status'] == '0' ? 'selected=""' : '' ?> value="0" >Inactive</option>
                                    </td>
                                </tr>
                            </table> 
                            
                            
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <input onclick="return confirm('Press OK to confirm update.')"  type="submit" value="Update" class="btn btn-primary" name="submit">
                            <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                        </div>

                    </div>
                </div>
            </div>
        </form>
    <?php endforeach; ?>
</div>


<script>
    $( document ).ready(function() {
        $("#show-password").change(function(){
            $(this).prop("checked") ?  $("#upassword").prop("type", "text") : $("#upassword").prop("type", "password");    
        });
        <?php foreach($user_list as $ul) : ?>
            $("#show-password-<?php echo $ul['user_id'];?>").change(function(){
                $(this).prop("checked") ?  $("#upassword-<?php echo $ul['user_id'];?>").prop("type", "text") : $("#upassword-<?php echo $ul['user_id'];?>").prop("type", "password");    
            });
        <?php endforeach; ?>

        // Setup - add a text input to each footer cell
        $('#myTable thead tr').clone(true).appendTo( '#myTable thead' );
        $('#myTable thead tr:eq(1) th').each( function (i) {
            var title = $(this).text();
            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    
            $( 'input', this ).on( 'keyup change', function () {
                if ( table.column(i).search() !== this.value ) {
                    table
                        .column(i)
                        .search( this.value )
                        .draw();
                }
            } );
        } );
    
        var table = $('#myTable').DataTable( {
            dom: 'Bflrtip',
            buttons: [
                'copy', 'csv', 'excel', 'print',
                {
                    extend: 'pdfHtml5',
                    orientation: 'landscape',
                    pageSize: 'LEGAL'
                }
            ],
            orderCellsTop: true,
            fixedHeader: true,
            lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ]
            
        } );
    });
</script>