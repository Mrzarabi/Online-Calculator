<!--NAVIGATION ******************************************************************************************-->
{{-- <nav class="navbar navbar-light bg-white fixed-top @if ( Route::currentRouteName() == 'view.index' ) navbar-toggle @endif navbar-expand-lg"> --}}
    @php
    use App\Models\Calculator;
@endphp
<nav class="navbar navbar-light fixed-top">
<div class="container">
        <a class="navbar-brand ts-push-down__50 position-absolute ts-bottom__0 pb-0 ts-z-index__1 ts-scroll" href="#page-top">
        </a>
        <!--end navbar-brand-->
        <button class="navbar-toggler site-color" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon mt-3"></span>
        </button>
        <!--end navbar-toggler-->
        <div class="collapse navbar-collapse custom-font site-background-color rounded" id="navbarNavAltMarkup">
            <div class="navbar-nav d-block d-lg-flex ml-auto text-right p-3">
                <a href=" {{route('home')}} "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">INDEX</li></a>
                <a href=" {{route('aboutUs')}} "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">About Us</li></a>
                @php
                    $tether = Calculator::where('name', 'Tether (TRC 20)')->first();
                    $perfect = Calculator::where('name', 'Perfect Money')->first();
                @endphp
                @if (isset($tether))
                    <a href=" {{route('services.tether')}} "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Tether ( TRC20 )</li></a>
                @endif
                @if (isset($perfect))
                    <a href=" {{route('services.perfect')}} "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Perfect Money</li></a>
                @endif
                <a href=" {{route('terms')}} "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Terms</li></a>
                <a href=" "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Referral</li></a>
                <a href=" "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Sample</li></a>
                <a href=" "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Contact Us</li></a>
                <a href=" "><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">F&Q</li></a>
                @if (auth()->user())
                    @if (auth()->user()->hasRole('100e82ba-e1c0-4153-8633-e1bd228f7399'))
                        <a class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" href=" {{route('settings')}} " onclick="document.getElementById('sound').play();">Dashboard</a>
                    @else
                        <a class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" href=" {{route('customer.index')}} " onclick="document.getElementById('sound').play();">Dashboard</a>
                    @endif
                @endif
                @guest
                    <a class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" href=" {{route('register')}} " onclick="document.getElementById('sound').play();">Register</a>
                    <a class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" href=" {{route('login')}} " onclick="document.getElementById('sound').play();">Login</a>
                @else
                    <form action=" {{route('logout')}} " method="post">
                        @csrf
                        <button class="custom-btn-style" type="submit"><li class="c-bg-li site-color nav-item nav-link ts-scroll custom-font-size" onclick="document.getElementById('sound').play();">Logout</li></button>
                    </form>
                @endguest
            </div>
            <!--end navbar-nav-->
        </div>
        <!--end collapse-->
    </div>
    <!--end container-->
</nav>
<!--end navbar-->