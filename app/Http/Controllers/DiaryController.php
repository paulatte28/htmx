<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Diary;
use Illuminate\Support\Facades\Log;

class DiaryController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        Log::info("Fetching diaries for user ID: " . $userId);
        $diaries = Diary::where('user_id', $userId)->get();
        return view('diary.index', compact('diaries'));
    }

        public function create()
    {
        // No longer needed since form is in index
        return redirect()->route('dashboard');
    }

        public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        Log::info("Creating new diary entry for user ID: " . Auth::id());

        $diary = Diary::create([
            'title' => $validatedData['title'],
            'content' => $validatedData['content'],
            'user_id' => Auth::id(),
        ]);

        if ($request->header('HX-Request')) {
            return view('partials.diary', compact('diary'));
        }

        return redirect()->route('dashboard')->with('success', 'Diary entry created successfully');
    }

        public function show(string $id)
    {
        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        if (request()->header('HX-Request')) {
            return view('partials.diary', compact('diary'));
        }
        return view('diary.show', compact('diary'));
    }

        public function edit(string $id)
    {
        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        if (request()->header('HX-Request')) {
            return view('diary.edit', compact('diary'));
        }
        return view('diary.edit', compact('diary')); // Could redirect to separate page if not HTMX
    }

    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);

        Log::info("Updating diary entry ID: " . $id, ['request_data' => $request->all()]);

        $diary->update($validatedData);

        if ($request->header('HX-Request')) {
            return view('partials.diary', compact('diary'));
        }

        return redirect()->route('dashboard')->with('success', 'Diary entry updated successfully');
    }

    public function destroy(string $id)
    {
        $diary = Diary::where('user_id', Auth::id())->findOrFail($id);
        
        Log::info("Deleting diary entry ID: " . $id);
        $diary->delete();

        if (request()->header('HX-Request')) {
            return response('')->withHeaders(['HX-Trigger' => 'diaryDeleted']);
        }

        return redirect()->route('dashboard')->with('success', 'Diary entry deleted successfully');
    }
}