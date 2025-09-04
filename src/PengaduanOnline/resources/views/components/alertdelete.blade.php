<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    const deleteButtons = document.querySelectorAll('.btn-delete');

    deleteButtons.forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const form = this.closest('form');

            Swal.fire({
                title: 'Konfirmasi Penghapusan',
                html: `
                    <div class="text-center">
                        <div class="mb-4">
                            <svg class="mx-auto h-16 w-16 text-blue-500 animate-pulse" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                            </svg>
                        </div>
                        <p class="text-gray-600 mb-2">Data yang dihapus tidak dapat dikembalikan.</p>
                        <p class="text-sm text-gray-500">Apakah Anda yakin ingin melanjutkan?</p>
                    </div>
                `,
                icon: false,
                showCancelButton: true,
                confirmButtonText: `
                    <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                    </svg>
                    Hapus
                `,
                cancelButtonText: `
                    <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                    Batal
                `,
                buttonsStyling: false,
                reverseButtons: true,
                focusConfirm: false,
                focusCancel: true,
                allowOutsideClick: false,
                allowEscapeKey: true,
                showClass: {
                    popup: 'animate__animated animate__fadeInDown animate__faster'
                },
                hideClass: {
                    popup: 'animate__animated animate__fadeOutUp animate__faster'
                },
                customClass: {
                    popup: `
                        bg-white rounded-2xl shadow-2xl border-0 
                        backdrop-blur-sm backdrop-filter 
                        max-w-md mx-auto p-6 
                        relative overflow-hidden
                        before:absolute before:inset-0 
                        before:bg-gradient-to-br before:from-white/20 before:to-transparent 
                        before:backdrop-blur-sm before:z-0
                    `,
                    title: `
                        text-2xl font-bold text-gray-800 mb-4 
                        relative z-10 tracking-tight
                    `,
                    htmlContainer: `
                        text-base text-gray-600 mb-6 
                        relative z-10 leading-relaxed
                    `,
                    actions: `
                        flex flex-row gap-3 justify-center 
                        relative z-10 w-full
                    `,
                    confirmButton: `
                        bg-gradient-to-r from-red-500 to-red-600 
                        hover:from-red-600 hover:to-red-700 
                        text-white font-semibold 
                        px-6 py-3 rounded-xl 
                        transition-all duration-300 
                        transform hover:scale-105 hover:shadow-lg
                        focus:outline-none focus:ring-4 focus:ring-red-200
                        active:scale-95
                        flex items-center justify-center
                        min-w-[120px] order-2 sm:order-1
                    `,
                    cancelButton: `
                        bg-gradient-to-r from-gray-100 to-gray-200 
                        hover:from-gray-200 hover:to-gray-300 
                        text-gray-700 font-semibold 
                        px-6 py-3 rounded-xl 
                        transition-all duration-300 
                        transform hover:scale-105 hover:shadow-md
                        focus:outline-none focus:ring-4 focus:ring-gray-200
                        active:scale-95
                        flex items-center justify-center
                        min-w-[120px] order-1 sm:order-2
                    `,
                    container: `
                        backdrop-blur-sm bg-black/20 
                        p-4 flex items-center justify-center
                        swal2-delete
                    `
                },
                didOpen: () => {
                    // Tambahkan efek shimmer pada background
                    const popup = Swal.getPopup();
                    popup.style.background = `
                        linear-gradient(135deg, 
                            rgba(255, 255, 255, 0.95) 0%, 
                            rgba(255, 255, 255, 0.98) 50%, 
                            rgba(255, 255, 255, 0.95) 100%
                        )
                    `;
                    
                    // Animasi subtle untuk buttons
                    const buttons = popup.querySelectorAll('.swal2-styled');
                    buttons.forEach((btn, index) => {
                        btn.style.animationDelay = `${index * 0.1}s`;
                        btn.classList.add('animate__animated', 'animate__fadeInUp', 'animate__faster');
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // Tampilkan loading state
                    Swal.fire({
                        title: 'Menghapus...',
                        html: `
                            <div class="flex items-center justify-center">
                                <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-red-500"></div>
                            </div>
                            <p class="mt-4 text-gray-600">Sedang memproses penghapusan data</p>
                        `,
                        showConfirmButton: false,
                        allowOutsideClick: false,
                        allowEscapeKey: false,
                        customClass: {
                            popup: 'bg-white rounded-2xl shadow-xl border-0 max-w-sm mx-auto p-6',
                            container: 'swal2-delete'
                        }
                    });
                    
                    // Simulate form submission dengan delay
                    setTimeout(() => {
                        form.submit();
                    }, 1000);
                }
            });
        });
    });

    // Tambahkan CSS untuk animasi (jika belum ada animate.css)
    if (!document.querySelector('link[href*="animate.css"]')) {
        const animateCSS = document.createElement('link');
        animateCSS.rel = 'stylesheet';
        animateCSS.href = 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css';
        document.head.appendChild(animateCSS);
    }

    // Tambahkan custom CSS untuk mobile responsiveness
    const customStyle = document.createElement('style');
    customStyle.textContent = `
        /* Mobile responsive improvements - memastikan button tetap sejajar */
        @media (max-width: 640px) {
            .swal2-popup {
                margin: 1rem !important;
                max-width: calc(100vw - 2rem) !important;
                padding: 1rem !important;
            }
            
            .swal2-title {
                font-size: 1.25rem !important;
                margin-bottom: 0.75rem !important;
            }
            
            .swal2-html-container {
                font-size: 0.875rem !important;
                margin-bottom: 1rem !important;
            }
            
            /* PENTING: Pastikan button tetap dalam satu baris */
            .swal2-actions {
                display: flex !important;
                flex-direction: row !important;
                justify-content: center !important;
                align-items: center !important;
                gap: 0.5rem !important;
                margin-top: 1rem !important;
                width: 100% !important;
                flex-wrap: nowrap !important;
            }
            
            .swal2-styled {
                font-size: 0.875rem !important;
                padding: 0.625rem 1rem !important;
                min-height: 2.5rem !important;
                flex: 1 !important;
                max-width: 48% !important;
                min-width: 100px !important;
                margin: 0 !important;
                white-space: nowrap !important;
                overflow: hidden !important;
                text-overflow: ellipsis !important;
            }
            
            .swal2-icon {
                margin-bottom: 0.75rem !important;
            }
            
            .swal2-icon svg {
                width: 3rem !important;
                height: 3rem !important;
            }
        }
        
        /* Untuk layar sangat kecil - tetap pertahankan button sejajar */
        @media (max-width: 360px) {
            .swal2-popup {
                margin: 0.5rem !important;
                max-width: calc(100vw - 1rem) !important;
            }
            
            .swal2-styled {
                font-size: 0.75rem !important;
                padding: 0.5rem 0.75rem !important;
                max-width: 48% !important;
                min-width: 90px !important;
            }
            
            /* Kurangi gap pada layar sangat kecil */
            .swal2-actions {
                gap: 0.25rem !important;
            }
        }
        
        /* Force button container to stay horizontal */
        .swal2-actions {
            display: flex !important;
            flex-direction: row !important;
            flex-wrap: nowrap !important;
        }
        
        .swal2-backdrop-show {
            animation: swal2-backdrop-show 0.3s ease-out !important;
        }
        
        @keyframes swal2-backdrop-show {
            from {
                opacity: 0;
            }
            to {
                opacity: 1;
            }
        }
        
        .swal2-container.swal2-delete {
            backdrop-filter: blur(8px) !important;
        }
        
        /* Tambahan untuk memastikan button tidak pernah wrap */
        .swal2-actions > * {
            flex-shrink: 1 !important;
        }
    `;
    document.head.appendChild(customStyle);
});
</script>