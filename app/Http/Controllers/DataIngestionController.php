<?php

namespace App\Http\Controllers;

use App\Services\DataIngestionService;
use Illuminate\Http\Request;

class DataIngestionController extends Controller
{
    public function ingestData(Request $request)
    {
        $csvFile = $request->file('file');
        //dd($csvFile);
        $dataIngestionService = new DataIngestionService();
        $dataIngestionService->ingestData($csvFile);
        return response()->json(['message' => 'Data ingested successfully']);
    }
}