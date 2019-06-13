 <!-- main header -->
 <header id="header_main">
    <div class="header_main_content">
        <nav class="uk-navbar">      
            <!-- main sidebar switch -->
            <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                <span class="sSwitchIcon"></span>
            </a>

            <!-- secondary sidebar switch -->
            <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                <span class="sSwitchIcon"></span>
            </a>
              
            <div class="uk-navbar-flip">
                <ul class="uk-navbar-nav user_actions">                    
                    
                    <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                        <a href="#" class="user_action_image"><img class="md-user-image" src="{{ asset('img/user.png') }}" alt=""/>&nbsp;{{ Auth::user()->name }}</a>
                        <div class="uk-dropdown uk-dropdown-small">
                            <ul class="uk-nav js-uk-prevent">                                
                                <li><a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                  document.getElementById('logout-form').submit();">Keluar</a></li>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>                                
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>

</header>
<!-- main header end -->
