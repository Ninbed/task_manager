<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #e3f2fd; }
        .sidebar { width: 250px; height: 100vh; background: #ffffff; padding: 20px; position: fixed; }
        .profile-circle {
            width: 40px; height: 40px; background-color: #0d47a1;
            color: white; font-weight: bold; border-radius: 50%;
            display: flex; justify-content: center; align-items: center;
            cursor: pointer;
        }
        .main-content { margin-left: 470px; padding: 20px; }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="#">Task Manager</a>
            <div class="d-flex">
                <form action="<?php echo e(route('logout')); ?>" method="POST" class="me-3">
                    <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
                    <button class="btn btn-danger" type="submit">Logout</button>
                </form>
                <div class="profile-circle">
                    <?php echo e(substr(Auth::user()->name, 0, 2)); ?>

                </div>
            </div>
        </div>
    </nav>

    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h5></h5>
            <hr>
            <ul class="nav flex-column">
                <li class="nav-item"><button class="btn btn-primary w-100" data-bs-toggle="modal" data-bs-target="#newTaskModal"><i class="fa fa-plus"></i> New Task</button></li>
                <li class="nav-item"><a class="nav-link mt-2" href="<?php echo e(route('tasks.index')); ?>"><i class="fa fa-file"></i> My Tasks</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tasks.notifications')); ?>"><i class="fa fa-bell"></i> Notifications</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tasks.today')); ?>"><i class="fa fa-calendar-alt"></i> Today</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tasks.upcoming')); ?>"><i class="fa fa-clock"></i> Upcoming</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo e(route('tasks.completed')); ?>"><i class="fa fa-check-circle"></i> Completed</a></li>
            </ul>
        </div>

        
        <!-- Main Content -->
<div class="main-content">
    <!-- Welcome Section -->
    <div class="row mb-4">
        <div class="col">
            <h2>Welcome Back, <?php echo e(Auth::user()->name); ?>!</h2>
            <p class="text-muted">Stay organized and keep track of your tasks with ease.</p>
        </div>
    </div>

     <!-- Books and Clock Illustration with Action Buttons -->
     <div class="row mb-4">
        <div class="col-md-6 mb-3 d-flex">
            <div class="card shadow-sm text-center flex-fill">
                <div class="card-body">
                    <!-- Books Illustration -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#0d47a1" class="bi bi-journal-bookmark mb-3" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M6 8V1h1v6.117L8.743 6.07a.5.5 0 0 1 .514 0L11 7.117V1h1v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8z"/>
                        <path d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z"/>
                        <path d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z"/>
                    </svg>
                    <h5 class="card-title">Today's Tasks</h5>
                    <p class="card-text text-muted">View and manage tasks due today.</p>
                    <a href="<?php echo e(route('tasks.today')); ?>" class="btn btn-primary  btn-lg w-100">
                        <i class="fas fa-calendar-day me-2"></i> Go to Today
                    </a>
                </div>
            </div>
        </div>
        <div class="col-md-6 mb-3">
            <div class="card shadow-sm text-center">
                <div class="card-body">
                    <!-- Clock Illustration -->
                    <svg xmlns="http://www.w3.org/2000/svg" width="80" height="80" fill="#0d47a1" class="bi bi-clock mb-3" viewBox="0 0 16 16">
                        <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                    </svg>
                    <h5 class="card-title">Upcoming Tasks</h5>
                    <p class="card-text text-muted">Plan ahead for upcoming deadlines.</p>
                    <a href="<?php echo e(route('tasks.upcoming')); ?>" class="btn btn-danger btn-lg w-100">
                        <i class="fas fa-clock me-2"></i> Go to Upcoming
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Motivational Quote -->
    <div class="row">
        <div class="col">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h5 class="card-title">Motivational Quote</h5>
                    <p class="card-text text-muted">"The secret of getting ahead is getting started." – Mark Twain</p>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>

    <!-- New Task Modal -->
    <div class="modal fade" id="newTaskModal" tabindex="-1" aria-labelledby="newTaskModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Create New Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?php echo e(route('tasks.store')); ?>" method="POST">
                    <?php echo csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label">Title</label>
                            <input type="text" name="title" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control"></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Due Date</label>
                            <input type="date" name="due_date" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Create</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\xampp\htdocs\task_management-app\resources\views/home.blade.php ENDPATH**/ ?>