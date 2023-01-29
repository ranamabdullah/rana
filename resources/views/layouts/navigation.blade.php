<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Book Managment System</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!-- Left Side Navigation Items -->
            <ul class="nav navbar-nav">
                <li><a href="{{ route('dashboard') }}">Dashboard <span
                            class="sr-only">(current)</span></a></li>
                <li><a href="{{route('category.index')}}">Category</a></li>
                <li><a href="{{route('member.index')}}">Member</a></li>
                <li><a href="{{route('book.index')}}">Book</a></li>
               
            </ul>

            <!-- Right Side Navigation Items -->
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">{{ Auth::user()->name }}</a></li>
            </ul>
            <form class="navbar-form navbar-right" method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" onclick="event.preventDefault();
                                        this.closest('form').submit();" class="btn btn-danger">Log Out</button>
            </form>


        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
