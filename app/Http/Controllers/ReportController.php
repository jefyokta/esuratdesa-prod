<?php

namespace App\Http\Controllers;

use App\Models\Letter;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $start = $request->query('start');
        $end = $request->query('end');

        $status = 1;

        $query = Letter::with(['category', 'resident', 'villageManager'])
            ->where('status', $status);

        if ($start && $end) {
            $query->whereBetween('created_at', [$start, $end]);
        }
        $letters = $query->paginate(50);

        return view("pages.dashboard.report.index", compact('letters', 'status'));
    }
    public function print(Request $request) {

        $status = 1;
        $letters = Letter::with(['category', 'resident', 'villageManager'])
            ->where('status', $status)
            ->paginate(50);

        $pdf = Pdf::loadView('pages.dashboard.report.pdf', compact('letters', 'status'));
        return $pdf->download('report.pdf');
    }
}
