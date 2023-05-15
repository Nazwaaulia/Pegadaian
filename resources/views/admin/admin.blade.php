<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pegadaian</title>
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>
<body>
    @include('sweetalert::alert')
    <div class="text-center mb-4">
        <h2 class="mt-3" >All Data</h2>
        <a class="btn btn-danger" href="{{ route('export-pdf') }}">Cetak PDF</a>
        <a class="btn btn-success" href="#" aria-disabled="true" style="pointer-events: none; opacity: 0.5;">Cetak Excel</a>
        <a class="btn btn-primary" href="{{route('logout')}}">Logout</a>
        <form action="" method="GET" class="mt-3">
            <div class="row">
                <div class="col-auto mx-auto">
                    <form >
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Cari berdasarkan name" aria-label="Cari">
                            <div class="input-group-append">
                                <button class="btn btn-primary ms-2" type="submit">Cari</button>
                                <a id="refresh" class="btn btn-secondary">Refresh</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
    </div>

    <div class="container">
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
                        $pesanWA = 'Hallo, ' . $lapor['name'] . '. Pengajuan anda di terima, silahkan mengunjungi gerai kami di ' . $lapor['shop_location'];
                        $status = 'Diterima';
                    }
                    else if ($lapor['status'] == 'Rejected') {
                        $pesanWA = 'Hallo, ' . $lapor['name'] . '. Pengajuan gadai anda ditolak, terdapat beberapa hal yang tidak sesuai dengan persyaratan.';
                        $status = 'Ditolak';
                    }
                    else {
                        $pesanWA = 'Hallo, ' . $lapor['name'] . '. Pengajuan gadai anda masih di proses oleh petugas kami, silahkan tunggu beberapa saat.';
                        $status = 'Pending';
                    }
                @endphp
                {{-- function --}}
                <td><a href="https://wa.me/{{$telp}}?text={{$pesanWA}}" target="_blank">{{$telp}}</a></td>
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script>
    const refreshButton = document.getElementById("refresh");

    refreshButton.addEventListener("click", function() {
        location.reload();
    });
</script>
</body>
</html>
