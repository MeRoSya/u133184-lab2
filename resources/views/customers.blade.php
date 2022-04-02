<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Customers</title>

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

        .pagination {
            list-style: none;
        }

        .page-item {
            display: inline;
            font-size: 20px;
        }
    </style>
</head>
<body>
<h1>Filters:</h1>
<form method="get">
    <div>
        <label>
            Name and surname:
            <input type="text" name="name" placeholder="First name and last name"/>
        </label>
    </div>
    <div>
        <label>
            Phone:
            <input type="tel" name="phone" placeholder="+1-111-111-11-11"/>
        </label>
    </div>
    <div>
        <label>
            E-mail:
            <input type="email" name="email" placeholder="example@domen.com"/>
        </label>
    </div>
    <div>
        <label>
            Is blocked?
            <select name="isBlocked">
                <option value="null">No selection</option>
                <option value="true">Is blocked</option>
                <option value="false">Is not blocked</option>
            </select>
        </label>
    </div>
    <div>
        <input type="submit" value="Filter"/>
    </div>
</form>
<h1>Users info:</h1>
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
    @foreach($customers as $customer)
        <tr>
            <td>
                <a href="{{route('customerInfo', ['id' => $customer->id])}}">
                    {{$customer->id}}
                </a>
            </td>
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
    @endforeach
</table>
{{$customers->links('pagination::bootstrap-4')}}
</body>
</html>
