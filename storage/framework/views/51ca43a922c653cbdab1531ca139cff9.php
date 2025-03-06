<!-- diary/index.blade.php -->


<?php $__env->startSection('content'); ?>
<div class="container">
    <h1>Diary Entries</h1>

    <!-- Create Form -->
    <form hx-post="<?php echo e(route('diary.store')); ?>"
          hx-target="#diary-list"
          hx-swap="beforeend"
          hx-on::after-request="this.reset()"
          class="card shadow-lg p-4 mb-4"
          style="max-width: 500px; border-radius: 10px;">
        <?php echo csrf_field(); ?>
        <h3 class="text-center text-primary mb-3 fw-bold">Create a New Diary Entry</h3>
        
        <div class="mb-3">
            <label for="title" class="form-label fw-bold">Title</label>
            <input type="text" name="title" id="title" class="form-control border-primary shadow-sm"
                   placeholder="Enter title" required>
        </div>
        
        <div class="mb-3">
            <label for="content" class="form-label fw-bold">Content</label>
            <textarea name="content" id="content" class="form-control border-primary shadow-sm"
                      rows="4" placeholder="Write your thoughts..." required></textarea>
        </div>
        
        <div class="text-center">
            <button type="submit" class="btn btn-success w-100 fw-bold shadow">Create Diary Entry</button>
        </div>
    </form>

    <!-- Diary List -->
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="diary-list">
            <?php $__currentLoopData = $diaries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $diary): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr id="diary-<?php echo e($diary->id); ?>">
                <td><?php echo e($diary->title); ?></td>
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
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xampp\htdocs\Laravel_Coretico - Copy\resources\views/diary/index.blade.php ENDPATH**/ ?>