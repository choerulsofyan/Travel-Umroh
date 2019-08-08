@extends('layouts.master')

@section('title')
<title>Manajemen Petugas</title>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Manajemen Petugas </h1>
        <ol class="breadcrumb">
            <li><a href="#">Home</a></li>
            <li class="active">Petugas</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- right column -->
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">List Petugas</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        @if (session('success'))
                            @alert(['type' => 'success'])
                                {!! session('success') !!}
                            @endalert
                        @endif

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>E-mail</th>
                                    <th>Alamat</th>
                                </tr>
                            </thead>
                            <tbody>

                                @php $no = 1; @endphp
                                @forelse ($officers as $row)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $row->name }} </td>
                                        <td>{{ $row->birthdate }} </td>
                                        <td>{{ $row->gender }} </td>
                                        <td>{{ $row->phone }} </td>
                                        <td>{{ $row->email }} </td>
                                        <td>{{ str_limit($row->address, 50) }} </td>
                                        <td>
                                            <form action="{{ route('officer.destroy', $row->id) }}" method="POST">
                                                @csrf
                                                <input type="hidden" name="_method" value="DELETE">
                                                <a href="{{ route('officer.edit', $row->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center">Tidak ada data</td>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!--/.col (right) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
