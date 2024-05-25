<!DOCTYPE html>
<html>
<head>
    <title>Rock Paper Scissors</title>
</head>
<body>
    <h1>Rock Paper Scissors Game</h1>

    @if(session('userChoice'))
        <p>You chose: {{ session('userChoice') }}</p>
        <p>Computer chose: {{ session('computerChoice') }}</p>
        <p>Result: {{ session('result') }}</p>
    @endif

    <form action="{{ route('rps.play') }}" method="POST">
        @csrf
        <label for="choice">Choose:</label>
        <select name="choice" id="choice">
            <option value="rock">Rock</option>
            <option value="paper">Paper</option>
            <option value="scissors">Scissors</option>
        </select>
        <button type="submit">Play</button>
    </form>

    <h2>Scores</h2>
    <ul>
        @foreach(session('scores', []) as $score)
            <li>{{ $score }}</li>
        @endforeach
    </ul>
</body>
</html>
