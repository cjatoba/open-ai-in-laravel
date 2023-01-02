<?php

namespace App\Http\Controllers;

use App\Http\Requests\GenerateResponseRequest;
use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class WritebotController extends Controller
{
    public function generateResponse(GenerateResponseRequest $request)
    {
        $prompt = $request->validated('prompt');

        $response = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => $prompt,
            'temperature' => 0.6
        ]);

        return response()->json([
           'response' => $response->choices[0]->text
        ]);
    }
}
