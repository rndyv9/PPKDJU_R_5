<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Learning Laravel</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
    <style>
        body {
            background: #f0f4f8;
            text-align: center;
            height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: #e7feff;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .container-btn {
            background: #ffffff;
            padding: 20px;
            border-radius: 15px;
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
        }

        .content {
            background: #ffffff;
            padding: 20px;
            width: 500px;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            display: flex;
            gap: 50px;
            margin-bottom: 20px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>{{ $title ?? '' }}</h1>

        <div class="content my-3 d-flex justify-content-center align-items-center card shadow p-3">
            <form class="form" action="{{ route('operation') }}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="">First Number</label>
                    <input class="form-control" type="number" name="number1" placeholder="Input first number"
                        id="" value="{{ $number1 ?? '' }}">
                </div>
                <div class="mb-3">
                    <label for="">Second Number</label>
                    <input class="form-control" type="number" name="number2" placeholder="Input second number"
                        id=""
                        value="{{ $number2 ?? '' }}">
                </div>

                <div class="container-btn justify-content-center mb-3">
                    <button class="text-decoration-none btn btn-success" type="submit" name="operation"
                        value="addition">Addition</button>
                    <button class="text-decoration-none btn btn-danger" type="submit" name="operation"
                        value="subtraction">Subtraction</button>
                    <button class="text-decoration-none btn btn-primary" type="submit" name="operation"
                        value="multiplication">Multiplication</button>
                    <button class="text-decoration-none btn btn-warning" type="submit" name="operation"
                        value="division">Division</button>
                </div>
            </form>
        </div>

        <div class="text-center mt-4">
            @if (isset($error))
                <h3 class="text-danger">Error: {{ $error }}</h3>
            @elseif(isset($result))
                <h3>Result: <span class="text-primary fw-bold">{{ $result }}</span></h3>
            @else
                <h3 class="text-muted">Result will appear here...</h3>
            @endif
        </div>

        {{-- <div class="align-items-center">
            @yield('content')
        </div> --}}
    </div>
</body>

</html>
