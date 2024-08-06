<div wire:ignore>
    <div class="dropzone" <?php echo e($attributes); ?>></div>
</div>

<?php $__env->startPush('scripts'); ?>
    <script>
        Dropzone.options[_.camelCase("<?php echo e($attributes['id']); ?>")] = {
    maxFilesize: <?php echo e($attributes['max-file-size'] ?? 2); ?>,
    maxFiles: <?php echo e($attributes['max-files'] ?? 'null'); ?>,
    addRemoveLinks: true,
    headers: {
        'X-CSRF-TOKEN': "<?php echo e(csrf_token()); ?>"
    },
    params: {
<?php if($attributes['max-width']): ?>
      max_width: <?php echo e($attributes['max-width']); ?>,
<?php endif; ?>
<?php if($attributes['max-height']): ?>
      max_height: <?php echo e($attributes['max-height']); ?>,
<?php endif; ?>
      size: <?php echo e($attributes['max-file-size'] ?? 2); ?>,
      model_id: <?php echo e($attributes['model-id'] ?? 0); ?>,
      collection_name: "<?php echo e($attributes['collection-name'] ?? 'default'); ?>"
    },
    success: function (file, response) {
window.livewire.find('<?php echo e($_instance->id); ?>').addMedia(response.media)
    },
    removedfile: function (file) {
        file.previewElement.remove()

        if (file.status === 'error') {
            return;
        }

        if (file.xhr) {
            var response = JSON.parse(file.xhr.response)
window.livewire.find('<?php echo e($_instance->id); ?>').removeMedia(response.media)
        } else {
window.livewire.find('<?php echo e($_instance->id); ?>').removeMedia(file)

            if (this.options.maxFiles !== null) {
                this.options.maxFiles++
            }
        }
    },
    init: function () {
        document.addEventListener("livewire:load", () => {
            let files = window.livewire.find('<?php echo e($_instance->id); ?>').mediaCollections["<?php echo e($attributes['collection-name'] ?? 'default'); ?>"]
            if (files !== undefined && files.length) {
                files.forEach(file => {
                    let fileClone = JSON.parse(JSON.stringify(file))
                    this.files.push(fileClone)
                    this.emit("addedfile", fileClone)

                    if (fileClone.preview_thumbnail !== undefined) {
                        this.emit("thumbnail", fileClone, fileClone.preview_thumbnail)
                    } else {
                        this.emit("thumbnail", fileClone, fileClone.url)
                    }

                    this.emit("complete", fileClone)
                    if (this.options.maxFiles !== null) {
                        this.options.maxFiles--
                    }
                })
            }
        });
    },
    error: function (file, response) {
        file.previewElement.classList.add('dz-error')
        let message = $.type(response) === 'string' ? response : response.errors.file
        return _.map(file.previewElement.querySelectorAll('[data-dz-errormessage]'), r => r.textContent = message)
    }
}
    </script>
<?php $__env->stopPush(); ?><?php /**PATH /home/omar/omar/Marketopia/coupon-demo/resources/views/components/dropzone.blade.php ENDPATH**/ ?>