<!-- diary/edit.blade.php -->
<tr id="diary-<?php echo e($diary->id); ?>">
    <td>
        <form hx-put="<?php echo e(route('diary.update', $diary->id)); ?>"
              hx-target="#diary-<?php echo e($diary->id); ?>"
              hx-swap="outerHTML">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <input type="text" class="form-control" name="title" value="<?php echo e($diary->title); ?>" required>
            <textarea class="form-control mt-2" name="content" rows="3" required><?php echo e($diary->content); ?></textarea>
            <button type="submit" class="btn btn-success mt-2">Save</button>
            <button hx-get="<?php echo e(route('diary.show', $diary->id)); ?>"
                    hx-target="#diary-<?php echo e($diary->id); ?>"
                    hx-swap="outerHTML"
                    class="btn btn-secondary mt-2">
                Cancel
            </button>
        </form>
    </td>
    <td></td>
</tr><?php /**PATH D:\xampp\htdocs\Laravel_Coretico - Copy\resources\views/diary/edit.blade.php ENDPATH**/ ?>