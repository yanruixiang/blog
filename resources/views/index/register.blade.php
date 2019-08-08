
@extends('index.add')

@section('title', 'Page Title')

@section('sidebar')
    @parent

@extends('index.add')

@section('title', 'Page Title')

@section('sidebar')
    @parent
    <div class="pages section">
        <div class="container">
            <div class="pages-head">
                <h3>LOGIN</h3>
            </div>
            <div class="login">
                <div class="row">
                    <form class="col s12" action="/index/login_do" method="post">
                    @csrf
                        <div class="input-field">
                            <input type="text" class="validate" name="name" placeholder="USERNAME" required>
                        </div>
                        <div class="input-field">
                            <input type="password" class="validate" name="password" placeholder="PASSWORD" required>
                        </div>
                        <a href=""><h6>Forgot Password ?</h6></a>
                        <input type="submit" class="btn button-default" value="LOGIN">
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@endsection
