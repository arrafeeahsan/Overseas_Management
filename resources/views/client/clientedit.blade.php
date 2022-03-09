<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Client Edit</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>

	<div class="container pt-5">
		<form id="clientform">
		<!-- @csrf -->
		  <div class="form-group">
		    <label for="clientName">Name</label>
		    <input type="text" name="clientname" id="clientname" class="form-control"   placeholder="Enter your name" value="{{$client->client_name}}">
		  </div>

		  <div class="form-group pt-3">
		    <label for="clientFatherName">Father's Name</label>
		    <input type="text" name="clientfather" id="clientfather" class="form-control"  placeholder="Enter your father's name" value="{{$client->client_father}}">
		  </div>

		  <div class="form-group pt-3">
		    <label for="clientAddress">Address</label>
		    <input type="text" name="clientaddress" id="clientaddress" class="form-control"  placeholder="Enter your address" value="{{$client->client_address}}">
		  </div>

		  <div class="form-group pt-3">
		    <label for="clientPhone">Phone Number</label>
		    <input type="text" name="clientphone" id="clientphone" class="form-control" placeholder="Enter your phone number" value="{{$client->client_phone}}">
		  </div>

		  <div class="form-group pt-3">
		    <label for="ClientNationalID">National ID</label>
		    <input type="text" name="clientnid" id="clientnid" class="form-control"  placeholder="Enter your national ID number" value="{{$client->client_nid}}">
		  </div>

		  <div class="form-group pt-3">
		    <label for="clientDob">Birth Date</label>
		    <input type="date" name="clientdob" id="clientdob" class="form-control" value="{{$client->client_dob}}">
		  </div>

		  <div class="form-group py-3">
		    <label for="clientPp">Profile Picture</label>
		    <input type="file" name="clientpp" id="clientpp" class="form-control" value="{{$client->client_pp}}">
		  </div>

		  <button type="submit" class="btn btn-outline-primary" id="update_data">Update</button>
		

		</form>
	</div>	


	<script type="text/javascript">









		
		$(document).ready(function(){
		    $('#clientform').on("submit", function(e) { 
		    	e.preventDefault();

		        var url = "{{URL('client-edit/'.$client->id)}}";
		        var id= 
				$.ajax({
					url: url,
					type: "POST",
					cache: false,
					data:{
		                _token:'{{ csrf_token() }}',
						type: 3,
						clientname: $('#clientname').val(),
						clientfather: $('#clientfather').val(),
						clientaddress: $('#clientaddress').val(),
						clientphone: $('#clientphone').val(),
						clientnid: $('#clientnid').val(),
						clientdob: $('#clientdob').val(),
						clientpp: $('#clientpp').val()
					},
					success:function(response){
		    			console.log(response);
		    		},
				});
			}); 
		});
	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>