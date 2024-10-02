<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>


<!-- jQuery -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>



<!-- Bootstrap -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<!-- Custom CSS -->
<!-- <link rel="stylesheet" href="http://localhost/Techbrokers_Integrated_System/assets/css/login.css"> -->

<!-- DataTable -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.7.0/js/buttons.print.min.js"></script>

<!-- Table to CSV JQ -->
<script src="http://localhost/Techbrokers_Integrated_System/assets/js/table2csv.js" type="text/javascript"></script>

<!-- Font Awesome Icons -->
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">
<!-- IonIcons -->
<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
<!-- Theme style -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/admin-lte/3.0.5/css/adminlte.min.css">
<!-- Google Font: Source Sans Pro -->
<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

<!-- Charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
</head>
<body>

<table id="myTable" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th scope="col">Reference No</th>
            <th scope="col">Booking Date</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Adults</th>
            <th scope="col">Children</th>
            <th scope="col">Checkin</th>
            <th scope="col">Checkin Time</th>
            <th scope="col">Checkout</th>
            <th scope="col">Checkout Time</th>
            <th scope="col">Branch</th>
            <th scope="col">Room</th>
            <th scope="col">Hours</th>
            <th scope="col">Promo Code</th>
            <th scope="col">Notes</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
        </tr>
    </thead>
    <tbody> 
        <?php if(isset($reserve)) : ?>
            <?php foreach($reserve as $cl) : ?>
                    <td><?php echo $cl['reference']; ?></td>
                    <td><?php echo $cl['bookingdate']; ?></td>
                    <td><?php echo $cl['name']; ?></td>
                    <td><?php echo $cl['email']; ?></td>
                    <td><?php echo $cl['phone']; ?></td>
                    <td><?php echo $cl['adults']; ?></td>
                    <td><?php echo $cl['children']; ?></td>
                    <td><?php echo str_replace("12:00:am","", $cl['checkin']); ?></td>
                    <td><?php echo date("g:i a", strtotime($cl['checkintime'])); ?></td>
                    <td><?php echo str_replace("12:00:am","", $cl['checkout']); ?></td>
                    <td><?php echo date("g:i a", strtotime($cl['checkouttime'])); ?></td>
                    <td><?php 
                    foreach($branches as $br){
                        if($cl['branch'] == $br['id']){
                            echo $br['name']; 
                        }
                    }
                    ?></td>
                    <td><?php echo $cl['room']; ?></td>
                    <td><?php echo $cl['hours']; ?></td>
                    <td><?php echo $cl['promo_code']; ?></td>
                    <td><?php echo $cl['notes']; ?></td>
                    <td><?php echo $cl['amount']; ?></td>
                    
                    <td>
                        <?php 
                            if($cl['status'] == 0){
                                $id = $cl['id'];
                                echo "<button class='btn btn-success' id='checkin' value='$id'>Check In</button> "; 
                            }else{
                                echo 'Closed';
                            }
                        ?>
                    </td>
                </tr>   
                
            <?php endforeach; ?>
        <?php endif; ?>
    
    </tbody>
    <tfoot>
        <tr>
        <th scope="col">Reference No</th>
            <th scope="col">Name</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scope="col">Adults</th>
            <th scope="col">Children</th>
            <th scope="col">Checkin</th>
            <th scope="col">Checkin Time</th>
            <th scope="col">Checkout</th>
            <th scope="col">Checkout Time</th>
            <th scope="col">Branch</th>
            <th scope="col">Room</th>
            <th scope="col">Hours</th>
            <th scope="col">Promo Code</th>
            <th scope="col">Notes</th>
            <th scope="col">Amount</th>
            <th scope="col">Action</th>
        </tr>
    </tfoot>
</table>

</body>
</html>

<script>
    $(document).on('click', '#checkin', function(){ 
        // alert($(this).val());
        if (confirm('Are you sure you want to accept guest?')) {
            var bookid = $(this).val();
            var base_url = <?php echo json_encode(base_url()); ?>;
            $.ajax({
                data : {id : bookid}
                , type: "POST"
                , url: base_url + "Guestcontroller/checkin"
                , dataType: 'json'
                , crossOrigin: false
                , success: function(res) {
                    location.reload();
                }, 
                error: function(err) {
                    location.reload();
                }
            });
        }
        
    });
</script>


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