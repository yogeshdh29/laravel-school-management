<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="/students">
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/notices">
                                Notices
                            </a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
            <h1>Edit Details for {{ $student->name}} </h1>
            <form action="{{ route('students.update', ['student' => $student]) }}" method="post" class="pb-5">
            {{ csrf_field() }}
            @method('PATCH')
                <p>Name:</p>
                <div class="input-group pb-2">
                    <input type="text" name="name" value="{{ old('name') ?? $student->name }}">
                    {{ $errors->first('name') }}
                </div>
                <p>Class:</p>
                <div class="input-group pb-2">
                    <input type="text" name="class" value="{{ old('class') ?? $student->class }}">
                    {{ $errors->first('class') }}
                </div>
                <p>Attendance:</p>
                <div class="input-group pb-2">
                        <select name="attendace" id="attendace" class="form-control">
                            <option value="" disabled="">--SELECT--</option>
                                <option value="P" {{$student->attendace == 'P' ? 'selected': '' }}>Present</option>
                                <option value="A" {{$student->attendace == 'A' ? 'selected': '' }}>Absent</option>
                        </select>
                </div>
                    <button type="submit">Add Student</button>		
            </form>

            </div>
</body>
</html>
