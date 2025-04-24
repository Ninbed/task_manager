

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h2 class="mb-0 py-2">Notifications</h2>
        </div>
        <div class="card-body p-0">
            <!-- Due Tomorrow -->
            <div class="p-3">
                <h4 class="text-primary">Due Tomorrow</h4>
                <?php $__empty_1 = true; $__currentLoopData = $dueTomorrow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center hover-effect">
                            <div>
                                <strong class="text-primary fs-5"><?php echo e($task->title); ?></strong>
                                <?php if($task->description): ?>
                                    <p class="text-muted mb-1"><?php echo e(Str::limit($task->description, 200)); ?></p>
                                <?php endif; ?>
                                <small class="text-secondary">
                                    Created: <?php echo e($task->created_at->format('d M Y H:i')); ?>

                                    <?php if($task->due_date): ?>
                                        | Due: 
                                        <?php if(\Carbon\Carbon::parse($task->due_date)->isPast()): ?>
                                            <span class="text-danger"><?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?> (Overdue)</span>
                                        <?php else: ?>
                                            <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
                                </small>
                                <div class="mt-2">
                                    <strong>Status: </strong>
                                    <span class="badge bg-<?php echo e($task->status === 'pending' ? 'secondary' : ($task->status === 'started' ? 'warning' : 'success')); ?>">
                                        <?php echo e(ucfirst($task->status)); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <!-- Status Update Buttons -->
                                
                                <!-- Edit Button -->
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" 
                                    class="btn btn-light-blue btn-sm hover-scale">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" class="d-inline" id="deleteTaskForm<?php echo e($task->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-danger btn-sm hover-scale" onclick="confirmDelete(<?php echo e($task->id); ?>)">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted px-4 py-3">No tasks due tomorrow.</p>
                <?php endif; ?>
            </div>

            <!-- Due Next Week -->
            <div class="p-3">
                <h4 class="text-primary">Due Next Week</h4>
                <?php $__empty_1 = true; $__currentLoopData = $dueNextWeek; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center hover-effect">
                            <div>
                                <strong class="text-primary fs-5"><?php echo e($task->title); ?></strong>
                                <?php if($task->description): ?>
                                    <p class="text-muted mb-1"><?php echo e(Str::limit($task->description, 200)); ?></p>
                                <?php endif; ?>
                                <small class="text-secondary">
                                    Created: <?php echo e($task->created_at->format('d M Y H:i')); ?>

                                    <?php if($task->due_date): ?>
                                        | Due: 
                                        <?php if(\Carbon\Carbon::parse($task->due_date)->isPast()): ?>
                                            <span class="text-danger"><?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?> (Overdue)</span>
                                        <?php else: ?>
                                            <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
                                </small>
                                <div class="mt-2">
                                    <strong>Status: </strong>
                                    <span class="badge bg-<?php echo e($task->status === 'pending' ? 'secondary' : ($task->status === 'started' ? 'warning' : 'success')); ?>">
                                        <?php echo e(ucfirst($task->status)); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <!-- Status Update Buttons -->
                                
                                <!-- Edit Button -->
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" 
                                    class="btn btn-light-blue btn-sm hover-scale">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" class="d-inline" id="deleteTaskForm<?php echo e($task->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-danger btn-sm hover-scale" onclick="confirmDelete(<?php echo e($task->id); ?>)">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted px-4 py-3">No tasks due next week.</p>
                <?php endif; ?>
            </div>

            <!-- Due Next Month -->
            <div class="p-3">
                <h4 class="text-primary">Due Next Month</h4>
                <?php $__empty_1 = true; $__currentLoopData = $dueNextMonth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center hover-effect">
                            <div>
                                <strong class="text-primary fs-5"><?php echo e($task->title); ?></strong>
                                <?php if($task->description): ?>
                                    <p class="text-muted mb-1"><?php echo e(Str::limit($task->description, 200)); ?></p>
                                <?php endif; ?>
                                <small class="text-secondary">
                                    Created: <?php echo e($task->created_at->format('d M Y H:i')); ?>

                                    <?php if($task->due_date): ?>
                                        | Due: 
                                        <?php if(\Carbon\Carbon::parse($task->due_date)->isPast()): ?>
                                            <span class="text-danger"><?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?> (Overdue)</span>
                                        <?php else: ?>
                                            <?php echo e(\Carbon\Carbon::parse($task->due_date)->format('d M Y')); ?>

                                        <?php endif; ?>
                                    <?php endif; ?>
                                </small>
                                <div class="mt-2">
                                    <strong>Status: </strong>
                                    <span class="badge bg-<?php echo e($task->status === 'pending' ? 'secondary' : ($task->status === 'started' ? 'warning' : 'success')); ?>">
                                        <?php echo e(ucfirst($task->status)); ?>

                                    </span>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <!-- Status Update Buttons -->
                                
                                <!-- Edit Button -->
                                <a href="<?php echo e(route('tasks.edit', $task->id)); ?>" 
                                    class="btn btn-light-blue btn-sm hover-scale">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <!-- Delete Button -->
                                <form action="<?php echo e(route('tasks.destroy', $task->id)); ?>" method="POST" class="d-inline" id="deleteTaskForm<?php echo e($task->id); ?>">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="button" class="btn btn-danger btn-sm hover-scale" onclick="confirmDelete(<?php echo e($task->id); ?>)">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </li>
                    </ul>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <p class="text-muted px-4 py-3">No tasks due next month.</p>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
    }
    
    .hover-effect:hover {
        background-color: #f8f9fa;
        transition: background-color 0.2s ease-in-out;
    }
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .btn {
        border-radius: 5px;
    }
    
    .list-group-item {
        border-left: 4px solid transparent;
    }
    
    .list-group-item:hover {
        border-left-color: #0d6efd;
    }
    
    .badge {
        font-size: 1rem;
        padding: 0.25rem 0.5rem;
    }

    /* Button Styles (matching index.blade.php) */
    .btn-warning {
        background-color: #e4c056; /* Yellow for "Started" and "Edit" buttons */
        color: #fff;
        outline: #5edda2 /* White text */
    }
    .btn-warning:hover {
        background-color: #e0a800; /* Darker yellow on hover */
    }

    .btn-success {
        background-color: #5edda2; /* Green for "Completed" button */
        color: #fff; /* White text */
    }
    .btn-success:hover {
        background-color: #02572f; /* Darker green on hover */
    }

    .btn-danger {
        background-color: #ec6774; /* Red for "Delete" button */
        color: #fff; /* White text */
    }
    .btn-danger:hover {
        background-color: #da051a; /* Darker red on hover */
    }

    .btn-light-blue {
        background-color: #87ceeb; /* Light blue (Sky Blue) */
        color: #fff; /* White text */
    }
    .btn-light-blue:hover {
        background-color: #1f0289; /* Slightly darker light blue on hover */
        color: white;
    }

    .hover-scale {
        transition: transform 0.2s ease-in-out;
    }
    .hover-scale:hover {
        transform: scale(1.05);
    }
</style>

<script>
function confirmDelete(taskId) {
    if (confirm("Are you sure you want to delete this task? This action cannot be undone.")) {
        document.getElementById('deleteTaskForm' + taskId).submit();
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\task_management-app\resources\views/tasks/notifications.blade.php ENDPATH**/ ?>