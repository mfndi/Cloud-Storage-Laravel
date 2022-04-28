@extends('dashboard.layouts.main')


@section('main')
<div class="lime-body">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title">
                    <nav aria-label="breadcrumb">
                      <ol class="breadcrumb breadcrumb-separator-1">
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">ID Chat Telegram</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <!-- <h5 class="card-title">ID CHAT</h5> -->
                        <form action="/dashboard/chat-id/generate" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="form-group">
                                <label for="formGroupExampleInput" id="showModal">Generate Token Registrasi</label>
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        @if (session('code'))
                                        <div class="alert alert-info alert-dismissible fade show" role="alert">
                                            Buka bot yang sudah anda buat lalu salin perintah yang sudah di bolt ini " <strong>/id {{ session('code') }}</strong> " tanpa tanda petik dua, setelah itu tempel/paste pada chat bot anda lalu kirim.
                                            Bot akan otomatis menyimpan ID CHAT anda dan pastikan ada sudah setting Token bot pada file .ENV
                                             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                           </div>     
                                        @elseif(session('status'))
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                           </div>   
                                        @elseif(session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success') }}
                                         <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                       </div> 
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Generate</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="hide row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">ID Chat</h5>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">ID</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Code Reg</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($idtele as $id)                               
                                <tr>
                                    <input type="hidden" id="isi_data" value="1">
                                    <th scope="row">#</th>
                                    <td>
                                        @if ($id['chat_id'] == null)
                                            Masih kosong
                                        @else
                                            {{ $id['chat_id'] }}
                                        @endif
                                    </td>
                                    <td>
                                        @if ($id['username'] == null)
                                        Masih kosong
                                    @else
                                        {{ $id['username'] }}
                                    @endif
                                    </td>
                                    <td>
                                      /id  {{ $id['reg_code'] }}
                                    </td>
                                    <td>
                                        <button class="btn btn-danger" id="btnDelete">Delete</button>
                                    </td>
                                    <form action="/dashboard/chat-id/{{ $id['reg_code'] }}" method="post" id="formDelete">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>       
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#btnDelete').on('click', function(){
        swal({
        title: "Anda yakin?",
        text: "Jika tidak ada chat id maka website ini tidak akan bekerja secara normal",
        icon: "warning",
        buttons: true,
        dangerMode: true,
        })
        .then((willDelete) => {
        if (willDelete) {
            $('#formDelete').submit();
        } else {
            swal("Chat Id Tidak DiHapus");
        }
        });
    });


    $('#showModal').on('mouseover', function(){
        swal("Masih Bingung cara mendapatkan Chat Id?", 
        "Kamu cukup klik button/tombol generate nanti akan di berikan code untuk mendapatkan Chat Id");
    });

    let isiData = $('#isi_data');
    if(!isiData){
        $('.hide').hide();
    }else{
        $('.hide').show();
    }
</script>
@endsection
