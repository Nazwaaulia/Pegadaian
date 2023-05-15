<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegadaian</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <style>
        span a{
            text-decoration:none;
            color:rgb(31, 121, 255);
        }
    </style>
</head>
<body>
    @include('sweetalert::alert')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <span class="btn btn-outline"><a href="{{route('landing')}}">Home</a> / <a href="{{ route('data-petugas') }}">Send Responses</a> / <a href="{{ route('status-petugas') }}">By Status</a> / <a href="{{ route('logout') }}">Logout</a></span>

            <form class="d-flex" action="" method="GET">
                <select class="form-select me-2" name="sort">
                    <option value="">Sort by Type</option>
                    <option value="Approved">Diterima</option>
                    <option value="Rejected">Ditolak</option>
                </select>
                <button class="btn btn-outline-success me-1" type="submit">Search</button>
                <a id="refresh" class="btn btn-outline-secondary">Refresh</a>
            </form>
        </div>
    </nav>


    <div class="container mt-3">
        <table class="table">
          <thead class="thead-dark">
        <tr>
            <th width="5%">#</th>
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
            @php
                $no = 1;
            @endphp
            @foreach ($reports as $lapor)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$lapor['name']}}</td>
                <td>{{$lapor['email']}}</td>
                <td>{{$lapor['age']}}</td>
                {{-- function --}}
                @php
                    $telp = substr_replace($lapor['phone'], "62", 0, 1)
                @endphp
                @php
                    if ($lapor['status'] == 'Approved') {
                        $status = 'Diterima';
                    }
                    else if ($lapor['status'] == 'Rejected') {
                        $status = 'Ditolak';
                    }
                    else {
                        $status = 'Pending';
                    }
                @endphp
                {{-- function --}}
                <td>{{$telp}}</td>
                <td>{{$lapor['nik']}}</td>
                <td>{{$lapor['item']}}</td>
                <td>
                    <a href="{{asset('assets/image/'.$lapor->image)}}" target="_blank">
                        <img src="{{asset('assets/image/'.$lapor->image)}}" width="120">
                    </a>
                </td>
                <td>{{$status}}</td>
                <td>{{$lapor['shop_location']}}</td>
                <td>
                    {{ date('d F Y', strtotime($lapor["updated_at"])) }}
                </td>
                <td>
                    <form method="get">
                        <input type="hidden" name="update" value="{{$lapor["id"]}}">
                        <button class="btn btn-success" type="submit">Change Reponse</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@if(isset($id))
<div class="modal fade" id="responseModal" tabindex="-1" aria-labelledby="responseModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="responseModalLabel">Create/Update Response</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="/create/{{$id}}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="Approved">Approved</option>
                            <option value="Rejected">Rejected</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="shop_location" class="form-label">Shop Location</label>
                        <input type="text" class="form-control" name="shop_location" id="shop_location">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="window.location.href='{{ route('data-petugas') }}'">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
    $('#responseModal').modal('show'); // tampilkan modal saat halaman dimuat
});
</script>

@endif

<script>
    const refreshButton = document.getElementById("refresh");

    refreshButton.addEventListener("click", function() {
        location.reload();
    });
</script>
</body>
</html>
