@extends('sb-admin/app')
@section('title', 'Kucing')


@section('content')
    {{-- flashdata --}}
    {!! session('sukses') !!}

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kucing</h1>

    <a href="/kucing/create/" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i> Tambah Data Kucing</a>



    <table class="table mt-4 table-hover table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Image</th>
                <th scope="col">Nama</th>
                <th scope="col">Ras</th>
                <th scope="col">Gender</th>
                <th scope="col">Umur</th>
                <th scope="col">Merk Makanan</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kucing as $row)
                @if ($row->id_user == Auth::id() || Auth::user()->role == 'admin')
                    <tr>
                        <th scope="row">{{ $loop->iteration }}</th>
                        <td><img src="/upload/kucing/{{ $row->image }}" alt="" width="80px" height="80px"></td>
                        <td>{{ $row->nama_kucing }}</td>
                        <td>{{ $row->ras }}</td>
                        <td>{{ $row->gender }}</td>
                        <td>{{ $row->umur }}</td>
                        <td>{{ $row->merk_makanan }}</td>
                        <td width="20%">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <!-- <a href="/kucing/{{ $row->id }}" class="btn btn-info btn-sm mr-1"><i class="fas fa-eye"></i> Detail</a> -->
                                <a href="/kucing/{{ $row->id }}/edit" class="btn btn-primary btn-sm mr-1"><i
                                        class="fas fa-edit"></i> Edit</a>
                                <form action="/kucing/{{ $row->id }}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i>
                                        Hapus</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>

    </table>
    {{ $kucing->links() }}


@endsection
