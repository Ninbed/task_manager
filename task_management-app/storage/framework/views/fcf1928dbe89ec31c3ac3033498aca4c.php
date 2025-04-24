

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h2 class="mb-0 py-2">Completed Tasks</h2>
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="list-group-item px-4 py-3">
                        <div>
                            <strong class="text-success fs-5"><?php echo e($task->title); ?></strong>
                            <?php if($task->description): ?>
                                <p class="text-muted mb-1"><?php echo e(Str::limit($task->description, 100)); ?></p>
                            <?php endif; ?>
                            <small class="text-secondary">
                                Completed: <?php echo e($task->completed_at ? $task->completed_at->format('d M Y H:i') : 'Not set'); ?>

                                <?php if($task->due_date): ?>
                                    | Due: <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?>

                                <?php endif; ?>
                            </small>
                        </div>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="list-group-item text-center py-4 text-muted">
                        No completed tasks yet.
                    </li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\task_management-app\resources\views/tasks/completed.blade.php ENDPATH**/ ?>