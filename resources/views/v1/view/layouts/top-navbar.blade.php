<a href=" {{ route('home') }} ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">HOME</li>
</a>
<a href=" {{ route('aboutUs') }} ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">ABOUT US</li>
</a>
<button class="dropdown-toggle ts-scroll custom-font-size float-left site-color custom-dropdown-link" type="button"
    id="drop" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    SERVICES
</button>
{{-- @php
use App\Models\Calculator;
$tether = Calculator::where('name', 'Tether (TRC 20)')->first();
$perfect = Calculator::where('name', 'Perfect Money')->first();
@endphp --}}

<div class="dropdown-menu custom-background-dropdown" aria-labelledby="drio">
    @if (isset($tether))
        <a href=" {{ route('services.tether') }} " class="dropdown-item site-color custom-font-size"
            onclick="document.getElementById('sound').play();">TETHER ( TRC20 )</a>
    @endif
    @if (isset($perfect))
        <a href=" {{ route('services.perfect') }} " class="dropdown-item site-color custom-font-size"
            onclick="document.getElementById('sound').play();">PERFECT MONEY</a>
    @endif
</div>
<a href=" {{ route('feedbacks') }} ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">FEEDBACK</li>
</a>
<a href=" {{ route('terms') }} ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">TERMS</li>
</a>
<a href=" ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">REFERRAL</li>
</a>
{{-- <a href=" "><li class="nav-item nav-link ts-scroll custom-font-size float-left site-color" onclick="document.getElementById('sound').play();">SAMPLE</li></a> --}}
<a href=" {{ route('contactUs') }} ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">CONTACT US</li>
</a>
<a href=" ">
    <li class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
        onclick="document.getElementById('sound').play();">F&Q</li>
</a>
@if (auth()->user())
    @if (auth()->user()->hasRole('is_owner'))
        <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color" href=" {{ route('settings') }} "
            onclick="document.getElementById('sound').play();">DASHBOARD</a>
    @else
        <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color"
            href=" {{ route('customer.index') }} " onclick="document.getElementById('sound').play();">DASHBOARD</a>
    @endif
@endif
@guest
    <a class="nav-item nav-link ts-scroll custom-font-size float-left site-color" href=" {{ route('login') }} "
        onclick="document.getElementById('sound').play();">LOG IN</a>
    <a class="nav-item nav-link ts-scroll custom-font-size float-left custom-back-signUp" href=" {{ route('register') }} "
        onclick="document.getElementById('sound').play();">SIGN UP</a>
@else
    <form action=" {{ route('logout') }} " method="post" class="float-left">
        @csrf
        <button class="custom-logout-btn" type="submit">
            <li class="nav-item nav-link ts-scroll custom-font-size site-color"
                onclick="document.getElementById('sound').play();">LOG OUT</li>
        </button>
    </form>
@endguest
