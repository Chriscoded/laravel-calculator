<!-- resources/views/calculator.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple Calculator</title>
</head>
<body>
    <h1>Simple Calculator</h1>

    @if(isset($result))
        <p>Result: {{ $result }}</p>
    @endif

    <form method="post" action="{{ url('/calculate') }}">
        @csrf
        <label for="num1">Number 1:</label>
        <input type="number" name="num1" required>
        <br>

        <label for="num2">Number 2:</label>
        <input type="number" name="num2" required>
        <br>

        <label for="operator">Operator:</label>
        <select name="operator" required>
            <option value="add">+</option>
            <option value="subtract">-</option>
            <option value="multiply">*</option>
            <option value="divide">/</option>
        </select>
        <br>

        <button type="submit">Calculate</button>
    </form>
</body>
</html>
