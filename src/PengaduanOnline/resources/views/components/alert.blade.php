<!-- SweetAlert2 Toast Notification -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const commonOptions = {
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3500,
            timerProgressBar: true,
            color: '#2d3748',
            customClass: {
                popup: 'rounded-2xl shadow-2xl backdrop-blur-sm px-6 py-4',
                title: 'font-semibold text-base', // <-- font size dibesarkan
                icon: 'text-2xl', // <-- ikon dibuat lebih besar
                timerProgressBar: ''
            },
            didOpen: (toast) => {
                toast.addEventListener('mouseenter', Swal.stopTimer)
                toast.addEventListener('mouseleave', Swal.resumeTimer)
            }
        };

        @if(session('success'))
            Swal.fire({
                ...commonOptions,
                icon: 'success',
                title: '{{ session('success') }} 🎉',
                background: 'linear-gradient(to right, #a1c4fd, #c2e9fb)',
                customClass: {
                    ...commonOptions.customClass,
                    timerProgressBar: 'bg-blue-600'
                }
            });
        @endif

        @if(session('error'))
            Swal.fire({
                ...commonOptions,
                icon: 'error',
                title: '{{ session('error') }} 😢',
                background: 'linear-gradient(to right, #fbc2eb, #a6c1ee)',
                customClass: {
                    ...commonOptions.customClass,
                    timerProgressBar: 'bg-pink-600'
                }
            });
        @endif
    });
</script>
