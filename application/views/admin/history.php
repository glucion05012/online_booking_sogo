<div class="content-wrapper">
    <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" style="text-align:center" >
        <thead>
            <tr>
                <th>ID</th>
                <th>Reference No.</th>
                <th>Date Booked</th>
                <th>Name</th>
                <th>Room</th>
                <th>From date</th>
                <th>To date</th>
                <th>Length of Stay (Days)</th>
                <th>Promo Code</th>
                <th>Amount Paid</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($booking as $bk) : ?>
                <?php if($_SESSION['branch_id'] == 'all') : ?>
                    <?php if($bk['status'] == 2 || $bk['status'] == 3 || $bk['status'] == 4) : ?>
                        <tr class="table-active"> 
                            <td><?php echo $bk['branch_name']; ?></td>
                            <td><?php echo $bk['reference']; ?></td>
                            <td><?php echo $bk['bookingdate']; ?></td>
                            <td><?php echo $bk['name']; ?></td>
                            <td><?php echo $bk['room_name']; ?></td>
                            <td><?php echo $bk['checkin']; ?></td>
                            <td><?php echo $bk['checkout']; ?></td>
                            <td><?php 
                                        $datetime1 = new DateTime($bk['checkin']);
                                        $datetime2 = new DateTime($bk['checkout']);
                                        $difference = $datetime1->diff($datetime2);
                                        
                                        if($difference->d == 0)
                                            echo 1;
                                        else{
                                            echo $difference->d;
                                        } 
                                
                            ?></td>
                            <td><?php echo $bk['promo_code']; ?></td>
                            <td><?php echo $bk['amount']; ?></td>
                            <?php 
                                    if($bk['status'] == 0){
                                        echo '<td style="background-color:lightgreen">Active</td>';
                                    }elseif($bk['status'] == 1){
                                        echo '<td style="background-color:#FED8B1">Checked-in</td>';
                                    }elseif($bk['status'] == 2){
                                        echo '<td style="background-color:#FFCCCB ">Checked-out</td>';
                                    }elseif($bk['status'] == 4){
                                        echo '<td style="background-color:red">Cancelled</td>';
                                    }else{
                                        echo $bk['status'];
                                    }
                                ?>
                            <td>
                                <button type="button" data-toggle='modal' data-target='#infoModal-<?php echo $bk['id']; ?>' value='<?php echo $bk['id']; ?>' class="btn btn-info"><span class="fa fa-info" style="color: #FFF"></span> Info</button>
                            </td>
                        </tr>   
                    <?php endif; ?>
                <?php else : ?>
                    <?php if($bk['branch_id'] == $_SESSION['branch_id']) : ?>
                        <?php if($bk['status'] == 2 || $bk['status'] == 3 || $bk['status'] == 4) : ?>
                            <tr class="table-active"> 
                                <td><?php echo $bk['id']; ?></td>
                                <td><?php echo $bk['reference']; ?></td>
                                <td><?php echo $bk['bookingdate']; ?></td>
                                <td><?php echo $bk['name']; ?></td>
                                <td><?php echo $bk['room_name']; ?></td>
                                <td><?php echo $bk['checkin']; ?></td>
                                <td><?php echo $bk['checkout']; ?></td>
                                <td><?php 
                                            $datetime1 = new DateTime($bk['checkin']);
                                            $datetime2 = new DateTime($bk['checkout']);
                                            $difference = $datetime1->diff($datetime2);
                                            
                                            if($difference->d == 0)
                                                echo 1;
                                            else{
                                                echo $difference->d;
                                            } 
                                    
                                ?></td>
                                <td><?php echo $bk['promo_code']; ?></td>
                                <td><?php echo $bk['amount']; ?></td>
                                <?php 
                                        if($bk['status'] == 0){
                                            echo '<td style="background-color:lightgreen">Active</td>';
                                        }elseif($bk['status'] == 1){
                                            echo '<td style="background-color:#FED8B1">Checked-in</td>';
                                        }elseif($bk['status'] == 2){
                                            echo '<td style="background-color:#FFCCCB ">Checked-out</td>';
                                        }elseif($bk['status'] == 4){
                                            echo '<td style="background-color:red">Cancelled</td>';
                                        }else{
                                            echo $bk['status'];
                                        }
                                    ?>
                                <td>
                                    <?php if($bk['status'] != 4 && $bk['status'] != 1 && $bk['status'] != 2) : ?>
                                        <button type="button" data-toggle='modal' data-target='#cancelModal-<?php echo $bk['id']; ?>' value='<?php echo $bk['id']; ?>' class="btn btn-danger"><span class="fa fa-ban" style="color: #FFF"></span> Cancel</button>
                                    <?php endif; ?>
                                    <?php if($bk['status'] != 1) : ?>
                                        <button type="button" data-toggle='modal' data-target='#recheckinModal-<?php echo $bk['id']; ?>' value='<?php echo $bk['id']; ?>' class="btn btn-success"><span class="fa fa-check" style="color: #FFF"></span> Check-in</button>
                                    <?php endif; ?>
                                    <?php if($bk['status'] != 0 && $bk['status'] != 2 && $bk['status'] != 4) : ?>
                                        <button type="button" data-toggle='modal' data-target='#checkoutModal-<?php echo $bk['id']; ?>' value='<?php echo $bk['id']; ?>' class="btn btn-danger"><span class="fa fa-exit" style="color: #FFF"></span> Check-out</button>
                                    <?php endif; ?>
                                        <button type="button" data-toggle='modal' data-target='#infoModal-<?php echo $bk['id']; ?>' value='<?php echo $bk['id']; ?>' class="btn btn-info"><span class="fa fa-info" style="color: #FFF"></span> Info</button>
                                    
                                </td>
                            </tr>   
                        <?php endif; ?>
                    <?php endif; ?>
                <?php endif; ?>


                
            <?php endforeach; ?>
        </tbody>
    </table>


    <!-- MODAL FOR CANCEL -->
    <?php foreach($booking as $bk) : ?>
        <div id="cancelModal-<?php echo $bk['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Cancel Booking</h4>
                    <h5>Reference No. <?php echo $bk['reference'];?></h5>
                </div>

                <form action="<?= base_url('Admincontroller/cancel'); ?>" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  

                   <h1>Reason for Cancellation</h1>
                   <input type="hidden" name="booking_id" value="<?php echo $bk['id'];?>" >
                   <textarea name="reasonCancel" rows="5" cols="35" style="width: 95%" class="form-control" ></textarea>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    <button onclick="return confirm('Press OK to confirm cancellation.')"  type="submit" value="Process" class="btn btn-primary" name="submit">Submit</button>
                </div>
                </form>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- END MODAL FOR CANCEL -->

    <!-- MODAL FOR INFO -->
    <?php foreach($booking as $bk) : ?>
        <div id="infoModal-<?php echo $bk['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">View Booking</h4>
                    <h5>Reference No. <?php echo $bk['reference'];?></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  

                   <h5>Booking Details:</h5>
                   <div class="card-body floating-label">
                        <div id="editUserValidation" class="alert alert-danger" hidden="">
                        </div>

                        <h4><b>Booking Details:</b></h4>

                        <div class="form-group">
                            <label for="vids">Reference No:</label>
                            <input type="text" class="form-control" name="vids" id="vids" value="<?php echo $bk['reference'];?>" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="vids">Room:</label>
                            <input type="text" class="form-control" name="vids" id="vids" value="<?php echo $bk['room_name'];?>" autocomplete="off" readonly="">
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password3">Adults:</label>
                                    <input type="text" value="<?php echo $bk['adults']; ?>" class="form-control from" name="vfromdate" readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password4">Children:</label>
                                    <input type="text" value="<?php echo $bk['children']; ?>" class="form-control from" name="vtodate" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password3">From Date:</label>
                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($bk['checkin'])); ?>" class="form-control from" name="vfromdate" readonly="">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="password4">To Date:</label>
                                    <input type="date" value="<?php echo date('Y-m-d', strtotime($bk['checkout'])); ?>" class="form-control from" name="vtodate" readonly="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="amount_paid">Amount Paid:</label>
                            <input type="text" class="form-control" name="amount_paid" id="amount_paid" value="<?php echo $bk['amount'];?>" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="amount_paid">Booking Date:</label>
                            <input type="text" class="form-control" name="amount_paid" id="amount_paid" value="<?php echo $bk['bookingdate'];?>" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="amount_paid">Checkin Date:</label>
                            <input type="text" class="form-control" name="amount_paid" id="amount_paid" value="<?php echo $bk['checkindate'];?>" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="booking_notes">Notes:</label>
                            <textarea class="form-control" rows="5" name="booking_notes" id="booking_notes" autocomplete="off" readonly=""><?php echo $bk['notes'];?></textarea>
                        </div>

                        <hr>
                        <h4><b>Guest Details:</b></h4>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="username2">Name:</label>
                                    <input type="text" class="form-control" name="vfname" value="<?php echo $bk['name'];?>" autocomplete="off" readonly="">
                                </div>
                            </div>
                           
                        </div>

                        <div class="form-group">
                            <label for="view_email">Email:</label>
                            <input type="text" class="form-control" name="view_email" value="<?php echo $bk['email'];?>" autocomplete="off" readonly="">
                        </div>

                        <div class="form-group">
                            <label for="view_contact">Contact No:</label>
                            <input type="text" class="form-control" name="view_contact" value="<?php echo $bk['phone'];?>" autocomplete="off" readonly="">
                        </div>

                    </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- END MODAL FOR INFO -->

    <!-- MODAL FOR CHECKIN -->
    <?php foreach($booking as $bk) : ?>
        <div id="recheckinModal-<?php echo $bk['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Checkin Booking</h4>
                    <h5>Reference No. <?php echo $bk['reference'];?></h5>
                </div>

                <form action="<?= base_url('Admincontroller/recheckin'); ?>" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  

                <div style="text-align:center">
                   <h1>Checkin Guest: <br><div style="color:red"><?php echo $bk['name'];?></div><br>
                   Reference No. <br><div style="color:red"><?php echo $bk['reference'];?></div></h1>
                   <input type="hidden" name="booking_id" value="<?php echo $bk['id'];?>" >
                   <input type="hidden" name="room_id" value="<?php echo $bk['room_id'];?>" >
                   <input type="hidden" name="checkin" value="<?php echo $bk['checkin'];?>" >
                   <input type="hidden" name="checkout" value="<?php echo $bk['checkout'];?>" >
                </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    <button onclick="return confirm('Press OK to confirm checkin.')"  type="submit" value="Process" class="btn btn-success" name="submit">CHECK-IN</button>
                </div>
                </form>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- END MODAL FOR CHECKIN -->

    <!-- MODAL FOR CHECKOUT -->
    <?php foreach($booking as $bk) : ?>
        <div id="checkoutModal-<?php echo $bk['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Checkout Booking</h4>
                    <h5>Reference No. <?php echo $bk['reference'];?></h5>
                </div>

                <form action="<?= base_url('Admincontroller/checkout'); ?>" method="post" enctype="multipart/form-data">
                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  

                <div style="text-align:center">
                   <h1>Checkout Guest: <br><div style="color:red"><?php echo $bk['name'];?></div><br>
                   Reference No. <br><div style="color:red"><?php echo $bk['reference'];?></div></h1>
                   <input type="hidden" name="booking_id" value="<?php echo $bk['id'];?>" >
                   <input type="hidden" name="room_id" value="<?php echo $bk['room_id'];?>" >
                   <input type="hidden" name="checkin" value="<?php echo $bk['checkin'];?>" >
                   <input type="hidden" name="checkout" value="<?php echo $bk['checkout'];?>" >
                </div>

                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                    <button onclick="return confirm('Press OK to confirm checkout.')"  type="submit" value="Process" class="btn btn-success" name="submit">CHECK-OUT</button>
                </div>
                </form>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- END MODAL FOR CHECKOUT -->
</div>


<script>
    $( document ).ready(function() {
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