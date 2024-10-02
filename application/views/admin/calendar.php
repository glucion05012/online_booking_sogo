<div class="content-wrapper">
    <div class="row">
        <div class="width"></div>
            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Start Date:&nbsp;&nbsp;&nbsp;</label>
            <input type="date" class="form-control" onchange="startDateChange()" name="startDate" id="startDate" style="width:20%" />
       </div>

    <table id="myTable" class="table table-responsive table-striped table-bordered table-sm" cellspacing="0" width="100%" >
            <h1><?php if (isset($_SESSION['startDate'])){ echo $_SESSION['startDate']; } ?></h1>       
        <thead>
            <tr>
                <th>Room Name</th>
                <?php
                    // $dateNow = date("F d, Y");
                    if(isset( $_SESSION['startDate'])){
                        $stop_date = $_SESSION['startDate'];
                    }else{
                        $stop_date = date("F d") ;
                    }

                    for ($x = 0; $x <= 9; $x++) {

                        echo "<th>";
                        echo $stop_date;
                        echo "</th>";
                    
                        $stop_date = date('F d', strtotime($stop_date . ' +1 day'));
                    }

                ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach($rooms as $rm) : ?>
                <?php if (isset($_SESSION['branch_name'])) : ?>
                    <!-- $stop_date = date("n/j/Y") ; -->
                    <?php if($rm['branch_id'] == $_SESSION['branch_id']) : ?>
                        <tr class="table-active" style="text-align: center"> 
                            <td><a href="" data-toggle="modal" data-target="#roomAllocationModal<?php echo $rm['id']; ?>"><?php echo $rm['name']; ?></a></td>
                            <?php
                                // $dateNow = date("F d, Y");
                                if(isset( $_SESSION['startDate'])){
                                    $stop_date = $_SESSION['startDate'];
                                }else{
                                    $stop_date = date("F d") ;
                                }

                                for ($x = 0; $x <= 9; $x++) {
                                    echo "<td style='background-color:#FFCCCB'>";
                                    foreach($allocate as $alc){
                                        if($alc['room_id'] == $rm['id']){

                                            $date=date_create($stop_date);
                                            $stop_date = date_format($date,"n/j/Y");
                                            if($alc['date'] == $stop_date){
                                                echo"<div style='background-color:lightgreen'>";
                                                echo $alc['quantity'];
                                                echo"</div>";

                                                
                                            }
                                        }
                                    } 
                                    echo "</td>";

                                    $stop_date = date('n/j/Y', strtotime($stop_date . ' +1 day'));
                                }

                            ?>
                            
                            <!-- <td><i class="fas fa-square-check nav-icon" style="color: green"></i></td>
                            <td><i class="fas fa-square-xmark nav-icon" style="color: red"></i></td> -->
                        </tr>   
                    <?php endif; ?>
                <?php endif; ?>
            <?php endforeach; ?>
        </tbody>
    </table>

    <!-- MODAL FOR ROOM ALLOCATION -->
    <?php foreach($rooms as $rm) : ?>
        <div id="roomAllocationModal<?php echo $rm['id'];?>" class="modal fade" role="dialog">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Room Allocation</h4>
                    <h5>Room Name: <?php echo $rm['name'];?></h5>
                </div>

                <!-- Modal body -->
                <div class="modal-body" style="align-self:center;">  

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="allocation">Room:</label>
                                <input type="text" class="form-control" name="room" value="<?php echo $rm['name'];?>" readonly>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="allocation">Enter Room Allocation:</label>
                                <input type="number" class="form-control" name="allocationcnt" id="allocationcnt<?php echo $rm['id'];?>" min="0" required="">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date_from">From Date:</label>
                                <input type="date" class="form-control from" id="date_from<?php echo $rm['id'];?>" name="date_from" required="" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="date_to">To Date:</label>
                                <input type="date" class="form-control to" id="date_to<?php echo $rm['id'];?>" name="date_to" required="" value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                    </div>
                    
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type='button' id="allocateBtn<?php echo $rm['id'];?>" value="<?php echo $rm['id'];?>" class='btn btn-success' data-dismiss='modal'>Submit</button>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>Close</button>
                </div>

                </div>
            </div>
        </div>
    <?php endforeach; ?>
    <!-- END MODAL FOR ROOM ALLOCATION -->

</div>

<script>
    <?php foreach($rooms as $rm) : ?>
        $(document).on('click', '#allocateBtn<?php echo $rm['id'];?>', function(){ 
            var room_id = $(this).val();
            var base_url = <?php echo json_encode(base_url()); ?>;
            var date_from = $('#date_from<?php echo $rm['id'];?>').val();
            var date_to = $('#date_to<?php echo $rm['id'];?>').val();
            var quantity = $('#allocationcnt<?php echo $rm['id'];?>').val();

            if (confirm('Are you sure you want to allocate room?')) {

                date_from1 = new Date(date_from).toLocaleDateString();
                date_to1 = new Date(date_to).toLocaleDateString();

                date_from = new Date(date_from);
                date_to = new Date(date_to);
                const date = new Date(date_from.getTime());

                const dates = [];

                while (date <= date_to) {
               
                    dates.push(new Date(date));
                    
                    var ndate = new Date(date).toLocaleDateString()

                    $.ajax({
                        data : {
                                    room_id : room_id,
                                    date : ndate,
                                    quantity : quantity
                                }
                        , type: "POST"
                        , url: base_url + "Admincontroller/allocate"
                        , dataType: 'json'
                        , crossOrigin: false
                        , success: function(res) {
                            alert('Room Allocation successfully created.');
                            location.reload();
                        }, 
                        error: function(err) {
                        
                        }
                    });
                    date.setDate(date.getDate() + 1);
                }

            }
            
        location.reload();
        })
    <?php endforeach; ?>


      function startDateChange() {
        var startDate = $('#startDate').val();
        startDate = new Date(startDate).toLocaleDateString();
        var base_url = <?php echo json_encode(base_url()); ?>;

       
        $.ajax({
            type: "POST",
            url: base_url + "admincontroller/startDateSession",
            data: { 
                    startDate : startDate,
                  },
            dataType: 'json',
            success: function (data) {
        location.reload();
            }
        });

        
        location.reload();

      }
</script>