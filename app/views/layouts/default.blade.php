<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
    </head>

    <body>
        <header>
            <nav>
                <a href="/">Home</a>&nbsp;|&nbsp;
                @if(Auth::check())
                    <a href="/profile">Profile</a>&nbsp;|&nbsp;
                    <a href="/messages">Messages</a>&nbsp;|&nbsp;
                    <a href="/settings">Settings</a>&nbsp;|&nbsp;
                    <a href="/logout">Log out</a>
                @else
                    <a href="login">Login</a>&nbsp;|&nbsp;
                    <a href="signup">Sign up</a>
                @endif
            </nav>
            @if(Session::has('flash_notice'))
                <div id="flash_notice">{{ Session::get('flash_notice') }}</div>
            @endif
        </header>
        <section>
            @yield('content')
        </section>
        <footer>
            <!-- TODO: Footer content -->
        </footer>
    </body>
</html>