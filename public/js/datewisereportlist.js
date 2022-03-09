	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	fetchReport();
	function fetchReport(){
		$.ajax({
			type: "GET",
			url: "/api/typewise-report",
			dataType:"json",
			success: function(response){
				//console.log(response.expense);
				$('tbody').html("");
				$.each(response.expense, function(key, item) {
					$('tbody').append('<tr>\
					<td>'+item.type+'</td>\
					<td>'+item.amount+'</td>\
			        </tr>');
				})
			}
		});
	}

	$(document).on('submit', '#DatewiseReportFORM', function (e) {
		e.preventDefault();

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});

		// var expenseType = $('#expensetype').val();
 
		//alert (expenseType);

		let formData = new FormData($('#DatewiseReportFORM')[0]);

				$.ajax({
					type: "POST",
					url: "/datewise-report-generate",
					data: formData,
					contentType: false,
					processData: false,
					success: function(response){
						//alert('ok');
						//console.log(response.data)

						$('tbody').html("");
						$.each(response.data, function(key, item) {
							$('tbody').append('<tr>\
							<td>'+item.type+'</td>\
							<td>'+item.amount+'</td>\
					        </tr>');
						})

						// alert(response.totalexpense);
						$('#totalexpense').text(response.totalexpense);

						
					}
				});
	});

	$(document).ready( function () {
	    	$('#datewisereport_table').DataTable({
				pageLength : 5,
				lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				scrollY:        380,
				scrollCollapse: true,
				scroller:       true
			});
		});




	

	

	
				
		
			


	