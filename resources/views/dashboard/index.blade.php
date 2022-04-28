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
                <div class="card bg-info text-white">
                    <div class="card-body">
                        <div class="dashboard-info row">
                            <div class="info-text col-md-6">
                                <h5 class="card-title">Selamat Datang {{ auth()->user()->name }}</h5>
                                <p>Unlimited Upload menggunakan penyimpanan Telegram.</p>
                                <ul>
                                    <li>Max Upload Per-File 2GB</li>
                                    <li>Dapat Upload Lewat Aplikasi Telegram</li>
                                    <li>Dilarang Keras Untuk Di Perjual Belikan.</li>
                                    <li>Semua Orang Gratis Menggunakan Script Ini.</li>
                                </ul>
                                <a href="https://saweria.co/mfndi" target="_blank" class="btn btn-warning m-t-xs">Donate</a>
                                <a href="https://www.instagram.com/mefndi/" target="_blank" class="btn btn-light m-t-xs">Instagram</a>
                                <a href="https://www.facebook.com/mfndi" target="_blank" class="btn btn-primary m-t-xs">Facebook</a>
                            </div>
                            <div class="info-image col-md-6"></div>
                        </div>
                    </div>
                </div>
            </div>      
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Video</h5>
                        <h2 class="float-left">{{ $video }}</h2>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-info" role="progressbar" style="width: 100%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Audio</h5>
                        <h2 class="float-left">{{  $audio }}</h2>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Foto</h5>
                        <h2 class="float-left">{{ $image }}</h2>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card stat-card">
                    <div class="card-body">
                        <h5 class="card-title">Dokumen dan lain lain</h5>
                        <h2 class="float-left">{{ $allDoc }}</h2>
                        <div class="progress" style="height: 10px;">
                            <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="alert alert-warning m-b-lg" role="alert">
                {{-- Already logged in for <?php echo $carbonDate->diffForhumans(date('m/d/Y H:i:s',$_SESSION['date'])) ?>. --}}
                </div>
            </div>
        </div>
        <!-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Popular Products</h5>
                        <div class="popular-products">
                            <canvas id="productsChart">Your browser does not support the canvas element.</canvas>
                            <div class="popular-product-list">
                                <ul class="list-unstyled">
                                    <li id="popular-product1">
                                        <span>Alpha - Material Design</span>
                                        <span class="badge badge-pill badge-success">59%</span>
                                    </li>
                                    <li id="popular-product2">
                                        <span>Space - Light Theme</span>
                                        <span class="badge badge-pill badge-warning">15%</span>
                                    </li>
                                    <li id="popular-product3">
                                        <span>Modern - Admin Dashboard</span>
                                        <span class="badge badge-pill badge-secondary">26%</span>
                                    </li>
                                </ul>
                                <div class="alert alert-info" role="alert">
                                    Based on last week's earnings.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Earnings</h5>
                        <div id="apex1"></div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>
</div>
{{-- 
    ############################
    #Jangan ganti Copyright :) 
    #Author : Efendi (Fecore)
    ############################
--}}
@endsection
