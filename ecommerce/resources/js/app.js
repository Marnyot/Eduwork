import Alpine from 'alpinejs';
import Cropper from 'cropperjs';
import 'cropperjs/dist/cropper.css';

window.Alpine = Alpine;

Alpine.data('imageCropper', ({ current, aspect }) => ({
    cropped: null,
    existingUrl: current,
    cropper: null,
    modal: null,

    get previewUrl() {
        return this.cropped || this.existingUrl;
    },

    init() {
        this.modal = new bootstrap.Modal(this.$refs.cropModal);
    },

    onFileChange(event) {
        const file = event.target.files[0];
        if (file) this.openCropper(file);
    },

    onDrop(event) {
        const file = event.dataTransfer.files[0];
        if (file && file.type.startsWith('image/')) this.openCropper(file);
    },

    openCropper(file) {
        const reader = new FileReader();
        reader.onload = () => {
            this.$refs.cropImage.src = reader.result;
            this.modal.show();
            this.$refs.cropModal.addEventListener('shown.bs.modal', () => {
                this.cropper?.destroy();
                this.cropper = new Cropper(this.$refs.cropImage, {
                    aspectRatio: aspect,
                    viewMode: 1,
                    autoCropArea: 1,
                });
            }, { once: true });
        };
        reader.readAsDataURL(file);
    },

    confirmCrop() {
        const canvas = this.cropper.getCroppedCanvas({ maxWidth: 1200, maxHeight: 1200 });
        this.cropped = canvas.toDataURL('image/jpeg', 0.9);
        this.cropper.destroy();
        this.cropper = null;
        this.modal.hide();
    },

    useFullImage() {
        const targetWidth = 1200;
        const targetHeight = Math.round(targetWidth / aspect);

        const canvas = document.createElement('canvas');
        canvas.width = targetWidth;
        canvas.height = targetHeight;

        const ctx = canvas.getContext('2d');
        ctx.fillStyle = '#f2efe9';
        ctx.fillRect(0, 0, targetWidth, targetHeight);

        const img = this.$refs.cropImage;
        const scale = Math.min(targetWidth / img.naturalWidth, targetHeight / img.naturalHeight);
        const w = img.naturalWidth * scale;
        const h = img.naturalHeight * scale;
        ctx.drawImage(img, (targetWidth - w) / 2, (targetHeight - h) / 2, w, h);

        this.cropped = canvas.toDataURL('image/jpeg', 0.9);
        this.cropper?.destroy();
        this.cropper = null;
        this.modal.hide();
    },
}));

Alpine.start();
