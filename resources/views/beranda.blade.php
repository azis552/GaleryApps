@extends('template.master')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h4>Halaman Beranda</h4>
        </div>
        @if (Auth::check() == true)
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahFoto">
                Tambah Foto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="tambahFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Foto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('foto.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Foto</label>
                                    <input class="form-control" type="file" id="formFile" name="foto">
                                </div>
                                <div class="mb-3">
                                    <label for="">Judul</label>
                                    <input type="text" class="form-control" name="judul">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <textarea name="deskripsi" class="form-control" id="" cols="30" rows="10" ></textarea>
                                </div>
                                <label for="">Status</label>
                                <select name="status" id="" class="form-control">
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                                <label for="">Album Foto</label>
                                <select name="album_id" id="" class="form-control">
                                    @foreach ($album as $item)
                                        <option value="{{ $item->id }}">{{ $item->album }}</option>
                                    @endforeach
                                </select>
                                
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
             <!-- Button trigger modal -->
             <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahAlbumFoto">
                Tambah Album Foto
            </button>
            <!-- Modal -->
            <div class="modal fade" id="tambahAlbumFoto" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Foto</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="{{ route('album.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Album</label>
                                    <input class="form-control" type="text" name="album">
                                </div>
                                <div class="mb-3">
                                    <label for="">Deskripsi</label>
                                    <input type="text" class="form-control" name="deskripsi">
                                </div>
                                
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endif

            <div class="row">
                @if ($fotos->isEmpty())
                    <div class="alert alert-danger">Tidak Ada Foto</div>
                @endif
                @foreach ($fotos as $item)
                <div class="col">
                    <div class="card mt-2" style="width: 18rem;">
                        <img src="{{ asset('storage/images/'.$item->foto) }}" style="text-align: center;width: 285px; height: 200px;"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->judul }}</h5>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <a href="#" class="btn btn-primary">Show</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        
    </div>
@endsection
