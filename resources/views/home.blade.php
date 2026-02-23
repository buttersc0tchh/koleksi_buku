@extends('master')

<!-- Title Halaman -->
@section('title', 'Dashboard - Koleksi Buku')

<!-- ======= Style Page (Hanya berlaku untuk halaman ini) ======= -->
@section('style-page')
<style>
    /* Custom styles khusus untuk halaman dashboard */
    .stats-card {
        border-radius: 15px;
        padding: 20px;
        margin-bottom: 20px;
        transition: transform 0.3s;
    }
    
    .stats-card:hover {
        transform: translateY(-5px);
    }
    
    .stats-icon {
        font-size: 3rem;
        opacity: 0.8;
    }
    
    .welcome-card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 30px;
    }
    
    .chart-container {
        background: white;
        border-radius: 15px;
        padding: 20px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
    }
</style>
@endsection

<!-- ======= Content ======= -->
@section('content')
<div class="container-fluid">
    <!-- Welcome Section -->
    <div class="welcome-card">
        <h2>Selamat Datang di Koleksi Buku!</h2>
        <p class="mb-0">Kelola koleksi buku Anda dengan mudah dan efisien.</p>
    </div>

    <!-- Stats Cards -->
    <div class="row">
        <div class="col-md-3">
            <div class="card stats-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white;">
                <div class="card-body text-center">
                    <i class="fas fa-book stats-icon mb-3"></i>
                    <h3>{{ $bukuCount ?? 0 }}</h3>
                    <p class="mb-0">Total Buku</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white;">
                <div class="card-body text-center">
                    <i class="fas fa-tags stats-icon mb-3"></i>
                    <h3>{{ $kategoriCount ?? 0 }}</h3>
                    <p class="mb-0">Kategori</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white;">
                <div class="card-body text-center">
                    <i class="fas fa-users stats-icon mb-3"></i>
                    <h3>{{ $userCount ?? 0 }}</h3>
                    <p class="mb-0">Users</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card stats-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white;">
                <div class="card-body text-center">
                    <i class="fas fa-building stats-icon mb-3"></i>
                    <h3>45</h3>
                    <p class="mb-0">Penerbit</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Books Table -->
    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0"><i class="fas fa-list-alt mr-2"></i>Buku Terbaru</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Penerbit</th>
                                    <th>Tahun</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Laravel: From Zero to Hero</td>
                                    <td><span class="badge bg-primary">Programming</span></td>
                                    <td>John Doe</td>
                                    <td>Tech Publisher</td>
                                    <td>2024</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Mastering PHP</td>
                                    <td><span class="badge bg-success">Web Dev</span></td>
                                    <td>Jane Smith</td>
                                    <td>Code Press</td>
                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>JavaScript Essentials</td>
                                    <td><span class="badge bg-warning">Programming</span></td>
                                    <td>Mike Johnson</td>
                                    <td>Web Books</td>
                                    <td>2024</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Database Design</td>
                                    <td><span class="badge bg-info">Database</span></td>
                                    <td>Sarah Lee</td>
                                    <td>Data Tech</td>
                                    <td>2023</td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>UI/UX Design Principles</td>
                                    <td><span class="badge bg-danger">Design</span></td>
                                    <td>Tom Brown</td>
                                    <td>Creative Pub</td>
                                    <td>2024</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- ======= Javascript Page (Hanya berlaku untuk halaman ini) ======= -->
@section('javascript-page')
<script>
    $(document).ready(function() {
        console.log('Dashboard loaded successfully!');
        
        // Contoh: Animasi untuk kartu stats
        $('.stats-card').each(function(index) {
            $(this).delay(index * 100).fadeIn(500);
        });
        
        // Contoh: Tooltip
        $('[data-toggle="tooltip"]').tooltip();
    });
</script>
@endsection
