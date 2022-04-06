<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customer {{$customer->id}}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        td {
            padding-right: 10px;
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }

        li {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
<h1>User info:</h1>
<table>
    <tr>
        <td>
            Id
        </td>
        <td>
            Name
        </td>
        <td>
            Phone
        </td>
        <td>
            E-mail
        </td>
        <td>
            Is blocked?
        </td>
    </tr>
    <tr>
        <td>{{$customer->id}}</td>
        <td>
            {{$customer->firstName." ".$customer->lastName}}
        </td>
        <td>{{$customer->phone}}</td>
        <td>{{$customer->email}}</td>
        <td>
            @if ($customer->blocked)
                blocked
            @else
                not blocked
            @endif
        </td>
    </tr>
</table>
@if($customer->address != null)
    <h2>Addresses:</h2>
    <ol>
        @foreach($customer->address as $address)
            <li>
                <div>
                    Common name: {{$address->commonName}}
                </div>
                <div>
                    City: {{$address->city}}
                </div>
                <div>
                    Street: {{$address->street}}
                </div>
                <div>
                    Building: {{$address->building}}
                </div>
                <div>
                    Floor: {{$address->floor}}
                </div>
                <div>
                    Flat: {{$address->flat}}
                </div>
                <div>
                    Access code: {{$address->accessCode}}
                </div>
            </li>
        @endforeach
    </ol>
@endif
</body>
</html>
