<?php

namespace App\Exports;
use App\Models\Task;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TaskExport implements FromView
{
    public function view(): View
    {
        return view('task.export', [
            'tasks' => Task::all()
        ]);
    }
}
