<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <h1>In home page via view function</h1>

    Name of Fruits : <br>
    <!-- ForEach loop  -->
    @foreach($fruits as $x)
        <p>{{$x}}</p>
    @endforeach
    
    <!-- For loop -->
    @for($i = 0; $i < 10 ; $i++)
        <p>The Current Value is {{$i}}</p>
    @endfor

    <!-- If else -->    
    @if(count($fruits) == 1)
        I have one record
    @elseif(count($fruits) > 1)
        I have Multiple record
    @else
        I dont have any record
    @endif


</body>
</html>