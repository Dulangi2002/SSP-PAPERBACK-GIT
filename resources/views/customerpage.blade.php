<!DOCTYPE html>
    <html>
        <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://cdn.tailwindcss.com"></script>

        <title>customers</title>
        </head>
        <body>

        @if(Session::has('success'))
        <div>
        {{Session::get('success')}} 
        </div>
        @endif  


        <a href="{{url('add-customer')}}">Add<a>

  <table class="table-auto">
  <thead>
    <tr>
      <th>ID</th>
      <th>First-Name</th>
      <th>Last-Name</th>
      <th>Email</th>
      <th>Manage</th>
    </tr>
  </thead>
  <tbody>
    @php 
    $i =1;
    @endphp
    @foreach ($customerdata as $customer)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$customer -> firstname}}</td>
        <td>{{$customer -> lastname}}</td>
        <td>{{$customer -> email}}</td>
        <td>     <a href="{{url('edit-customer/'.$customer->id)}}">Edit<a> |  <a href="{{url('delete-customer/'.$customer->id)}}">Delete<a> </td>
        @endforeach


    </tr>
    
   
    
  </tbody>
</table>


















        </body>
</html>