@extends('dashboard.layouts.main')
{{-- 
    ############################
    #Jangan Hilangkan Copyright :) 
    #Author : Efendi (Fecore)
    ############################
--}}

@section('main')
<div class="lime-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item"><a href="/dashboard/file-manager" class="text-decoration-none">File Manager</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Upload</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        @if (session('status'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{ session('status') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>
                      @elseif(session('error'))
                      <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('error') }}
                         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                       </div>
                    @endif
                        <h5 class="card-title">Upload File</h5>
                        <p>Kompres File Menjadi ZIP / RAR Jika Ingin Menyimpan Banyak File.</p>
                        <form id="act" action="{{ url('dashboard/file-manager') }}" method="POST" enctype="multipart/form-data" class="formupload">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Note</label>
                                    <input type="text" class="form-control" id="inputEmail4" name="caption" placeholder="Contoh: Dokumen Kuliah" value="{{ old('caption') }}" required>
                                </div>
                                <div class="form-group col-md-6">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">File</label>
                                    <input type="file" name="file" class=" form-control @error('file') is-invalid @enderror" id="formFile" required> 
                                  </div>
                            </div>
                            @error('file')
                            <div class="feedback-invalid">
                                {{ $message }}
                            </div>
                        @enderror
                            <br>
                        </form>
                        <button id="uploadSubmit" class="btn btn-primary">Upload</button>
                        <p>*Jika terjadi error pada saat upload, pastikan Chat Id sudah anda tambahkan.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#uploadSubmit').on('click', function(){
        swal({
            title: "Hallo",
            text: "Jangan tinggalkan halaman ini ya sampai proses upload selesai.",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                $('.formupload').submit();
                swal("Oke Langsung Proses! :)");
            } else {
                swal("Proses Upload Di Batalkan.");
            }
            });
    });
</script>
@endsection
