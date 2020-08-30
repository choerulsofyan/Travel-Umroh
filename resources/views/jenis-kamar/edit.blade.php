@extends('layouts.master')

@section('title')
<title>Manajemen Jenis Kamar</title>
@endsection

@section('content')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1> Manajemen Jenis Kamar </h1>
        <ol class="breadcrumb">
            <li><a href="{{ route('dashboard.index') }}">Home</a></li>
            <li><a a href="{{ route('jenis-kamar.index') }}">Jenis Kamar</a></li>
            <li class="active">Edit</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Jenis Kamar</h3>
                    </div>
                    <!-- /.box-header -->

                    <!-- form start -->
                    <form role="form" action="{{ route('jenis-kamar.update', $jenisKamar->id) }}" method="POST">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">
                        <div class="box-body">

                            {{-- IF SOMETHING WRONG HAPPENED --}}
                            @if ($errors->any())
                                @alert(['type' => 'danger'])
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li> {{ $error }} </li>
                                        @endforeach
                                    </ul>
                                @endalert
                            @endif

                            <div class="form-group">
                                <label for="nama">Jenis Kamar</label>
                                <input type="text" name="nama"
                                    value="{{ $jenisKamar->nama }}"
                                    class="form-control {{ $errors->has('nama') ? 'is-invalid':'' }}"
                                    id="nama" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_orang">Jumlah Orang</label>
                                <input type="number" min="1" name="jumlah_orang"
                                    value="{{ $jenisKamar->jumlah_orang }}"
                                    class="form-control {{ $errors->has('jumlah_orang') ? 'is-invalid':'' }}"
                                    id="jumlah_orang" required>
                            </div>
                            <div class="form-group">
                                <label for="jumlah_kasur">Jumlah Kasur</label>
                                <input type="number" min="1" name="jumlah_kasur"
                                    value="{{ $jenisKamar->jumlah_kasur }}"
                                    class="form-control {{ $errors->has('jumlah_kasur') ? 'is-invalid':'' }}"
                                    id="jumlah_kasur" required>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">
                            <button type="reset" class="btn btn-default">Batal</button> &nbsp;&nbsp;
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
                <!-- /.box -->

            </div>
            <!--/.col (left) -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection
