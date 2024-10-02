<div class="content-wrapper">
<h1>This is dashboard.</h1>
</div>
<script>
$( document ).ready(function() {
        // alert(name);
        var branch_id = $('#branches').find(":selected").val();
        var branch_name = $('#branches').find(":selected").text();
        var base_url = <?php echo json_encode(base_url()); ?>;

        $.ajax({
            type: "POST",
            url: base_url + "admincontroller/branchSession",
            data: { 
                    branch_id : branch_id,
                    branch_name : branch_name
                  },
            dataType: 'json',
            success: function (data) {
            }
        });

    });
</script>