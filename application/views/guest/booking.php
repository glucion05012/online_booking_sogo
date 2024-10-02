<style>
    div.elem-group {
    margin: 20px 0;
    }

    div.elem-group.inlined {
    width: 49%;
    display: inline-block;
    float: left;
    margin-left: 1%;
    }

    label {
    display: block;
    font-family: 'Nanum Gothic';
    padding-bottom: 10px;
    font-size: 1.25em;
    }

    input, select, textarea {
    border-radius: 2px;
    border: px solid #777;
    box-sizing: border-box;
    font-size: 1.25em;
    font-family: 'Nanum Gothic';
    width: 50%;
    padding: 10px;
    }

    div.elem-group.inlined input {
    width: 95%;
    display: inline-block;
    }

    textarea {
    height: 250px;
    }

    hr {
    border: 1px dotted #ccc;
    }

    button {
    height: 50px;
    background: orange;
    border: none;
    color: white;
    font-size: 1.25em;
    font-family: 'Nanum Gothic';
    border-radius: 4px;
    cursor: pointer;
    }

    button:hover {
    border: 2px solid black;
    }

    
    /* Style the tab */
    .tab {
      overflow: hidden;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
    }

    /* Style the tab content */
    .tabcontent {
      display: none;
      padding: 6px 12px;
      border: 1px solid #ccc;
      border-top: none;
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://momentjs.com/downloads/moment-with-locales.js"></script>

<!--BOOTSTRAP-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  <!-- Style CSS -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>css/style.css">
    
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url()."assets/"; ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <!-- jQuery -->
  <script src="<?php echo base_url()."assets/"; ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>



<!-- --------------- header --------------- -->
<div class="container" style="background-image: url('https://www.hotelsogo.com/images/bg11.jpg'); padding-top: 2rem">
  
<div style="margin:5rem; text-decoration:none; text-align: center">

<!-- <h1 style="color:red !important; text-align: center; font-size: 50px; margin:0px"><i>TESTING PURPOSES ONLY!!!</i></h1> -->


  <h4 style="color:black !important; text-align: center; margin:0px">WELCOME TO</h4>
  <h1 style="color:red !important; text-align: center; font-size: 100px; margin:0px">HOTEL SOGO</h1>
  <h5 class="body" style="color:black; margin:0px !important">for inquiry call</h5>
  <h2 style="color:red; margin:0px !important"> 87900-900</h2>
  <h2 class="number font-arial mb-4" style="color:black; margin:0px !important">SO CLEAN... SO GOOD!</h2>

  
  <h1 style="color:black !important; text-align: center">Room Reservation</h1>
  


  <!-- --------------- form --------------- -->
  <form action="<?= base_url('guestcontroller/reserve'); ?>" method="post" enctype="multipart/form-data">

    <div id="gdet" class="tabcontent">
      <div class="elem-group">
        <label for="name">Your Name</label>
        <input type="text" id="name" name="name" pattern=[A-Z\sa-z]{3,20} required>
      </div>
      <div class="elem-group">
        <label for="email">Your E-mail</label>
        <input type="email" id="email" name="email" required>
      </div>
      <div class="elem-group">
        <label for="phone">Your Phone</label>
        <input type="text" id="phone" name="phone">
      </div>
      <hr>
      <!-- <div class="elem-group inlined">
        <label for="adult">Adults</label>
        <input type="number" id="adult" name="adults" min="1" required>
      </div>
      <div class="elem-group inlined">
        <label for="child">Children</label>
        <input type="number" id="child" name="children" min="0" required>
      </div> -->

      <button class="tablinks btn btn-danger" id="cidetbtn"  onclick="openCity(event, 'cidet')">Previous</button>
      <button type="submit" class="btn btn-success">Reserve</button>
   
    </div>


    <div id="cidet" class="tabcontent">
      <div class="elem-group inlined">
        <label for="checkin-date">Check-in Date</label>
        <input type="date" id="checkin-date" name="checkin" required>
      </div>
      
      <div class="elem-group inlined">
        <label for="checkout-date">Check-out Date</label>
        <input type="date" id="checkout-date" name="checkout" required>
      </div>

      
      <!-- <div class="elem-group inlined">
        <label for="checkintime">Check-in Time</label>
        <input type="time" id="checkintime" name="checkintime" required>
      </div>

      
      <div class="elem-group inlined">
        <label for="checkouttime">Check-out Time</label>
        <input type="time" id="checkouttime" name="checkouttime" readonly>
      </div> -->

      <div class="elem-group ">
        <a href="http://hotelsogo.com/branches" target="_blank">Check Rates</a>
      </div>

      <div class="elem-group">
        <label for="room-selection">Select Branch</label>
        <select name="branch" id="branch" required>
          <option value="" selected disabled>-- SELECT --</option>
          <?php foreach($branches as $br) : ?>
              <option value="<?= $br['id']; ?>" ><?= $br['name']; ?></option>
          <?php endforeach; ?>
        </select>
      </div>

      <div class="elem-group">
        <label for="room-selection">Select Room</label>
        <select  name="room" id="room" required>
          <option value="" selected disabled>-- SELECT --</option>
        </select>
      </div>

      <div id="roomlist">
      
      </div>

      <div class="elem-group">
        <label for="room-selection">Hours</label>
        <select name="hours" id="hours" >
            <option value="" selected disabled>-- SELECT --</option>
            <option value="12 Hours">12 Hours</option>
            <option value="24 Hours">24 Hours</option>
        </select>
      </div>

      <!-- <div class="elem-group">
        <label for="name">Promo Code</label>
        <input type="text" id="name" name="promo_code">
      </div> -->

      <hr>
      <div class="elem-group">
        <label for="message">Notes</label>
        <textarea id="message" name="notes" placeholder="Tell us anything else that might be important." ></textarea>
      </div>

      <div class="elem-group">
        <label for="message" style="color:black">Total amount to be paid: </label>
        <p style="font-size:50px" id="amount"><b></b></p>
        <input type="hidden" id="amount2" name="amount2">
      </div>
      
      <button class="tablinks btn btn-success" id="gdetbtn" onclick="openCity(event, 'gdet')">Next</button>
    </div>

   
  
    
  </form>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DISCLAIMER</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          
        <p>
            Thank you for your interest in our company. We are committed to maintaining the privacy of your personal information. Any personal information you provide us will be used only in accordance with this Privacy Notice which can be found at this
        </p>
        <a target="_blank" href="<?= base_url('guestcontroller/disclaimer'); ?>">
          link
        </a>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
</div>


<script type="text/javascript">
    $(window).on('load', function() {
      $('#cidetbtn').click();
        $('#exampleModal').modal('show');
    });

    $(document).ready(function () {
      function datediff(first, second) {        
              return Math.round((second - first) / (1000 * 60 * 60 * 24));
      }
      function parseDate(str) {
          var mdy = str.split('/');
          return new Date(mdy[2], mdy[0] - 1, mdy[1]);
      }
      
      $('#branch, #checkin-date, #checkout-date').on('change', function() {
          // alert($('#branch').val());
          $('#room').empty();
          $('#roomlist').empty();
          $('#amount').empty();
          $('#amount2').empty();

          var branch_id = $('#branch').val();
          var base_url = <?php echo json_encode(base_url()); ?>;

          var date_from = ($('#checkin-date').val());
          var date_to = ($('#checkout-date').val());

          date_from1 = new Date(date_from).toLocaleDateString();
          date_to1 = new Date(date_to).toLocaleDateString();

          date_from = new Date(date_from);
          date_to = new Date(date_to);
          const date = new Date(date_from.getTime());

          date_from = new Date(date_from).toLocaleDateString();
          date_to = new Date(date_to).toLocaleDateString();

          const dates = [];

          var resroomcnt;
          var resroomid;
          var resroomname;

          $.ajax({
              data : {
                        branch_id : branch_id,
                        date_from : date_from,
                        date_to : date_to,
                      }
              , type: "POST"
              , url: base_url + "Admincontroller/checkDate"
              , dataType: 'json'
              , crossOrigin: false
              , success: function(res) {
                 // alert(JSON.stringify(res[i]))
                for (let i = 0; i < res.length; i++) {
                  resroomcnt = JSON.stringify(res[i]['count']);  
                  resroomcnt = resroomcnt.toString().replace(/"/g, "");

                  resroomid = JSON.stringify(res[i]['room_id']);  
                  resroomid = resroomid.toString().replace(/"/g, "");

                  resroomname = JSON.stringify(res[i]['name']);  
                  resroomname = resroomname.toString().replace(/"/g, "");

                  var resroomqty = JSON.stringify(res[i]['quantity']);  
                  resroomqty = resroomqty.toString().replace(/"/g, "");

                  var resroomdate = JSON.stringify(res[i]['date']);  
                  resroomdate = resroomdate.toString().replace(/"/g, "");
                  
                  var dtedif = datediff(parseDate(date_from), parseDate(date_to));
                  dtedif = dtedif+1;
                  
                    if(dtedif <= resroomcnt){
                      var isExists=false;
                      $("#room > option").each(function(){
                        var val=$(this).val();
                        if(val==resroomid)
                          isExists=true;
                      }).val()
                      if (isExists) {
                          // alert('already exists in the table');
                      } else {
                        // $('#roomlist').append('<table border="solid black 2px"><tr><td>'+resroomid+'</td><td>'+resroomname+'</td><td>'+resroomdate+'</td><td>'+resroomcnt+'</td><td>'+resroomqty+'</td></tr></table>');
                        
                        $("#room").append('<option value='+resroomid+'>'+resroomname+'</option>');
                        
                      }
                      
                    }
                  
                }

                getRate();
              }, 
              error: function(err) {
                alert('error: '+JSON.stringify(err))  
              }
          });
          
      })

      $('#room').on('change', function() {
        getRate();
        
      })

      $('#checkin-date, #checkout-date').on('change', function() {
        checkin = $('#checkin-date').val();
        checkout = $('#checkout-date').val();
        if( checkin != checkout ){
          $('#hours').val("24 Hours").attr("disabled", true);
        }else{
          
          $('#hours').attr("disabled", false);
        }
          getRate();
          
      })

      $('#hours').on('change', function(){
        var hr = $('#hours').val();
        if(hr == "24 Hours"){
          getRate();
        }else{
          $('#amount').empty();
          $('#amount2').empty();
          var room_id = $('#room').val();
          var base_url = <?php echo json_encode(base_url()); ?>;
          
          $.ajax({
                data : {
                          room_id : room_id,
                        }
                , type: "POST"
                , url: base_url + "Admincontroller/roomInfo"
                , dataType: 'json'
                , crossOrigin: false
                , success: function(res) {
                  //  alert(JSON.stringify(res))
                  
                    var resroomprice12 = JSON.stringify(res[0]['discounted_price']);
                    resroomprice12 = resroomprice12.toString().replace(/"/g, "");  

                    $("#amount").append('<div>₱ '+resroomprice12.toLocaleString()+'</div>');
                    $("#amount2").val(resroomprice12.toLocaleString());
                      
                }, 
                error: function(err) {
                  alert('error: '+JSON.stringify(err))  
                }
            });
        }
        
      });

      function getRate(){
        $('#amount').empty();
        $('#amount2').empty();
        // alert($('#room').val());
        var room_id = $('#room').val();
        var base_url = <?php echo json_encode(base_url()); ?>;

        $.ajax({
              data : {
                        room_id : room_id,
                      }
              , type: "POST"
              , url: base_url + "Admincontroller/roomInfo"
              , dataType: 'json'
              , crossOrigin: false
              , success: function(res) {
                //  alert(JSON.stringify(res))
                
                  var resroomprice12 = JSON.stringify(res[0]['discounted_price']);
                  resroomprice12 = resroomprice12.toString().replace(/"/g, "");  

                  var resroomprice = JSON.stringify(res[0]['price']);  
                  resroomprice = resroomprice.toString().replace(/"/g, "");


                  var date_from = ($('#checkin-date').val());
                  var date_to = ($('#checkout-date').val());
                  date_from = new Date(date_from).toLocaleDateString();
                  date_to = new Date(date_to).toLocaleDateString();

                  var dtedif = datediff(parseDate(date_from), parseDate(date_to));
                  dtedif = dtedif;

                  // alert(date_from)
                  if(dtedif == 0){
                    resroomprice = parseFloat(resroomprice);
                  }else{
                    resroomprice = parseFloat(resroomprice) * parseInt(dtedif);
                  }
                    
                    $("#amount").append('<div>₱ '+resroomprice.toLocaleString()+'</div>');
                    $("#amount2").val(resroomprice.toLocaleString());
                    
               

              }, 
              error: function(err) {
                alert('error: '+JSON.stringify(err))  
              }
          });

      }
    });

   

    function openCity(evt, cityName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(cityName).style.display = "block";
      evt.currentTarget.className += " active";
    }

</script>

<script type="text/javascript">
$(function(){
    var dtToday = new Date();
 
    var month = dtToday.getMonth() + 1;
    var day = dtToday.getDate() + 1;
    var year = dtToday.getFullYear();
    if(month < 10)
        month = '0' + month.toString();
    if(day < 10)
     day = '0' + day.toString();
    var maxDate = year + '-' + month + '-' + day;
    $('#checkin-date').attr('min', maxDate);
    $('#checkout-date').attr('min', maxDate);
});
</script>