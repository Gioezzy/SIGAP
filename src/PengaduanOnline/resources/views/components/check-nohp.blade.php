@php
    $user = Auth::user();
    $canSubmit = $user && $user->no_hp && $user->alamat;
@endphp

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if (!$canSubmit)
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.btn-check-nohp').forEach(button => {
            button.addEventListener('click', function (e) {
                e.preventDefault();
                showDesign1(); // Pilih showDesign1(), showDesign2(), atau showDesign3()
            });
        });

        // DESAIN 1: Glassmorphism dengan Gradient
        function showDesign1() {
            Swal.fire({
                html: `
                    <div class="glass-container">
                        <div class="floating-icon">
                            <div class="icon-circle">
                                <i class="fas fa-user-shield"></i>
                            </div>
                            <div class="pulse-ring"></div>
                        </div>
                        
                        <h2 class="glass-title">Profil Belum Lengkap</h2>
                        <p class="glass-subtitle">Lengkapi data berikut untuk melanjutkan</p>
                        
                        <div class="requirement-cards">
                            <div class="req-card">
                                <div class="req-icon phone"><i class="fas fa-phone"></i></div>
                                <div class="req-text">
                                    <h4>Nomor HP</h4>
                                    <p>Diperlukan untuk notifikasi</p>
                                </div>
                            </div>
                            <div class="req-card">
                                <div class="req-icon location"><i class="fas fa-map-marker-alt"></i></div>
                                <div class="req-text">
                                    <h4>Alamat</h4>
                                    <p>Lokasi untuk pengaduan</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="action-buttons">
                            <button class="btn-primary" onclick="redirectToProfile()">
                                <i class="fas fa-edit"></i>Lengkapi Sekarang
                            </button>
                            <button class="btn-secondary" onclick="Swal.close()">
                                <i class="fas fa-clock"></i>Nanti Saja
                            </button>
                        </div>
                    </div>
                `,
                showConfirmButton: false,
                background: 'transparent',
                backdrop: 'rgba(0,0,0,0.7)',
                customClass: { popup: 'glass-popup' },
                showClass: { popup: 'animate__animated animate__zoomIn animate__faster' }
            });
        }

        // DESAIN 2: Card Modern dengan Progress Steps
        function showDesign2() {
            Swal.fire({
                html: `
                    <div class="card-modern">
                        <div class="card-header">
                            <div class="status-badge">
                                <i class="fas fa-exclamation-triangle"></i>Aksi Diperlukan
                            </div>
                        </div>
                        
                        <div class="card-body">
                            <div class="main-icon"><i class="fas fa-user-cog"></i></div>
                            <h2>Selesaikan Profil Anda</h2>
                            <p>Untuk membuat pengaduan, silakan lengkapi informasi berikut:</p>
                            
                            <div class="progress-container">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: 60%"></div>
                                </div>
                                <span class="progress-text">60% Lengkap</span>
                            </div>
                            
                            <div class="missing-items">
                                <div class="missing-item">
                                    <div class="item-icon phone-icon"><i class="fas fa-phone"></i></div>
                                    <div class="item-info">
                                        <h4>Nomor Telepon</h4>
                                        <p>Untuk komunikasi pengaduan</p>
                                    </div>
                                    <div class="item-status"><i class="fas fa-times-circle"></i></div>
                                </div>
                                <div class="missing-item">
                                    <div class="item-icon address-icon"><i class="fas fa-home"></i></div>
                                    <div class="item-info">
                                        <h4>Alamat Lengkap</h4>
                                        <p>Lokasi untuk tindak lanjut</p>
                                    </div>
                                    <div class="item-status"><i class="fas fa-times-circle"></i></div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="card-footer">
                            <button class="btn-complete" onclick="redirectToProfile()">
                                <i class="fas fa-rocket"></i>Lengkapi Profil
                            </button>
                            <button class="btn-skip" onclick="Swal.close()">Lewati</button>
                        </div>
                    </div>
                `,
                showConfirmButton: false,
                background: 'transparent',
                backdrop: 'rgba(0,0,0,0.6)',
                customClass: { popup: 'card-popup' },
                showClass: { popup: 'animate__animated animate__slideInUp animate__faster' }
            });
        }

        // DESAIN 3: Notification Style dengan Timeline
        function showDesign3() {
            Swal.fire({
                html: `
                    <div class="notification-container">
                        <div class="notification-header">
                            <div class="notification-avatar"><i class="fas fa-shield-alt"></i></div>
                            <div class="notification-meta">
                                <h3>Sistem Pengaduan</h3>
                                <span>Baru saja</span>
                            </div>
                            <div class="notification-close" onclick="Swal.close()">
                                <i class="fas fa-times"></i>
                            </div>
                        </div>
                        
                        <div class="notification-body">
                            <div class="notification-title">
                                <i class="fas fa-info-circle"></i>
                                Data profil diperlukan untuk melanjutkan
                            </div>
                            
                            <div class="timeline">
                                <div class="timeline-item completed">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <h4>Akun Terdaftar</h4>
                                        <p>Akun Anda sudah aktif</p>
                                    </div>
                                </div>
                                <div class="timeline-item pending">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <h4>Nomor HP</h4>
                                        <p>Belum diisi</p>
                                    </div>
                                </div>
                                <div class="timeline-item pending">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <h4>Alamat</h4>
                                        <p>Belum diisi</p>
                                    </div>
                                </div>
                                <div class="timeline-item future">
                                    <div class="timeline-dot"></div>
                                    <div class="timeline-content">
                                        <h4>Buat Pengaduan</h4>
                                        <p>Tersedia setelah profil lengkap</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="notification-actions">
                            <button class="btn-action primary" onclick="redirectToProfile()">
                                <i class="fas fa-user-edit"></i>Lengkapi Data
                            </button>
                            <button class="btn-action secondary" onclick="Swal.close()">
                                <i class="fas fa-clock"></i>Ingatkan Nanti
                            </button>
                        </div>
                    </div>
                `,
                showConfirmButton: false,
                background: 'transparent',
                backdrop: 'rgba(0,0,0,0.5)',
                customClass: { popup: 'notification-popup' },
                showClass: { popup: 'animate__animated animate__slideInRight animate__faster' }
            });
        }

        // Function untuk redirect dengan loading minimalis
        window.redirectToProfile = function() {
            Swal.fire({
                html: `
                    <div class="loading-container">
                        <div class="loading-spinner"></div>
                        <p>Mengarahkan ke halaman profil...</p>
                    </div>
                `,
                showConfirmButton: false,
                allowOutsideClick: false,
                background: 'rgba(255, 255, 255, 0.98)',
                backdrop: 'rgba(0,0,0,0.8)',
                customClass: { popup: 'loading-popup' },
                timer: 1500
            }).then(() => {
                window.location.href = "{{ route('profile.edit') }}";
            });
        }
    });
</script>

<style>
    /* Base Styles */
    .glass-popup, .card-popup, .notification-popup {
        background: transparent !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        padding: 0 !important;
    }

    /* DESAIN 1: Glassmorphism */
    .glass-container {
        background: rgba(255, 255, 255, 1);
        backdrop-filter: blur(20px);
        border-radius: 20px;
        padding: 40px;
        border: 1px solid rgba(255, 255, 255, 0.3);
        box-shadow: 0 25px 45px rgba(0, 0, 0, 0.15);
        position: relative;
        overflow: hidden;
    }

    .glass-container::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        height: 2px;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        border-radius: 20px 20px 0 0;
    }

    .floating-icon {
        position: relative;
        display: flex;
        justify-content: center;
        margin-bottom: 30px;
    }

    .icon-circle {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
        position: relative;
        z-index: 2;
    }

    .pulse-ring {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 80px;
        height: 80px;
        border: 2px solid #667eea;
        border-radius: 50%;
        animation: pulse-ring 2s infinite;
    }

    @keyframes pulse-ring {
        0% { transform: translate(-50%, -50%) scale(1); opacity: 1; }
        100% { transform: translate(-50%, -50%) scale(1.5); opacity: 0; }
    }

    .glass-title {
        font-size: 24px;
        font-weight: 700;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .glass-subtitle {
        color: #4b5563;
        margin-bottom: 30px;
        font-size: 16px;
    }

    .requirement-cards {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
        margin-bottom: 30px;
    }

    .req-card {
        background: rgba(255, 255, 255, 0.3);
        border-radius: 15px;
        padding: 20px;
        border: 1px solid rgba(255, 255, 255, 0.4);
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
    }

    .req-icon {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 15px;
        font-size: 20px;
        color: white;
    }

    .req-icon.phone {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .req-icon.location {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .req-text h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .req-text p {
        font-size: 14px;
        color: #4b5563;
        margin: 0;
    }

    .action-buttons {
        display: flex;
        gap: 15px;
        justify-content: center;
    }

    .btn-primary, .btn-secondary {
        padding: 12px 30px;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-secondary {
        background: rgba(255, 255, 255, 0.9);
        color: #4b5563;
        border: 1px solid rgba(255, 255, 255, 0.4);
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, 1);
        color: #374151;
    }

    /* DESAIN 2: Card Modern */
    .card-modern {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 500px;
        margin: 0 auto;
    }

    .card-header {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        padding: 20px;
    }

    .status-badge {
        background: rgba(255, 255, 255, 0.2);
        color: white;
        padding: 8px 16px;
        border-radius: 20px;
        font-size: 14px;
        font-weight: 500;
        display: inline-flex;
        align-items: center;
        gap: 8px;
        backdrop-filter: blur(10px);
    }

    .card-body {
        padding: 40px;
        text-align: center;
    }

    .main-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 20px;
        font-size: 32px;
        color: white;
        box-shadow: 0 10px 30px rgba(102, 126, 234, 0.3);
    }

    .card-body h2 {
        font-size: 24px;
        color: #1f2937;
        margin-bottom: 10px;
    }

    .card-body p {
        color: #6b7280;
        margin-bottom: 30px;
    }

    .progress-container {
        margin-bottom: 30px;
    }

    .progress-bar {
        width: 100%;
        height: 6px;
        background: #e5e7eb;
        border-radius: 3px;
        overflow: hidden;
        margin-bottom: 10px;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
        transition: width 0.3s ease;
    }

    .progress-text {
        font-size: 14px;
        color: #6b7280;
        font-weight: 500;
    }

    .missing-items {
        display: flex;
        flex-direction: column;
        gap: 20px;
        margin-bottom: 30px;
    }

    .missing-item {
        display: flex;
        align-items: center;
        gap: 15px;
        padding: 20px;
        background: #f8fafc;
        border-radius: 12px;
        border-left: 4px solid #f59e0b;
    }

    .item-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 16px;
    }

    .phone-icon {
        background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
    }

    .address-icon {
        background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
    }

    .item-info {
        flex: 1;
        text-align: left;
    }

    .item-info h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .item-info p {
        font-size: 14px;
        color: #6b7280;
        margin: 0;
    }

    .item-status {
        color: #ef4444;
        font-size: 20px;
    }

    .card-footer {
        padding: 20px 40px;
        background: #f8fafc;
        display: flex;
        gap: 15px;
        justify-content: center;
    }

    .btn-complete, .btn-skip {
        padding: 12px 30px;
        border-radius: 25px;
        border: none;
        cursor: pointer;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
        transition: all 0.3s ease;
    }

    .btn-complete {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
    }

    .btn-complete:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-skip {
        background: transparent;
        color: #6b7280;
        border: 1px solid #d1d5db;
    }

    .btn-skip:hover {
        background: #f3f4f6;
        color: #374151;
    }

    /* DESAIN 3: Notification Style */
    .notification-container {
        background: white;
        border-radius: 16px;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        max-width: 450px;
        margin: 0 auto;
        border: 1px solid #e5e7eb;
    }

    .notification-header {
        display: flex;
        align-items: center;
        padding: 20px;
        background: #f8fafc;
        border-bottom: 1px solid #e5e7eb;
    }

    .notification-avatar {
        width: 50px;
        height: 50px;
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 20px;
        margin-right: 15px;
    }

    .notification-meta {
        flex: 1;
    }

    .notification-meta h3 {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
        margin: 0 0 5px 0;
    }

    .notification-meta span {
        font-size: 14px;
        color: #6b7280;
    }

    .notification-close {
        cursor: pointer;
        color: #9ca3af;
        font-size: 18px;
        padding: 5px;
        border-radius: 50%;
        transition: all 0.2s ease;
    }

    .notification-close:hover {
        background: #e5e7eb;
        color: #374151;
    }

    .notification-body {
        padding: 20px;
    }

    .notification-title {
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 25px;
        font-size: 16px;
    }

    .notification-title i {
        color: #3b82f6;
    }

    .timeline {
        position: relative;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 20px;
        top: 0;
        bottom: 0;
        width: 2px;
        background: #e5e7eb;
    }

    .timeline-item {
        position: relative;
        padding-left: 50px;
        margin-bottom: 25px;
    }

    .timeline-item:last-child {
        margin-bottom: 0;
    }

    .timeline-dot {
        position: absolute;
        left: 12px;
        top: 4px;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        border: 2px solid #e5e7eb;
        background: white;
    }

    .timeline-item.completed .timeline-dot {
        background: #10b981;
        border-color: #10b981;
    }

    .timeline-item.pending .timeline-dot {
        background: #f59e0b;
        border-color: #f59e0b;
    }

    .timeline-item.future .timeline-dot {
        background: #e5e7eb;
        border-color: #e5e7eb;
    }

    .timeline-content h4 {
        font-size: 16px;
        font-weight: 600;
        color: #1f2937;
        margin-bottom: 5px;
    }

    .timeline-content p {
        font-size: 14px;
        color: #6b7280;
        margin: 0;
    }

    .timeline-item.completed .timeline-content h4 {
        color: #10b981;
    }

    .timeline-item.pending .timeline-content h4 {
        color: #f59e0b;
    }

    .notification-actions {
        padding: 20px;
        background: #f8fafc;
        border-top: 1px solid #e5e7eb;
        display: flex;
        gap: 15px;
    }

    .btn-action {
        flex: 1;
        padding: 12px 20px;
        border-radius: 8px;
        border: none;
        cursor: pointer;
        font-weight: 500;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s ease;
    }

    .btn-action.primary {
        background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
        color: white;
    }

    .btn-action.primary:hover {
        background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
        transform: translateY(-1px);
    }

    .btn-action.secondary {
        background: white;
        color: #6b7280;
        border: 1px solid #d1d5db;
    }

    .btn-action.secondary:hover {
        background: #f3f4f6;
        color: #374151;
    }

    /* Loading Minimalis */
    .loading-container {
        text-align: center;
        padding: 30px 20px;
    }

    .loading-spinner {
        width: 24px;
        height: 24px;
        border: 3px solid #f3f4f6;
        border-top: 3px solid #3b82f6;
        border-radius: 50%;
        animation: spin 1s linear infinite;
        margin: 0 auto 15px;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loading-container p {
        color: #4b5563;
        font-size: 16px;
        font-weight: 500;
        margin: 0;
    }

    .loading-popup {
        border-radius: 16px !important;
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15) !important;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .requirement-cards {
            grid-template-columns: 1fr;
        }
        
        .action-buttons, .card-footer, .notification-actions {
            flex-direction: column;
        }
        
        .glass-container, .card-body {
            padding: 30px 20px;
        }
    }
</style>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
@endif