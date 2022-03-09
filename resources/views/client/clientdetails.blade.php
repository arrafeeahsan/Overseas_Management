<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Client Details</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.2/css/jquery.dataTables.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

	<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.11.2/js/jquery.dataTables.js"></script>

	<script type="text/javascript"> 
			$(document).ready( function () {
    			$('#table_id').DataTable();
			} );
	</script>

</head>
<body>
	<div class="pt-5">
		<div class="container border pt-5">
			<table id="details_table" class="table table-bordered">
		        <thead>
		            <tr>
		                <th scope="col">ID</th>
		                <th scope="col">Name</th>
		                <th scope="col">Father's name</th>
		                <th scope="col">Address</th>
		                <th scope="col">Phone</th>
		                <th scope="col">National NID</th>
		                <th scope="col">Date of Birth (yy-mm-dd)</th>
		                
		            </tr>
		        </thead>
		        <tbody>
		        	
		        	
		        	
		        </tbody>
	    	</table>
		</div>
	</div>

	<script type="text/javascript">
		$.ajax({
			url: 'client-details/'+id,
			type: 'get',
			dataType: 'json',
			success: function(response){

				var len = 0;
				$('#details_table tbody').empty(); //empty <tbody>
				if(response['data'] != null){
					len = response['data'].length;
				}

				if(len > 0){
					for (var i=0; i<len; i++){
						var id = response['data'][i].id;
						var name = response['data'][i].client_name;
						var fathername = response['data'][i].client_father;
						var address = response['data'][i].address;
						var phone = response['data'][i].client_phone;
						var nid = response['data'][i].client_nid;
						var dob = response['data'][i].client_dob;

						var tr_str = "<tr>" +
                   		"<td align='center'>" + id + "</td>" +
                   		"<td align='center'>" + name + "</td>" +
                   		"<td align='center'>" + fathername + "</td>" +
                   		"<td align='center'>" + address + "</td>" + 
                   		"<td align='center'>" + phone + "</td>" + 
                   		"<td align='center'>" + nid + "</td>" + 
                   		"<td align='center'>" + dob + "</td>" +
                 		"</tr>";

                 		$("#details_table tbody").append(tr_str);
					}
				}else{
					var tr_str = "<tr>" +
                  	"<td align='center' colspan='4'>No record found.</td>" +
              		"</tr>";

              		$("#details_table tbody").append(tr_str);
				}
			}
		})

	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>