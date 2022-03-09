<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>
 @foreach($clientstatus as $client)
                                      <tbody>
                                        
                                          <td><a href="client-details/{{$client->id}}">{{$client->client_name}}</a></td>
                                          <td>{{$client->client_father}}</td>
                                          <td>{{$client->client_address}}</td>
                                          <td>{{$client->client_phone}}</td>
                                          <td>{{$client->client_nid}}</td>
                                          <td>{{$client->client_dob}}</td>
                                          
                                          <!-- @if($client->payment_status == 'Paid'){ -->
                                             <td><i style="color: #26ff00;" class="fas fa-check"></i></td>
                                           <!-- } -->
                                           <!-- @else{ -->
                                             <td><i style="color: #fc3003;" class="fas fa-times"></i></td>
                                           <!-- } -->
                                           <!-- @endif -->

                                          <td>{{$client->client_supplier}}</td>
                                          <td><img src="uploads/client/{{$client->client_pp}}" width="50px" height="50px" alt="image" class="rounded-circle"></td>
                                      </tbody>                                
                                    @endforeach
</body>
</html>