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
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Users</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Registrasi</li>
                      </ol>
                    </nav>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                       {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                      </div>
                      @endif
                        <h5 class="card-title"></h5>                        
                        <form action="/dashboard/users" method="POST">
                            @csrf
                            <input type="hidden" name="ran_code" value="{{ bin2hex(random_bytes(4)); }}">
                        <div class="row">
                            <div class="col">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama" value="{{ old('name') }}" required>
                                    @error('name')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="email"  name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}" required>
                                    @error('email')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col">
                                    <input type="password"  name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" required>
                                    @error('password')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <input type="password"  name="password_confirm" class="form-control @error('password') is-invalid @enderror" placeholder="Password Confirm" required>
                                    @error('password')
                                    <div class="feedback-invalid">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <button type="submit" name="submit" class="btn btn-primary">Simpan</button>
                        </form>
                        <br>
                        <div class="changePasswd">
                            <p class="breadcrumb-item" id="changePasswd"><a href="#" class="text-decoration-none">Ganti Password Atau Lupa Password?</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Users</h5>
                        <table class="table">
                            <thead class="thead-dark">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Username</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                <tr>
                                    <th scope="row">#</th>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <form action="/dashboard/users/{{ $user->email }}" method="post" id="formDelete">
                                        @csrf
                                    <td>
                                        <button type="submit" class="btn btn-danger" id="btnDelete">Delete</button>
                                    </td>
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
    $('#changePasswd').on('click', function(){
        swal(`Kalo kamu ingin ganti password atau lupa password, maka kamu cukup ketik pada bot /passwd<spasi>email_akun_nya<spasi>password_baru (Contoh: /passwd sayaganteng@gmail.com passwordku123)`);
    })
</script>
@endsection
