@extends('layouts.template')

@section('title', 'App Andre')

@section('head')
<style>
    .container {
        width: 100%;
        min-height: 50vh;
        background-color: linear-gradient(135deg, #0dcaf0, #0d6efd);
        padding: 50px;
    }
</style>
@endsection

@section('content')
<div class="container">
    <h1>Dashboard Admin</h1>
    <h3>Table Postingan</h3>
    <div>
        <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init
            data-mdb-target="#exampleModalAdd">
            Tambah Postingan
        </button>

        <!-- Modal Add -->
        <div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalAddTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Tambah Postingan</h5>
                        <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal"
                            aria-label="Close">
                        </button>
                    </div>
                    <div class="modal-body">
                        <form action="/portofolio" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="judul" class="col-form-label">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul">
                            </div>
                            <div class="form-group">
                                <label for="konten" class="col-form-label">Konten:</label>
                                <textarea class="form-control" id="konten" name="konten"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="konten" class="col-form-label">Kategori:</label>
                                <select class="form-control" id="kategori" name="kategori">
                                    @foreach ($kategoris as $kategori)
                                    <option value="{{ $kategori->id_kategori }}">{{ $kategori->keterangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="image" class="col-form-label">Image:</label>
                                <input type="text" class="form-control" id="image" name="image">
                            </div>
                            <div class="form-group">
                                <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                                    data-mdb-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Konten</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Images</th>
                    <th scope="col">Control</th>
                </tr>
            </thead>

            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td>
                        {{ $post->id }}
                    </td>
                    <td>
                        {{ $post->judul }}
                    </td>
                    <td>
                        {!! $post->konten !!}
                    </td>
                    <td>
                        {{ $post->kategori }}
                    </td>
                    <td>
                        {{ $post->image }}
                    </td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic example">
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init
                                data-mdb-target="#exampleModalEdit{{ $post->id }}">
                                Edit
                            </button>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="exampleModalEdit{{ $post->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalEditCenterTitle{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle{{ $post->id }}">Edit
                                                Postingan</h5>
                                            <button type="button" class="btn-close" data-mdb-ripple-init
                                                data-mdb-dismiss="modal" aria-label="Close">
                                        </div>
                                        <div class="modal-body">
                                            <form action="/portofolio" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="id" name="id"
                                                        value="{{ $post->id }}" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label for="judul" class="col-form-label">Judul:</label>
                                                    <input type="text" class="form-control" id="judul" name="judul"
                                                        value="{{ $post->judul }}">
                                                </div>
                                                <div class="form-group">
                                                    <label for="konten" class="col-form-label">Kategori:</label>
                                                    <select class="form-control" id="kategori" name="kategori">
                                                        @foreach ($kategoris as $kategori)
                                                        <option value="{{ $kategori->id_kategori }}" {{ $post->kategori
                                                            == $kategori->id_kategori ? 'selected' : '' }}>{{
                                                            $kategori->keterangan }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label for="konten" class="col-form-label">Konten:</label>
                                                    <textarea class="form-control" id="konten"
                                                        name="konten">{!! $post->konten !!}</textarea>
                                                </div>
                                                <div class="form-group">
                                                    <label for="image" class="col-form-label">Image:</label>
                                                    <input type="text" class="form-control" id="image" name="image"
                                                        value="{{ $post->image }}">
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                                                        data-mdb-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Edit</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-danger" data-mdb-ripple-init data-mdb-modal-init
                                data-mdb-target="#exampleModalDelete{{ $post->id }}">Delete</button>
                            <!-- Modal Delete -->
                            <div class="modal fade" id="exampleModalDelete{{ $post->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalDeleteTitle{{ $post->id }}" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle{{ $post->id }}">Delete
                                                Postingan</h5>
                                            <button type="button" class="btn-close" data-mdb-ripple-init
                                                data-mdb-dismiss="modal" aria-label="Close">
                                        </div>
                                        <div class="modal-body">
                                            <form action="/portofolio" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="id" name="id"
                                                        value="{{ $post->id }}" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <label for="konten" class="col-form-label">Yakin delete konten
                                                        ini?</label>
                                                </div>
                                                <div class="form-group">
                                                    <button type="button" class="btn btn-secondary" data-mdb-ripple-init
                                                        data-mdb-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                    </td>
                </tr>
                @empty
                <div class="alert alert-danger">
                    Data Post belum Tersedia.
                </div>
                @endforelse
            </tbody>
            {{ $posts->links() }}
        </table>
    </div>

</div>
@endsection