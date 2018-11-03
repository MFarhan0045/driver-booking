<?php
	include 'header.php';
?>
<div class="card card-body bg-light">

    <h2 class="text-center">Add a new Administrator</h2>
	<hr>
     <form>
          <div class="form-group row">
          	<label class="col-sm-2 col-form-label">First Name</label>
		<div class="col-sm-10">
          	   <input type="text" class="form-control" name="Firstname" required="">
         	</div>  
	   </div>     	

	   <div class="form-group row">
          	<label class="col-sm-2 col-form-label">Last Name</label>
		<div class="col-sm-10">
          	   <input type="text" class="form-control" name="Lastname" required="">
         	</div>  
	   </div>     

	   <div class="form-group row">
          	<label class="col-sm-2 col-form-label">Username</label>
		<div class="col-sm-10">
          	   <input type="text" class="form-control" name="username" required="">
         	</div>  
	   </div>  

   	<div class="form-group row">
          	<label class="col-sm-2 col-form-label">Email</label>
		<div class="col-sm-10">
          	   <input type="email" class="form-control" name="Email" required="">
         	</div>  
	   </div>  	     
	     
  	<div class="form-group row">
          	<label class="col-sm-2 col-form-label">Password</label>
		<div class="col-sm-10">
          	   <input type="password" class="form-control" name="password" required="">
         	</div>  
	   </div>  
	     
	  <div class="form-group row">
          	<label class="col-sm-2 col-form-label">Confirm Password</label>
		<div class="col-sm-10">
          	   <input type="password" class="form-control" name="Conpassword" required="">
         	</div>  
	   </div>  
	
	   <div class="form-group row">
          	<label class="col-sm-2 col-form-label">Mobile Number</label>
		<div class="col-sm-10">
			<input type="tel" class="form-control" name="mobileNo" placeholder="1234567890" pattern="[0-9]{10}" required />
         	</div>  
	   </div>

          <div class="form-group row">
          	   <button type="submit" name="Register" id="areg_button" class="btn btn-success btn-block">Submit</button>
          </div>
		<br> <div class="text-center" id="areg_status"></div>
	    </fieldset>
 </form>
 <a href="/admin.php" class="btn btn-info">Back to dashboard</a>
 </div>
 
<script type="text/javascript">
j(document).ready(function () {
    j('#areg_button').click(function (e) {

	e.preventDefault();

	if(!j(this).closest('form')[0].checkValidity()){
		return false;
	} 
	
	var firstname = j("input[name=Firstname]").val();
	var lastname = j("input[name=Lastname]").val();
	var username = j("input[name=username]").val();
	var email = j("input[name=Email]").val();
	var password = j("input[name=password]").val();
	var conpasswd = j("input[name=Conpassword]").val();
	var mobileNo = j("input[name=mobileNo]").val();

	j('input').attr('disabled', true);

	j.ajax({
	   type: "POST",
	   dataType: 'json',
	   url: "new_admin_process.php",
	   data: 'Firstname='+ firstname +'&Lastname='+ lastname +'&username='+ username +'&Email='+ email +'&password='+ password +'&Conpassword='+ conpasswd +'&mobileNo='+ mobileNo +'&register=true&json=true',
	   cache: false,
	   success: function(data){
				if(data.result=="error"){
					j("#dreg_status").html('<div class="alert alert-warning">'+ data.message +'</div>').fadeIn("slow");
					j('input').attr('disabled', false);
				}
				if(data.result=="success"){
					j("#dreg_status").html('<div class="alert alert-success">'+ data.message +'</div>').fadeIn("slow");
				}
			},
		error: function(jqXHR,error, errorThrown){
			j("#dreg_status").html('<div class="alert alert-danger">OH! :O There was a unexpected error :(</div>').fadeIn("slow");
			j('input').attr('disabled', false);
		}
		});
	});
});
</script>
<?php
	include 'footer.php';
?>
