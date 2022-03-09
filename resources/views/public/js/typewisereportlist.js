$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	fetchReport();
	function fetchReport(){
		$.ajax({
			type: "GET",
			url: "/typewise-report",
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

	// $('.radio-line').on('click', 'input[type="radio"]', changeText);

	$(document).on('change', '#expensetype', function (e) {
		e.preventDefault();

		var expenseType = $('#expensetype').val();
 
		//alert (expenseType);

		$.ajax({
			type: "GET",
			url: "/typewise-report/"+expenseType,
			dataType:"json",
			success: function(response){
				if (response.status == 200) {
					//console.log(response.data);
					$('tbody').html("");
					$.each(response.data, function(key, item) {
						$('tbody').append('<tr>\
						<td>'+item.type+'</td>\
						<td>'+item.amount+'</td>\
				        </tr>');
					})

					//alert(response.totalexpense);

					$('#totalexpense').text(response.totalexpense);
					
					// $('#totalexpense').val(response.totalexpense);

					
					
				}		
			}
		});
 
	});
				
		
			


	$(document).ready( function () {
	    	$('#typewisereport_table').DataTable({
				pageLength : 5,
				lengthMenu: [[5, 10, 20, -1], [5, 10, 20, 'Todos']],
				scrollY:        380,
				scrollCollapse: true,
				scroller:       true
			});
		});