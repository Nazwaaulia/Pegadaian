<!DOCTYPE html>
<html>
<head>
   <title>Pegadaian PDF</title>
</head>
<body>
   <table>
       <thead>
           <tr>
               <th>#</th>
               <th>Name</th>
               <th>Email</th>
               <th>Age</th>
               <th>Phone</th>
               <th>NIK</th>
               <th>Item</th>
               <th>Image</th>
               <th>Status</th>
               <th>Shop Location</th>
               <th>Updated at</th>
           </tr>
       </thead>
       <tbody>
           @php($i = 1)
           @foreach($pegadaian as $p)
           <tr>
               <td>{{ $i++ }}</td>
               <td>{{ $p->name }}</td>
               <td>{{ $p->email }}</td>
               <td>{{ $p->age }}</td>
               <td>{{ $p->phone }}</td>
               <td>{{ $p->nik }}</td>
               <td>{{ $p->item }}</td>
               <td>{{ $p->image }}</td>
               <td>{{ $p->status }}</td>
               <td>{{ $p->shop_location }}</td>
               <td>{{ $p->updated_at->format('d F Y') }}</td>
           </tr>
           @endforeach
       </tbody>
   </table>
</body>
</html>
