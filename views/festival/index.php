
<style>
    .form-control {
        max-width: 300px;

    }
</style>
<?php date_default_timezone_set('Asia/Bangkok');?>
<div class="container">
    <div class="card m-4">
        <div class="card-body">
            <center>
                <form method="post" action="<?php echo URL ?>festival/search" id="formsearch">
                <div class="form-group">
                    <label for="exampleInputName1">รหัสการจอง</label>
                    <input type="text" name="ticket_id" class="form-control">
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12 " style="text-align:center;">
                        <button type="submit" class="btn btn-primary" style="padding:5px 40px;"> ค้นหา</button>
                    </div>
                </div>
                </form>
            </center>
        </div>
    </div>
</div>

<div class="container" id="showTicket" style="display:none">
    <div class="card m-4">
        <div class="card-body">

				<h3>รหัสการจอง : <span id="serialNumber"></span></h3>
				<p>ราคา : <span id="price"></span></p>
				<h3>รายละเอียดงาน <span id="nameFes"></span></h3>
				<p>จังหวัด : <span id="province"></span></p>
				<p>สถานที่ : <span id="location"></span></p>
				<p>วันที่ : <span id="date"></span></p>

        </div>
    </div>
</div>

<script>
	$(document).ready(function(){
	$("#formsearch").submit(function (e) {
			e.preventDefault();
			var actionurl = e.currentTarget.action;
			$.ajax({
				url: actionurl,
				method: 'post',
				data: $("#formsearch").serialize(),
				success: function (res) {
					if(res.status === "200"){
						$("#showTicket").show();
						var result = res.result;
						$("#serialNumber").html(result.serialNumber);
						$("#price").html(result.price);
						$("#nameFes").html(result.festival.nameFes);
						$("#province").html(result.festival.province);
						$("#location").html(result.festival.location);
						console.log(result.festival.date);
						var strDate = (result.festival.date-(result.festival.date%1000))/1000;
						var date = new Date(result.festival.date);
						$("#date").html(`${date.getDate()}-${date.getMonth()+1}-${date.getFullYear()} ${date.getHours()}:${date.getMinutes()}`);
					}
					else{
						$("#showTicket").hide();
						swal({
						title: 'Error',
						text: "Not found ticket",
						icon: "error",
						})
						$('input').val('');
					}
				},
				error : function(res) {
					$("#showTicket").hide();
						swal({
						title: 'Error',
						text: "Not found ticket",
						icon: "error",
						})
						$('input').val('');
					console.log(res);
				}
			});
		});
	});

</script>