@extends('users.layout')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>JURUSAN TEKNOLOGI INFORMASI-POLITEKNIK NEGERI MALANG</h2>
        </div>
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('mahasiswa.index') }}"> Kembali</a>
        </div>
        {{-- <div class="float-left my-1">
            <input type="text">
            <button class="btn btn-primary" type="submit">Search</button>
        </div> --}}
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
 @endif

 <table class="table table-bordered">
     <tr>
         <th>Nim</th>
         <th>Nama</th>
         <th>Email</th>
         <th>Tanggal Lahir</th>
         <th>Kelas</th>
         <th>Jurusan</th>
         <th>No_Handphone</th>
         <th width="280px">Action</th>
    </tr>

    @foreach ($mahasiswa as $mhs)
    <tr>
        <td>{{ $mhs->nim }}</td>
        <td>{{ $mhs->nama }}</td>
        <td>{{ $mhs->email}}</td>
        <td>{{ $mhs->tanggal_lahir}}</td>
        <td>{{ $mhs->kelas }}</td>
        <td>{{ $mhs->jurusan }}</td>
        <td>{{ $mhs->no_hp }}</td>
        <td>
            <form action="{{ route('mahasiswa.destroy',$mhs->nim) }}" method="POST">
                <a class="btn btn-info" href="{{ route('mahasiswa.show',$mhs->nim) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('mahasiswa.edit',$mhs->nim) }}">Edit</a>
                @csrf
            @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
    </table>


    <div class="d-flex">
        {{$mahasiswa->links()}}
    </div>
@endsection
