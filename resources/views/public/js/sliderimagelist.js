$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchSliderImage();
			function fetchSliderImage(){
				$.ajax({
					type: "GET",
					url: "/slider-image-list",
					dataType:"json",
					success: function(response){
						//console.log(response.image);
						$('tbody').html("");
						$.each(response.image, function(key, item) {
							$('tbody').append('<tr>\
		        			<td>'+item.id+'</td>\
		        			<td>'+item.image_status+'</td>\
							<td><img src="uploads/sliderimage/'+item.slider_image+'" width="100px" height="100px" alt="image"></td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="edit_btn btn btn-outline-primary">Edit\
		                    	</button>\
		                    	<button type="button" value="'+item.id+'" class="delete_btn btn btn-outline-danger">Delete\
		                    	</button>\
		        			</td>\
		        		</tr>');
						})

						
					}
				});
			}

			//Edit Image
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var imageId = $(this).val();
				alert(imageId);
				$('#EDITImageModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/slider-image-edit/"+imageId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_imagestatus').val(response.image.image_status);
							$('#imageid').val(imageId);
						}
					}
				});
			});

			


			//Update Image
			$(document).on('submit', '#UpdateImageFORM', function (e)
			{
				e.preventDefault();

				var id = $('#imageid').val(); 

				let EditFormData = new FormData($('#UpdateImageFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/slider-image-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITImageModal').modal('hide');
							alert(response.message);
							fetchSliderImage();
						}
					}
				});
			});

			//Delete Image
			$(document).on('click', '.delete_btn', function(e){
				e.preventDefault();
				var imageId = $(this).val(); 
				var token = $("meta[name='csrf-token']").attr("content");

				$.ajax(
					{
				        url: "slider-image-delete/"+imageId,
				        type: 'DELETE',
				        data: {
				            "imageId": imageId,
				            "_token": token,
				        },
				        success: function (response){

				            //console.log("it Works");
				            alert(response.success);
				            fetchSliderImage();
				        }
				    });
			});


			$(document).ready( function () {
    			$('#slider_image_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        450,
				    scrollCollapse: true,
				    scroller:       true,
				});
			});



			