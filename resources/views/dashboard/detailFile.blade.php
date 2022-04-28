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
                        <li class="breadcrumb-item active" aria-current="page">Detail File</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Detail</h5>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="namaFile">Nama File</label>
                                    <input type="text" class="form-control" id="namaFile" value="{{ $telegramfile->file_name }}" readonly>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-5">
                                    <label for="catatan">Catatan</label>
                                    <input type="text" class="form-control" id="catatan" value="{{ $telegramfile->caption }}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="size">Ukuran</label>
                                    <input type="text" class="form-control" id="size" value="{{ ByteForHuman::readableBytes($telegramfile->file_size) }}" readonly>
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="date">-</label>
                                    <input type="text" class="form-control" id="date" value="{{ $telegramfile->created_at->diffForHumans() }}" readonly>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="link">Link Download (Orang lain dapat mendownload file dengan link tersebut)</label>
                                <input type="text" class="form-control" id="copyText" value="{{ url('/download/file').'/'.$telegramfile->file_unique_id.'/'.$telegramfile->file_name }}" readonly>
                            </div>
                            <button class="btn btn-success" id="buttonCopy">Copy Link</button>
                            <a href="/dashboard/file-manager"><button class="btn btn-primary" >Back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    
$('#buttonCopy').on('click', function(){
        $('#copyText').select();
        document.execCommand("copy");
        swal("Berhasil Di Copy", "" ,"success");
});
        
</script>
@endsection
