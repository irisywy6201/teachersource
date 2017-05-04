<nav class="navbar" role="navigation" style="background-color:#ffcc66;color:#000">
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1" >
                <ul class="nav navbar-nav" >
                    <li>
                        <a href="{{ url('/') }}" style="cursor: default;">教師資源E化平台</a>
                    </li>
                    <li >
                        <a href="http://www.ncu.edu.tw">中大首頁</a>
                    </li>
                    <li>
                        <a href="http:/portal.ncu.edu.tw">Portal</a>
                    </li>
                    <li>
                        <a href="https://webmail.cc.ncu.edu.tw/openwebmail/index.php">WebMail</a>
                    </li>

                </ul>

                <ul class="nav navbar-nav navbar-right">
                  @if(Auth::user())
                    <li>
                        <a href="{{ url('admin') }}">後臺管理</a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                    登出
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                    @else
                      <li><a href="{{ route('login') }}">登入</a></li>
                  @endif
                </ul>

            </div>
        </nav>
