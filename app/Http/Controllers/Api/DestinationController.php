<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index()
    {

        $destinations = Destination::with(['country', 'tags'])->get();

        return response()->json([
            'success' => true,
            'results' => $destinations
        ]);
    }

    public function show($slug)
    {


        $destination = Destination::with(['country', 'tags'])
            ->where('slug', $slug)
            ->first();

        if ($destination) {
            return response()->json([
                'success' => true,
                'destination' => $destination
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Destinazione non trovata'
        ], 404);
    }
}
