<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function welcome()
    {
        return response()->json([
            'message' => 'Welcome to the API',
        ]);
    }

    public function currentTime()
    {
        return response()->json([
            'message' => 'Hora atual do servidor: ' . now()->toTimeString(),
        ]);
    }

    public function currentDate(Request $request)
    {
        return response()->json([
            'message' => 'Data atual do servidor: ' . now()->toDateString(),
        ]);
    }
}
