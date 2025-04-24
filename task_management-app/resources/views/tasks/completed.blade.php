@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-light">
            <h2 class="mb-0 py-2">Completed Tasks</h2>
        </div>
        <div class="card-body p-0">
            <ul class="list-group list-group-flush">
                @forelse($tasks as $task)
                    <li class="list-group-item px-4 py-3">
                        <div>
                            <strong class="text-success fs-5">{{ $task->title }}</strong>
                            @if($task->description)
                                <p class="text-muted mb-1">{{ Str::limit($task->description, 100) }}</p>
                            @endif
                            <small class="text-secondary">
                                Completed: {{ $task->completed_at ? $task->completed_at->format('d M Y H:i') : 'Not set' }}
                                @if($task->due_date)
                                    | Due: {{ \Carbon\Carbon::parse($task->due_date)->format('d M Y') }}
                                @endif
                            </small>
                        </div>
                    </li>
                @empty
                    <li class="list-group-item text-center py-4 text-muted">
                        No completed tasks yet.
                    </li>
                @endforelse
            </ul>
        </div>
    </div>
</div>

<style>
    .card {
        border-radius: 10px;
    }
</style>
@endsection