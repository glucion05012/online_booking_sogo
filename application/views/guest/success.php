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
</style>

<!-- --------------- header --------------- -->
<div class="container" style="background-image: url('https://www.hotelsogo.com/images/bg11.jpg'); padding-top: 2rem">
  
<div style="margin:5rem; text-decoration:none; text-align: center">
  <h4 style="color:black !important; text-align: center; margin:0px">WELCOME TO</h4>
  <h1 style="color:red !important; text-align: center; font-size: 100px; margin:0px">HOTEL SOGO</h1>
  <h5 class="body" style="color:black; margin:0px !important">for inquiry call</h5>
  <h2 style="color:red; margin:0px !important"> 87900-900</h2>
  <h2 class="number font-arial mb-4" style="color:black; margin:0px !important">SO CLEAN... SO GOOD!</h2>

  
  <h1 style="color:black !important; text-align: center">Success</h1>

<!-- --------------- form --------------- -->
<p>Please present Reference No. to the front desk.</p>
    <?php foreach($reserve as $rv) : ?>
        <h1>Reference No.: <p style="color: red; font-size: 50px"><?php echo $rv['reference']; ?></p></h1>
    <?php endforeach; ?>
</div>