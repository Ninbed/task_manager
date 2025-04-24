

<?php $__env->startSection('content'); ?>
<div class="notifications-container">
    <div class="notifications-header">
        <h2 class="mb-0">Tasks Due Today</h2>
    </div>
    <div class="notifications-body">
        <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <div class="section">
                <div class="task-item border-left-primary">
                    <div class="d-flex justify-content-between align-items-start">
                        <div>
                            <strong class="fs-5 text-dark"><?php echo e($task->title); ?></strong>
                            <?php if($task->description): ?>
                                <p class="text-muted mb-1"><?php echo e(Str::limit($task->description, 100)); ?></p>
                            <?php endif; ?>
                            <small class="text-secondary">
                                Due: <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?>

                            </small>
                        </div>
                        <div class="status">
                            <strong>Status: </strong>
                            <span class="badge bg-<?php echo e($task->status === 'pending' ? 'secondary' : 'warning'); ?>">
                                <?php echo e(ucfirst($task->status)); ?>

                            </span>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="text-muted text-center py-3">No tasks due today.</p>
        <?php endif; ?>
    </div>
</div>

<style>
    .notifications-container {
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
        height: calc(100vh - 120px); /* Adjust for navbar height */
        margin: 10px 20px; /* Margins around the container */
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .notifications-header {
        background: #f8f9fa;
        padding: 1.5rem;
        border-bottom: 1px solid #dee2e6;
    }

    .notifications-header h2 {
        font-size: 1.5rem;
        font-weight: 600;
        color: #333;
        margin: 0;
    }

    .notifications-body {
        flex: 1;
        overflow-y: auto;
        padding: 1rem;
    }

    .section {
        margin-bottom: 0.5rem;
    }

    .task-item {
        border-left: 4px solid transparent;
        border-left-color: #0d6efd;
        background: #fff;
        border-radius: 5px;
        padding: 1rem 1.5rem;
        margin-bottom: 0.5rem;
        transition: box-shadow 0.2s ease;
    }

    .task-item:hover {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    }

    .task-item strong {
        color: #333;
    }

    .task-item p {
        margin: 0.25rem 0;
        font-size: 0.9rem;
    }

    .task-item small {
        font-size: 0.85rem;
    }

    .status {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .badge {
        font-size: 0.85rem;
        padding: 0.25rem 0.75rem;
        border-radius: 12px;
    }

    .text-center {
        padding: 1.5rem 0;
    }

    @media (max-width: 767px) {
        .notifications-container {
            margin: 5px;
            height: calc(100vh - 100px);
        }

        .notifications-header {
            padding: 1rem;
        }

        .notifications-header h2 {
            font-size: 1.25rem;
        }

        .task-item {
            padding: 0.75rem 1rem;
        }
    }
</style>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\task_management-app\resources\views/tasks/today.blade.php ENDPATH**/ ?>