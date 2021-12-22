@extends('layout.app')

@section('title', 'Supplier')

@section('content-header')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Supplier</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Supplier</li>
                </ol>
            </div>
        </div>
    </div>
</section>
@endsection

@section('content')
<section class="content">
    <!-- Default box -->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Title</h3>

            <div class="card-tools">
                <a class="btn btn-success" href="{{ route('supplier.create') }}"> Input Supplier</a>
            </div>
        </div>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if (session('error'))
        <div class="alert alert-error">
            {{ session('error') }}
        </div>
        @endif
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th style="width: 10px">#</th>
                        <th>Nama Supplier</th>
                        <th>Alamat Supplier</th>
                        <th>Telp. Supplier</th>
                        <th>Fax</th>
                        <th style="width: 40px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($query as $supplier)
                    <tr>
                        <td class="text-center">{{ ++$i }}</td>
                        <td>{{ $supplier->nm_supplier }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>{{ $supplier->telp }}</td>
                        <td>{{ $supplier->fax_supplier }}</td>
                        <td class="text-center" style="width: 80px">
                            <form action="{{ route('supplier.destroy',$supplier->id) }}" method="POST">

                                <a class="btn btn-primary btn-xs" href="{{ route('supplier.edit',$supplier->id) }}"> <i
                                        class="fas fa-pencil-alt"></i></a>

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-xs"
                                    onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i
                                        class="fas fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
        <!-- /.card-body -->
        <div class="card-footer clearfix">

            <ul class="pagination pagination-sm m-0 float-right">
                {{ $query->links() }}
            </ul>
        </div>
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

</section>
@endsection