<?php

namespace App\Http\Controllers;

use App\Services\DataIngestionService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DataIngestionController extends Controller
{
    public function ingestData(Request $request)
    {
        $csvFile = $request->file('file');
        $validator = Validator::make(['csv_file' => $csvFile], [
            'csv_file' => 'required|mimes:csv|max:2048',
        ]);
        //dd($validator);
        if ($validator->fails()) {
            // Validation failed, return errors
            return response()->json(['errors' => $validator->errors()], 422);
        }
        //dd($csvFile);
        $dataIngestionService = new DataIngestionService();
        $dataIngestionService->ingestData($csvFile);
        return response()->json(['message' => 'Data ingested successfully']);
    }
}