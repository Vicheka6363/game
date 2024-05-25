<?php

namespace YourName\RPS\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RPSController extends Controller
{
    public function index()
    {
        return view('rps::index');
    }

    public function play(Request $request)
    {
        $choices = ['rock', 'paper', 'scissors'];
        $userChoice = $request->input('choice');
        $computerChoice = $choices[array_rand($choices)];

        $result = $this->determineWinner($userChoice, $computerChoice);

        session()->push('rps.scores', $result);

        return redirect()->route('rps.index')->with([
            'userChoice' => $userChoice,
            'computerChoice' => $computerChoice,
            'result' => $result,
            'scores' => session('rps.scores', [])
        ]);
    }

    private function determineWinner($user, $computer)
    {
        if ($user === $computer) {
            return 'draw';
        }

        if (
            ($user === 'rock' && $computer === 'scissors') ||
            ($user === 'paper' && $computer === 'rock') ||
            ($user === 'scissors' && $computer === 'paper')
        ) {
            return 'win';
        }

        return 'lose';
    }
}
