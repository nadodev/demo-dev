<div id="toaster-container" style="position: fixed; top: 1rem; right: 1rem; z-index: 9999; display: flex; flex-direction: column; gap: 0.5rem;">
</div>

<script>
class Toaster {
    constructor() {
        this.container = document.getElementById('toaster-container');
        this.toasts = new Map();
        this.init();
    }

    init() {
        this.checkFlashMessages();
    }

    checkFlashMessages() {
        const successMessage = @json(session('success'));
        const errorMessage = @json(session('error'));
        const warningMessage = @json(session('warning'));
        const infoMessage = @json(session('info'));

        if (successMessage) {
            this.show('success', successMessage);
        }
        if (errorMessage) {
            this.show('error', errorMessage);
        }
        if (warningMessage) {
            this.show('warning', warningMessage);
        }
        if (infoMessage) {
            this.show('info', infoMessage);
        }
    }

    show(type, message, duration = 5000) {
        const id = Date.now() + Math.random();
        const toast = this.createToast(id, type, message);
        
        this.container.appendChild(toast);
        this.toasts.set(id, toast);

        setTimeout(() => {
            toast.style.transform = 'translateX(0)';
            toast.style.opacity = '1';
        }, 10);

        setTimeout(() => {
            this.remove(id);
        }, duration);

        return id;
    }

    createToast(id, type, message) {
        const toast = document.createElement('div');
        toast.id = `toast-${id}`;
        
        toast.style.cssText = `
            transform: translateX(100%);
            transition: all 0.3s ease-in-out;
            max-width: 24rem;
            width: 100%;
            background-color: white;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
            border-radius: 0.5rem;
            pointer-events: auto;
            border: 1px solid rgba(0, 0, 0, 0.1);
            overflow: hidden;
            opacity: 0;
            margin-bottom: 0.5rem;
        `;
        
        const borderColors = {
            success: '#10b981',
            error: '#ef4444',
            warning: '#f59e0b',
            info: '#3b82f6'
        };
        
        toast.style.borderLeft = `4px solid ${borderColors[type]}`;
        
        const icons = {
            success: 'fas fa-check-circle',
            error: 'fas fa-exclamation-circle',
            warning: 'fas fa-exclamation-triangle',
            info: 'fas fa-info-circle'
        };

        const iconColors = {
            success: '#10b981',
            error: '#ef4444',
            warning: '#f59e0b',
            info: '#3b82f6'
        };

        const textColors = {
            success: '#065f46',
            error: '#991b1b',
            warning: '#92400e',
            info: '#1e40af'
        };

        toast.innerHTML = `
            <div style="padding: 1rem;">
                <div style="display: flex; align-items: flex-start;">
                    <div style="flex-shrink: 0;">
                        <i class="${icons[type]}" style="color: ${iconColors[type]}; font-size: 1.25rem;"></i>
                    </div>
                    <div style="margin-left: 0.75rem; flex: 1; min-width: 0;">
                        <p style="font-size: 0.875rem; font-weight: 500; color: ${textColors[type]}; margin: 0;">
                            ${message}
                        </p>
                    </div>
                    <div style="margin-left: 1rem; flex-shrink: 0; display: flex;">
                        <button onclick="toaster.remove(${id})" style="background: white; border: none; border-radius: 0.375rem; display: inline-flex; color: #9ca3af; cursor: pointer; padding: 0.25rem;" onmouseover="this.style.color='#6b7280'" onmouseout="this.style.color='#9ca3af'">
                            <span style="position: absolute; width: 1px; height: 1px; padding: 0; margin: -1px; overflow: hidden; clip: rect(0, 0, 0, 0); white-space: nowrap; border: 0;">Fechar</span>
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>
        `;

        return toast;
    }

    remove(id) {
        const toast = this.toasts.get(id);
        if (!toast) return;

        toast.style.transform = 'translateX(100%)';
        toast.style.opacity = '0';

        setTimeout(() => {
            if (toast.parentNode) {
                toast.parentNode.removeChild(toast);
            }
            this.toasts.delete(id);
        }, 300);
    }

    clear() {
        this.toasts.forEach((toast, id) => {
            this.remove(id);
        });
    }
}

document.addEventListener('DOMContentLoaded', function() {
    window.toaster = new Toaster();
});

window.showToast = function(type, message, duration) {
    return window.toaster.show(type, message, duration);
};

window.showSuccess = function(message, duration) {
    return window.toaster.show('success', message, duration);
};

window.showError = function(message, duration) {
    return window.toaster.show('error', message, duration);
};

window.showWarning = function(message, duration) {
    return window.toaster.show('warning', message, duration);
};

window.showInfo = function(message, duration) {
    return window.toaster.show('info', message, duration);
};
</script>