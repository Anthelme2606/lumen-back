<div class="toast-container"></div>
<script>
    function showToast(type, message) {
        const toastContainer = document.querySelector('.toast-container');

        const toast = document.createElement('div');
        toast.className = `toast toast-${type} show`;

        const toastIcon = document.createElement('i');
        toastIcon.className = `mdi mdi-${getIcon(type)}`;

        const toastMessage = document.createElement('div');
        toastMessage.className = 'toast-message';
        toastMessage.textContent = message;

        const toastClose = document.createElement('div');
        toastClose.className = 'toast-close';
        toastClose.textContent = '×';
        toastClose.onclick = () => {
            toast.classList.remove('show');
            setTimeout(() => {
                toastContainer.removeChild(toast);
            }, 300);
        };

        toast.appendChild(toastIcon);
        toast.appendChild(toastMessage);
        toast.appendChild(toastClose);
        toastContainer.appendChild(toast);

        setTimeout(() => {
            toast.classList.remove('show');
            setTimeout(() => {
                if (toast.parentNode) {
                    toastContainer.removeChild(toast);
                }
            }, 300);
        }, 5000); // 5 seconds
    }

    function getIcon(type) {
        switch(type) {
            case 'success': return 'check-circle';
            case 'error': return 'alert-circle';
            case 'info': return 'information';
            case 'warning': return 'alert';
            default: return '';
        }
    }

    @if (session('error'))
        showToast('error', "{{ session('error') }}");
    @endif

    @if (session('success'))
        showToast('success', "{{ session('success') }}");
    @endif

    @if (session('info'))
        showToast('info', "{{ session('info') }}");
    @endif

    @if (session('warning'))
        showToast('warning', "{{ session('warning') }}");
    @endif
</script>

<style>
    .toast-container {
        position: fixed;
        top: 1rem;
        right: 1rem;
        z-index: 1050;
    }
    .toast {
        display: flex;
        align-items: center;
        background-color: #fff;
        border: 1px solid #ccc;
        border-radius: 0.25rem;
        padding: 0.75rem 1.25rem;
        margin-bottom: 1rem;
        box-shadow: 0 0.25rem 0.75rem rgba(0, 0, 0, 0.1);
        opacity: 0;
        transition: opacity 0.3s ease-in-out;
        width: 300px;
        max-width: 100%;
        word-wrap: break-word;
    }
    .toast.show {
        opacity: 1;
    }
    .toast .toast-close {
        margin-left: auto;
        cursor: pointer;
    }
    .toast .mdi {
        margin-right: 0.5rem;
    }
    .toast-success {
        border-left: 4px solid #28a745;
        color: #fff;
        background-color: #19e94a;
        border-color: #c3e6cb;
    }
    .toast-error {
        border-left: 4px solid #dc3545;
        color: #721c24;
        background-color: #f8d7da;
        border-color: #f5c6cb;
    }
    .toast-info {
        border-left: 4px solid #17a2b8;
        color: #0c5460;
        background-color: #d1ecf1;
        border-color: #bee5eb;
    }
    .toast-warning {
        border-left: 4px solid #ffc107;
        color: #856404;
        background-color: #fff3cd;
        border-color: #ffeeba;
    }
</style>