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
                        <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Setting</a></li>
                        <li class="breadcrumb-item active" aria-current="page">WebHook</li>
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
                        <form action="/dashboard/Webhook/setWebhook" method="get">
                            @csrf
                        <div class="form-group">
                                <label for="formGroupExampleInput" id="showModal">Check WebHook</label>
                                <div class="form-row">
                                    <div class="form-group col-md-10">
                                        @if (session('success'))
                                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                                            {{ session('success')}}. Jika ingin menghahpus/Remove webhook, gunakankan link <strong>https://api.telegram.org/bot(TOKEN BOT ANDA)/setWebhook?remove</strong>
                                             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                           </div>     
                                        @elseif(session('error'))
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                {{ session('status') }}
                                             <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                           </div>   
                                        @endif
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Check</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
</script>
@endsection
