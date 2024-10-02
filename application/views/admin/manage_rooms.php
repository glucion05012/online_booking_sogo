<div class="content-wrapper">

<div class='successmsg'>
    <?php if($this->session->flashdata('successmsg')): ?> 
        <p><?php echo $this->session->flashdata('successmsg'); ?></p>
    <?php endif; ?>
</div>
        <a class="btn btn-success create-btn" href="" data-toggle='modal' data-target='#addRoomModal'><i class="fas fa-bed nav-icon"></i> Add Room</a>

        <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Room Name</th>
                    <th>Room Pax</th>
                    <th>Room Quantity</th>
                    <th>Room Price</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rooms as $rm) : ?>
                    <?php if (isset($_SESSION['branch_name'])) : ?>
                    
                        <?php if($rm['branch_id'] == $_SESSION['branch_id']) : ?>
                            <tr class="table-active"> 
                                <td><?php echo $rm['id']; ?></td>
                                <td><?php echo $rm['name']; ?></td>
                                <td><?php echo $rm['pax']; ?></td>
                                <td><?php echo $rm['quantity']; ?></td>
                                <td><?php echo $rm['price']; ?></td>
                                <td>
                                    <a href="" data-toggle='modal' data-target='#editRoomModal-<?php echo $rm['id']; ?>' value="<?php echo $rm['id']; ?>"><i class="fa fa-edit"></i></a> &nbsp;
                                    <a onclick="return confirm('Press OK to confirm archive user?')" href="<?php echo base_url('admincontroller/delete_room/'. $rm['id']); ?>"><i style="color:red" class="fa fa-trash"></i></a>
                                </td>
                            </tr>   
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
            </tbody>
        </table>

</div>

     <!-- addRoomModal -->
    <div id="addRoomModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">

            <!-- Modal content-->
            <form action="<?= base_url('admincontroller/add_room'); ?>" method="post" enctype="multipart/form-data">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title"><i class="fas fa-bed nav-icon"></i> Add Room</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="card-body floating-label">
                            <div id="addRoomValidation" class="alert alert-danger" hidden>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="name">Room Name:</label>
                                        <input type="text" class="form-control" name="name" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Bed:</label>
                                        <input type="text" class="form-control" name="bed" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="name">Room Size:</label>
                                        <input type="text" class="form-control" name="size" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="description">Room Description:</label>
                                        <textarea class="form-control" name="description" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Room Inclusions:</label>
                                        <textarea class="form-control" name="inclusions" id="inclusions" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="price">Room Regular Price:</label>
                                        <input type="number" min="1" max="999999" class="form-control" name="price" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="dprice">Room 12 hour Price:</label>
                                        <input type="number" min="0" max="999999" class="form-control" name="dprice" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="quantity">Room Quantity:</label>
                                        <input type="number" min="1" max="999" class="form-control" name="quantity" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pax">Room pax:</label>
                                        <input type="number" min="0" max="100" class="form-control" name="pax" autocomplete="off" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="pax">Room pax (Children):</label>
                                        <input type="number" min="0" max="100" class="form-control" name="cpax" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                </div>
                            </div>


                        </div>
                    </div>
                    <div class=" modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i id="submits"></i> Submit</button>
                    </div>
                </div>
            </form>

        </div>
    </div>

     <!-- editRoomModal -->
     <?php foreach($rooms as $rm) : ?>    
        <?php if($rm['branch_id'] == $_SESSION['branch_id']) : ?>            
            <div id="editRoomModal-<?php echo $rm['id']; ?>" class="modal fade" role="dialog">
                <div class="modal-dialog modal-lg">

                    <!-- Modal content-->
                    <form action="<?= base_url('admincontroller/update_room/'.$rm['id']); ?>" method="post" enctype="multipart/form-data">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title"><i class="fas fa-bed nav-icon"></i> Eddit Room - <?php echo $rm['name']; ?></h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body floating-label">
                                    <div id="addRoomValidation" class="alert alert-danger" hidden>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="name">Room Name:</label>
                                                <input type="text" class="form-control" name="name" autocomplete="off" value="<?php echo $rm['name']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Bed:</label>
                                                <input type="text" class="form-control" name="bed" autocomplete="off" value="<?php echo $rm['bed']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="name">Room Size:</label>
                                                <input type="text" class="form-control" name="size" autocomplete="off" value="<?php echo $rm['size']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label for="description">Room Description:</label>
                                                <textarea class="form-control" name="description" rows="5"><?php echo $rm['description']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Room Inclusions:</label>
                                                <textarea class="form-control" name="inclusions" id="inclusions" rows="5"><?php echo $rm['inclusions']; ?></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="price">Room Regular Price:</label>
                                                <input type="number" min="1" max="999999" class="form-control" name="price" autocomplete="off" value="<?php echo $rm['price']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="dprice">Room 12 hour Price:</label>
                                                <input type="number" min="0" max="999999" class="form-control" name="dprice" value="<?php echo $rm['discounted_price']; ?>" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="quantity">Room Quantity:</label>
                                                <input type="number" min="1" max="999" class="form-control" name="quantity" autocomplete="off" value="<?php echo $rm['quantity']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pax">Room pax:</label>
                                                <input type="number" min="0" max="100" class="form-control" name="pax" autocomplete="off" value="<?php echo $rm['pax']; ?>" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label for="pax">Room pax (Children):</label>
                                                <input type="number" min="0" max="100" class="form-control" name="cpax" autocomplete="off" value="<?php echo $rm['pax_children']; ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                        </div>
                                    </div>


                                </div>
                            </div>
                            <div class=" modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success"><i id="submits"></i> Submit</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        <?php endif; ?>
    <?php endforeach; ?>

<script>
$(document).ready(function() {
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
            'copy', 'csv', 'excel', 'pdf', 'print'
        ],
        orderCellsTop: true,
        fixedHeader: true,
        lengthMenu: [ [10, 25, 50, -1], [10, 25, 50, "All"] ],
        
    } );
} );
</script>

