<?php
namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TaskController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->where('status', '!=', 'completed') // Only show pending and started tasks
            ->latest()
            ->get();

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }

    public function store(Request $request)
    {
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to create a task.');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date|after_or_equal:today',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
    }

    public function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('home')->with('success', 'Task updated successfully!');
    }

    public function home()
    {
        $tasks = Task::where('user_id', auth()->id())->latest()->get();
        return view('home', compact('tasks'));
    }

    public function updateStatus(Request $request, Task $task)
    {
        if ($task->user_id !== auth()->id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'status' => 'required|in:pending,started,completed',
        ]);

        $task->update([
            'status' => $request->status,
            'completed_at' => $request->status === 'completed' ? now() : null,
        ]);

        return response()->json(['success' => 'Task status updated successfully!']);
    }
    public function destroy(Task $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }

    public function notifications()
    {
        $userId = auth()->id();
        $today = Carbon::today();

        // Due tomorrow
        $dueTomorrow = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->whereDate('due_date', $today->copy()->addDay())
            ->get();

        // Due next week ( 7 days from now)
        $dueNextWeek = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->where('due_date', $today->copy()->addDays(7))
            ->get();

        // Due next month ( 30 days from now)
        $dueNextMonth = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->where('due_date', [
                $today->copy()->addMonth()
            ])
            ->get();

        return view('tasks.notifications', compact('dueTomorrow', 'dueNextWeek', 'dueNextMonth'));
    }

    // New method for Completed Tasks
    public function completed()
    {
        $tasks = Task::where('user_id', auth()->id())
            ->where('status', 'completed')
            ->latest('completed_at')
            ->get();

        return view('tasks.completed', compact('tasks'));
    }

    public function today()
    {
        $userId = auth()->id();
        $today = Carbon::today();

        $tasks = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->whereDate('due_date', $today)
            ->get();

        return view('tasks.today', compact('tasks'));
    }

    public function upcoming()
    {
        $userId = auth()->id();
        $today = Carbon::today();

        $tasks = Task::where('user_id', $userId)
            ->where('status', '!=', 'completed')
            ->whereBetween('due_date', [
                $today,
                $today->copy()->addDays(7),
            ])
            ->get();

        return view('tasks.upcoming', compact('tasks'));
    }

    public function show(Task $task)
    {
        return view('your.view', compact('task'));
    }
}   
