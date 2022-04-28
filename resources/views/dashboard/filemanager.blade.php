@extends('dashboard.layouts.main')
{{-- 
    ############################
    #Jangan Hilangkan Copyright :) 
    #Author : Efendi (Fecore)
    ############################
--}}

@section('main')

<div class="lime-body">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item text-decoration-none"><a href="/dashboard" class="text-decoration-none">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">File Manager</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                <div class="card card-transparent">
                    <div class="card-body">
                        <a href="/dashboard/file-manager/upload" class="btn btn-primary btn-block">Upload File</a>
                    </div>
                    <div class="storage-info">
                        <form class="form-inline my-2 my-lg-0 search" id="search" action="/dashboard/file-manager" method="GET" >
                            <input class="form-control mr-sm-2" type="search" name="search" placeholder="Cari Berdasarkan Nama File atau Note File" value="{{ request('search') }}">
                            <button class="btn btn-primary btn-block col-2">Cari</button>
                        </form>
                        <br>
                    </div>
                    <div class="col-3">
                        {{ $telegramfiles->links() }}
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card card-transparent file-list">
                    <div class="card-body">
                        <h5 class="card-title">FILES</h5>
                        <div class="row">
                            @foreach ($telegramfiles as $file)  
                            <div class="col-lg-6 col-xl-3">
                                <div class="card file pdf">
                                    <div class="file-options dropdown">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                        <div class="dropdown-menu dropdown-menu-right">
                                            <a class="dropdown-item" href="/dashboard/file-manager/detail/{{ $file->file_unique_id }}">View Details</a>
                                            <a class="dropdown-item" href="/download/file/{{ $file->file_unique_id .'/'.$file->file_name  }}">Download</a>
                                            <div class="divider"></div>
                                            <form action="" method="post" id="dataform">
                                                @csrf
                                                @method('DELETE')
                                                <button onclick="return false" class="dropdown-item btnDelete" data-name="{{ $file->random_code_file }}">Delete</button>
                                        </form>
                                        </div>
                                    </div>
                                    {{-- <div class="card-header file-icon">
                                        <i class="material-icons">description</i>
                                    </div> --}}
                                    <div class="card-body file-info">
                                        <p>{{ $file->file_name }}</p>
                                        <span class="file-size">{{ ByteForHuman::readableBytes($file->file_size) }} <-> </span>
                                        <span class="file-size">{{ $file['created_at']->diffForhumans() }}</span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
 
    $('.btnDelete').on('click', function(){
        let nameFile = $(this).data('name');
        swal({
                title: "Apakah Sudah yakin?",
                text: `Data Akan Terhapus Pada Database!. Akan Tetapi File Tersebut Tidak Terhapus Pada Bot Telegram`,
                icon: "warning",
                buttons: true,
                dangerMode: true,
                })
                .then((willDelete) => {
                if (willDelete) {
                    $value = `/dashboard/file-manager/${nameFile}`;
                    let exSub = $("#dataform").attr("action", $value);
                    exSub.submit();
                } else {
                    swal("Batal Menghapus Data File");
                    }
            });

      
    });

   

</script>

@endsection
