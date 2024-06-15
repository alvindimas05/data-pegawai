@extends('layout')
@section('head')
    <script>
        const csrfToken = "{{ csrf_token() }}";
        const urlListJabatan = "{{ route('list-jabatan') }}";
        const urlStorePegawai = "{{ route('store') }}";
        const urlUpdatePegawai = "{{ route('update') }}";
    </script>
    <script src="/assets/js/pegawai.js"></script>
@endsection
@section('content')
    <div class="grid grid-cols-2 md:w-full px-2 md:px-0">
        <div>
            <button onclick="showAddForm()" class="btn btn-primary">Tambah Pegawai</button>
        </div>
    </div>
    <div class="w-full overflow-auto mt-5">
        <table>
            <thead>
                <tr>
                    <th>No. </th>
                    <th>Nama</th>
                    <th>No. Telp</th>
                    <th>Jabatan</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th data-dt-order="disable">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pegawai as $pgw)
                    <tr>
                        <td>{{ $loop->index + 1 }}.</td>
                        <td>{{ $pgw->nama }}</td>
                        <td>{{ $pgw->no_telp }}</td>
                        <td>{{ $pgw->jabatan->nama }}</td>
                        <td>{{ \Carbon\Carbon::parse($pgw->tanggal_masuk)->format('d-m-Y') }}</td>
                        <td>{{ $pgw->tanggal_keluar ? \Carbon\Carbon::parse($pgw->tanggal_keluar)->format('d-m-Y') : '-' }}</td>
                        <td>
                            <a onclick="showEditForm({{ $pgw->id }})" class="cursor-pointer"><i class="fa fa-pen text-yellow-500"></i></a>
                            <a href="{{ route('destroy', $pgw->id) }}"><i class="fa fa-trash text-red-500"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
