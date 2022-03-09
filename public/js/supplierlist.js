$.ajaxSetup({
			  headers: {
			    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			  }
			});

			fetchSupplier();
			function fetchSupplier(){
				$.ajax({
					type: "GET",
					url: "/api/supplier-list",
					dataType:"json",
					success: function(response){
						//console.log(response.passport);
						$('tbody').html("");
						$.each(response.supplier, function(key, item) {
							$('tbody').append('<tr>\
							<td>'+item.supplier_name+'</td>\
							<td>'+item.supplier_address+'</td>\
							<td>'+item.supplier_contact+'</td>\
							<td>'+item.supplier_nid+'</td>\
		        			<td>\
		        				<button type="button" value="'+item.id+'" class="edit_btn btn btn-outline-primary btn-sm"><i class="fas fa-edit"></i>\
		                    	</button>\
		                    	<a href="javascript:void(0)" class="btn btn-outline-danger btn-sm delete_btn" data-value="'+item.id+'"><i class="fas fa-trash"></i></a>\
		        			</td>\
		        		</tr>');
						})	
					}
				});
			}

			//Edit Supplier
			$(document).on('click', '.edit_btn', function (e) {
				e.preventDefault();

				var supplierId = $(this).val();
				//alert(supplierId);
				$('#EDITSupplierModal').modal('show');
					
					$.ajax({
					type: "GET",
					url: "/supplier-edit/"+supplierId,
					success: function(response){
						if (response.status == 200) {
							$('#edit_suppliername').val(response.supplier.supplier_name);
							$('#edit_supplieraddress').val(response.supplier.supplier_address);
							$('#edit_suppliercontact').val(response.supplier.supplier_contact);
							$('#edit_suppliernid').val(response.supplier.supplier_nid);
							$('#supplierid').val(supplierId);
						}
					}
				});
			});

			


			//Update Supplier
			$(document).on('submit', '#UpdateSupplierFORM', function (e)
			{
				e.preventDefault();

				var id = $('#supplierid').val(); 

				let EditFormData = new FormData($('#UpdateSupplierFORM')[0]);

				EditFormData.append('_method', 'PUT');

				$.ajax({
					type: "POST",
					url: "/supplier-edit/"+id,
					data: EditFormData,
					contentType: false,
					processData: false,
					success: function(response){
						if(response.status == 200){
							$('#EDITSupplierModal').modal('hide');
							alert(response.message);
							fetchSupplier();
						}
					}
				});
			});

			//Delete Supplier
			$(document).ready( function () {
				$('#supplier_table').on('click', '.delete_btn', function(){

					var supplierId = $(this).data("value");

					$('#supplierid').val(supplierId);

					$('#DeleteSupplierFORM').attr('action', '/supplier-delete/'+supplierId);

					$('#DeleteSupplierModal').modal('show');

				});
			});



			$(document).ready( function () {
    			$('#supplier_table').DataTable({
				    pageLength : 10,
				    lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				    scrollY:        380,
				    scrollCollapse: true,
				    scroller:       true,
				});
    			
			});



			