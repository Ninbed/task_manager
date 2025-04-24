<?php
 
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;
use Illuminate\Http\Request;
 
class HomeController extends Controller
{
    public function index()
{
    $tasks = Task::where('user_id', Auth::id())->latest()->get(); // Get tasks for logged-in user
    return view('home', compact('tasks')); // Pass $tasks to the home view
}

public function home()
{
    if (!Auth::check()) {
        return redirect()->route('login')->with('error', 'You must be logged in.');
    }
    return view('home');
}

}