<a href=" {{route('home')}} "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">Index</li></a>
<a href=" {{route('aboutUs')}} "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">About Us</li></a>
<button class="dropdown-toggle ts-scroll custom-font-size float-left site-color custom-dropdown-link"
    type="button" id="drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Services
</button>
@php
    use App\Models\Calculator;
    $tether = Calculator::where('name', 'Tether (TRC 20)')->first();
    $perfect = Calculator::where('name', 'Perfect Money')->first();
@endphp

<div class="dropdown-menu custom-background-dropdown" aria-labelledby="drio">
    @if (isset($tether))
        <a href=" {{route('services.tether')}} " class="dropdown-item site-color custom-font-size" onclick="document.getElementById('sound').play();">Tether ( TRC20 )</a>
    @endif
    @if (isset($perfect))
        <a href=" {{route('services.perfect')}} " class="dropdown-item site-color custom-font-size" onclick="document.getElementById('sound').play();">Perfect Money</a>
    @endif
</div>
<a href=" {{route('terms')}} "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">Terms</li></a>
<a href=" "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">Referral</li></a>
<a href=" "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">Sample</li></a>
<a href=" "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">Contact Us</li></a>
<a href=" "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">F&Q</li></a>
@if (auth()->user())
    @if (auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399'))
        <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color" href=" {{route('settings')}} " onclick="document.getElementById('sound').play();">Dashboard</a>
    @else
        <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color" href=" {{route('customer.index')}} " onclick="document.getElementById('sound').play();">Dashboard</a>
    @endif
@endif
@guest
    <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color" href=" {{route('register')}} " onclick="document.getElementById('sound').play();">Register</a>
    <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color" href=" {{route('login')}} " onclick="document.getElementById('sound').play();">Login</a>
@else
    <form action=" {{route('logout')}} " method="post" class="float-left">
        @csrf
        <button class="custom-logout-btn" type="submit"><li class="nav-item nav-link ts-scroll custom-font-size site-color" onclick="document.getElementById('sound').play();">Logout</li></button>
    </form>
@endguest