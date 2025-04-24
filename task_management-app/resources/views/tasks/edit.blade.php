@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-lg border-0 max-width-700 mx-auto animate-fade-in">
        <div class="card-header bg-gradient-primary text-white">
            <h2 class="mb-0 py-3 px-4"><i class="bi bi-pencil-square me-2"></i> Edit Task</h2>
        </div>
        <div class="card-body p-5 bg-light">
            <form action="{{ route('tasks.update', $task->id) }}" method="POST" id="editTaskForm">
                @csrf
                @method('PUT')
            
                <div class="mb-4">
                    <label for="title" class="form-label fw-bold text-dark">
                        Task Title <span class="text-muted fs-6 fw-normal ms-1">(Required)</span>
                    </label>
                    <input type="text" 
                           class="form-control form-control-lg shadow-sm" 
                           id="title" 
                           name="title" 
                           value="{{ old('title', $task->title) }}" 
                           required
                           placeholder="Enter task title">
                    @error('title')
                        <div class="text-danger mt-2 small animate-error">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="mb-4">
                    <label for="description" class="form-label fw-bold text-dark">Task Description</label>
                    <textarea class="form-control shadow-sm" 
                              id="description" 
                              name="description" 
                              rows="6" 
                              placeholder="Describe your task in detail...">{{ old('description', $task->description) }}</textarea>
                    @error('description')
                        <div class="text-danger mt-2 small animate-error">{{ $message }}</div>
                    @enderror
                </div>
            
                <div class="d-flex justify-content-end gap-3">
                    <a href="{{ route('home') }}" class="btn btn-outline-secondary px-4 py-2 hover-scale">
                        <i class="bi bi-arrow-left me-2"></i>Cancel
                    </a>
                    <button type="submit" class="btn btn-primary px-4 py-2 hover-scale" id="updateTaskBtn">
                        <i class="bi bi-check2-circle me-2"></i>Update Task
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .max-width-700 {
        max-width: 700px;
    }
    
    .bg-gradient-primary {
        background: linear-gradient(45deg, #0d47a1, #1976d2);
    }
    
    .form-control {
        border: 1px solid #bbdefb;
        transition: all 0.3s ease;
    }
    
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
    }
    
    .card {
        border-radius: 15px;
        overflow: hidden;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
    }
    
    .btn {
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
    }
    
    .btn-primary {
        background: #0d6efd;
        border: none;
    }
    
    .btn-primary:hover {
        background: #0d47a1;
    }
    
    .hover-scale:hover {
        transform: scale(1.05);
    }
    
    .animate-fade-in {
        animation: fadeIn 0.5s ease-in;
    }
    
    .animate-error {
        animation: shake 0.3s ease;
    }
    
    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }
    
    @keyframes shake {
        0% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        50% { transform: translateX(5px); }
        75% { transform: translateX(-5px); }
        100% { transform: translateX(0); }
    }
</style>
@endsection