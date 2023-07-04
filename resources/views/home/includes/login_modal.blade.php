<!-- Login Modal Start -->
<div class="modal popup-login-style" id="loginActive">
    <button type="button" class="close-btn" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
    <div class="modal-overlay">
        <div class="modal-dialog p-0" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="login-content">
                        <h2>Log in</h2>
                        <h3>Log in your account</h3>
                        <form action="{{ route('login') }}" method="post">
                            @csrf
                            @if(session('message'))
                                <div class="alert alert-warning">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <input type="text" name="email" placeholder="Name" />
                            <input type="password" name="password" placeholder="Password" />
                            <div class="remember-forget-wrap">
                                <div class="remember-wrap">
                                    <input type="checkbox">
                                    <p>Remember</p>
                                    <span class="checkmark"></span>
                                </div>
                                <div class="forget-wrap">
                                    <a href="#">Forgot your password?</a>
                                </div>
                            </div>
                            <button type="submit"><span>Login</span></button>
                            <div class="member-register">
                                <p> Not a member? <a href="{{ route('login') }}"> Register now</a></p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Login Modal End -->
