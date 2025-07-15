<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Mifta Motor Sport</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo e(asset('css/admin-dashboard.css')); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
</head>
<body>
    <div class="dashboard-container">
        <!-- Sidebar -->
        <div class="sidebar">
            <div class="logo-section">
                <div class="logo">
                    <span>MMS - Admin Dashboard</span>
                </div>
            </div>
            
            <nav class="nav-menu">
                <a href="/admin/dashboard" class="nav-item active">
                    <span>Home</span>
                </a>
                <a href="/admin/testimoni" class="nav-item">
                    <span>Testimonials</span>
                </a>
                <a href="/admin/produk" class="nav-item">
                    <span>Products</span>
                </a>
                <a href="/admin/booking" class="nav-item">
                    <span>Booking</span>
                </a>
                <a href="/admin/berita" class="nav-item">
                    <span>News</span>
                </a>
            </nav>
            
            <div class="logout-section">
                <a href="/logout" class="logout-btn">
                    <span>Log Out</span>
                </a>
            </div>
        </div>
        
        <!-- Main Content -->
        <div class="main-content">
            <!-- Header -->
            <header class="header">
                <h1>Home</h1>
                <div class="header-right">
                    <div class="notification-badge">
                    </div>
                    <div class="user-profile">
                        <span><?php echo e(Auth::user()->nama ?? 'Admin'); ?></span>
                    </div>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="stats-section">
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-label">Total Testimonials</div>
                        <div class="stat-value"><?php echo e($testimoniCount); ?></div>
                    </div>
                    <div class="stat-icon blue">👥</div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-label">Active Product</div>
                        <div class="stat-value"><?php echo e($produkCount); ?></div>
                    </div>
                    <div class="stat-icon green">📦</div>
                </div>
                <div class="stat-card">
                    <div class="stat-content">
                        <div class="stat-label">New Bookings</div>
                        <div class="stat-value"><?php echo e($serviceCount); ?></div>
                    </div>
                    <div class="stat-icon yellow">📅</div>
                </div>
            </div>

            <!-- Content Grid -->
            <div class="content-grid">
                <!-- Recent Testimonials -->
                <div class="content-section">
                    <div class="section-header">
                        <h2>Recent Testimonials</h2>
                        <a href="/admin/testimoni" class="btn btn-primary">View All</a>
                    </div>
                    <div class="testimonial-list">
                        <?php $__empty_1 = true; $__currentLoopData = $recentTestimoni->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $testimoni): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="testimonial-item">
                         <img src="https://ui-avatars.com/api/?name=<?php echo e(Auth::user()->nama); ?>&background=eeeeee&color=141414&size=128" alt="Profile" class="header-profile">
                            <div class="testimonial-content">
                                <div class="testimonial-name"><?php echo e($testimoni->pengguna->nama ?? 'Anonymous'); ?></div>
                                <div class="testimonial-text">"<?php echo e(Str::limit($testimoni->isi_testimoni, 50)); ?>"</div>
                                <div class="testimonial-rating">⭐⭐⭐⭐⭐</div>
                            </div>
                            <div class="testimonial-actions">
                                <button class="btn-icon delete" onclick="deleteTestimoni(<?php echo e($testimoni->id_testimoni); ?>)">🗑️</button>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <p>No testimonials yet</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Product Inventory -->
                <div class="content-section">
                    <div class="section-header">
                        <h2>Product Inventory</h2>
                        <a href="/admin/produk" class="btn btn-success">View All</a>
                    </div>
                    <div class="product-list">
                        <?php $__empty_1 = true; $__currentLoopData = $recentProduk->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produk): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="product-item">
                            <img src="<?php echo e(asset('storage/' . $produk->gambar) ?? 'https://via.placeholder.com/50x50'); ?>" alt="<?php echo e($produk->nama_produk); ?>" class="product-image">
                            <div class="product-content">
                                <div class="product-name"><?php echo e($produk->nama_produk); ?></div>
                                <div class="product-category"><?php echo e($produk->deskripsi ?? 'Product'); ?></div>
                                <div class="product-price">Rp <?php echo e(number_format($produk->harga, 0, ',', '.')); ?></div>
                            </div>
                            <div class="product-actions">
                                <button class="btn-icon">✏️</button>
                                <button class="btn-icon delete">🗑️</button>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <p>No products yet</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Recent Bookings -->
                <div class="content-section">
                    <div class="section-header">
                        <h2>Recent Bookings</h2>
                        <a href="/admin/booking" class="btn btn-warning">View All</a>
                    </div>
                    <div class="booking-list">
                        <?php $__empty_1 = true; $__currentLoopData = $recentServices->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $service): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="booking-item">
                            <img src="https://ui-avatars.com/api/?name=<?php echo e(Auth::user()->nama); ?>&background=eeeeee&color=141414&size=128" alt="Profile" class="header-profile">
                            <div class="booking-content">
                                <div class="booking-name"><?php echo e($service->pengguna->nama ?? 'Anonymous'); ?></div>
                                <div class="booking-service"><?php echo e($service->type_service ?? 'Service'); ?> - <?php echo e($service->tanggal_booking ?? 'No Date'); ?></div>
                                <span class="status-badge <?php echo e(strtolower($service->status ?? 'pending')); ?>"><?php echo e($service->status ?? 'Pending'); ?></span>
                            </div>
                            <div class="booking-actions">
                                <button class="btn-icon">✏️</button>
                                <button class="btn-icon delete">🗑️</button>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <p>No bookings yet</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>

                <!-- Latest News -->
                <div class="content-section">
                    <div class="section-header">
                        <h2>Latest News</h2>
                        <a href="/admin/berita" class="btn btn-purple">View All</a>
                    </div>
                    <div class="news-list">
                        <?php $__empty_1 = true; $__currentLoopData = $recentBerita->take(2); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $berita): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                        <div class="news-item">
                            <div class="news-content">
                                <div class="news-title"><?php echo e($berita->judul); ?></div>
                                <div class="news-description"><?php echo e(Str::limit($berita->konten, 50)); ?></div>
                                <span class="status-badge published">Published</span>
                            </div>
                            <div class="news-actions">
                                <button class="btn-icon" onclick="editBerita(<?php echo e($berita->id_berita); ?>)">✏️</button>
                                <button class="btn-icon delete">🗑️</button>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                        <div class="empty-state">
                            <p>No news yet</p>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Close dropdown when clicking outside
        document.addEventListener('click', function(event) {
            
        });

        // Auto-refresh notifications every 30 seconds
        setInterval(function() {
            // You can add AJAX call here to refresh notifications
            console.log('Checking for new notifications...');
        }, 30000);

        function deleteTestimoni(id) {
            if (confirm('Are you sure you want to delete this testimonial?')) {
                fetch(`/admin/testimoni/${id}`, {
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Content-Type': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.message) {
                        alert(data.message);
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error deleting testimonial');
                });
            }
        }

        function editTestimoni(id) {
            // Redirect to edit page or open modal
            window.location.href = `/admin/testimoni/${id}/edit`;
        }

        function editBerita(id) {
            // Redirect to edit page or open modal
            fetch(`/admin/berita/${id}`)
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        // Handle successful fetch, e.g., open modal with data
                        console.log(data);
                    } else {
                        alert('Error fetching berita data');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error fetching berita data');
                });
        }
    </script>
</body>
</html><?php /**PATH P:\Coding Files Projects\mms-project-repo\resources\views/admin-dashboard.blade.php ENDPATH**/ ?>