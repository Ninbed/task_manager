

<?php $__env->startSection('content'); ?>
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        
    </div>

    <!-- Task Modal -->
    <div class="modal fade" id="taskModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content shadow-lg border-0">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">New Task</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <form id="taskForm">
                        <?php echo csrf_field(); ?>
                        <input type="hidden" id="task_id">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Title</label>
                            <input type="text" class="form-control" id="title" required placeholder="Enter task title">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Description</label>
                            <textarea class="form-control" id="description" rows="4" placeholder="Describe your task..."></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Due Date</label>
                            <input type="date" class="form-control" id="due_date">
                        </div>
                        <button type="button" class="btn btn-success w-100" onclick="saveTask()">Create Task</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Tasks List -->
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h2 class="mb-0 py-2">My Tasks</h2>
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                <?php $__empty_1 = true; $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <li class="list-group-item px-4 py-3 d-flex justify-content-between align-items-center hover-effect">
                        <div>
                            <strong class="text-primary fs-5"><?php echo e($task->title); ?></strong>
                            <?php if($task->description): ?>
                                <p class="text-muted mb-1"><?php echo e(Str::limit($task->description, 100)); ?></p>
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
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-sm btn-warning" onclick="updateStatus(<?php echo e($task->id); ?>, 'started')">
                                    <i class="bi bi-play-fill"></i> Start
                                </button>
                                <button type="button" class="btn btn-sm btn-success" onclick="updateStatus(<?php echo e($task->id); ?>, 'completed')">
                                    <i class="bi bi-check-circle-fill"></i> Complete
                                </button>
                            </div>
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
                        <script>
                            function confirmDelete(taskId) {
                                if (confirm("Are you sure you want to delete this task? This action cannot be undone.")) {
                                    document.getElementById('deleteTaskForm' + taskId).submit();
                                }
                            }
                        </script>
                    </li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                    <li class="list-group-item text-center py-4 text-muted">
                        No tasks found. Create one to get started!
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

    /* Highlighted: Styles for buttons (modify these to change colors) */
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
function openTaskModal() {
    document.getElementById('task_id').value = '';
    document.getElementById('title').value = '';
    document.getElementById('description').value = '';
    document.getElementById('due_date').value = '';
    var modal = new bootstrap.Modal(document.getElementById('taskModal'));
    modal.show();
}

function saveTask() {
    let task_id = document.getElementById('task_id').value;
    let title = document.getElementById('title').value;
    let description = document.getElementById('description').value;
    let due_date = document.getElementById('due_date').value;

    let url = task_id ? `/tasks/${task_id}` : "/tasks";
    let method = task_id ? "PUT" : "POST";

    fetch(url, {
        method: method,
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ title, description, due_date })
    })
    .then(response => response.json())
    .then(data => {
        alert(data.success);
        location.reload();
    });
}

function editTask(id) {
    fetch(`/tasks/${id}/edit`)
    .then(response => response.json())
    .then(task => {
        document.getElementById('task_id').value = task.id;
        document.getElementById('title').value = task.title;
        document.getElementById('description').value = task.description;
        document.getElementById('due_date').value = task.due_date || '';
        var modal = new bootstrap.Modal(document.getElementById('taskModal'));
        modal.show();
    });
}

function deleteTask(id) {
    if (confirm("Are you sure you want to delete this task?")) {
        fetch(`/tasks/${id}`, {
            method: "DELETE",
            headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') }
        })
        .then(response => response.json())
        .then(data => {
            alert(data.success);
            location.reload();
        });
    }
}

// New function to update task status
function updateStatus(taskId, status) {
    if (confirm(`Are you sure you want to mark this task as ${status}?`)) {
        fetch(`/tasks/${taskId}/status`, {
            method: 'PUT',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ status: status })
        })
        .then(response => response.json())
        .then(data => {
            alert(data.success);
            location.reload();
        })
        .catch(error => console.error('Error updating status:', error));
    }
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\xampp\htdocs\task_management-app\resources\views/tasks/index.blade.php ENDPATH**/ ?>