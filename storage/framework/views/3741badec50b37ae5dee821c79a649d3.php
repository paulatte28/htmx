<!-- partials/diary.blade.php -->
<tr id="diary-<?php echo e($diary->id); ?>">
    <td>
        <span hx-target="this" hx-swap="outerHTML" hx-get="<?php echo e(route('diary.edit', $diary->id)); ?>">
            <?php echo e($diary->title); ?>

        </span>
    </td>
    <td>
        <a href="<?php echo e(route('diary.show', $diary->id)); ?>" class="btn btn-info">View</a>
        <button hx-get="<?php echo e(route('diary.edit', $diary->id)); ?>"
                hx-target="#diary-<?php echo e($diary->id); ?>"
                hx-swap="outerHTML"
                class="btn btn-warning">
            Edit
        </button>
        <button hx-delete="<?php echo e(route('diary.destroy', $diary->id)); ?>"
                hx-headers='{"X-CSRF-TOKEN": "<?php echo e(csrf_token()); ?>" }'
                hx-target="#diary-<?php echo e($diary->id); ?>"
                hx-swap="outerHTML"
                hx-confirm="Are you sure you want to delete this entry?"
                class="btn btn-danger">
            Delete
        </button>
    </td>
</tr><?php /**PATH D:\xampp\htdocs\Laravel_Coretico - Copy\resources\views/partials/diary.blade.php ENDPATH**/ ?>