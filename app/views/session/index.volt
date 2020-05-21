<div class="row">
    <div class="col-md-6">
        <div class="page-header">
            <h2>Log In</h2>
        </div>

        <form action="/session/login" role="form" method="post">
            <fieldset>
                <div class="form-group">
                    <label for="email">Username/Email</label>
                    <div class="controls">
                        {{ text_field('email', 'class': "form-control") }}
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="controls">
                        {{ password_field('password', 'class': "form-control") }}
                    </div>
                </div>
                <div class="form-group">
                    {{ submit_button('Login', 'class': 'btn btn-primary btn-large') }}
                </div>
            </fieldset>
        </form>
    </div>

    <div class="col-md-6">
        <div class="page-header">
            <h2>Belum daftar?</h2>
        </div>
        <p>Ayo daftar, bantu saudara kita yang sedang kesusahan!</p>
        <div class="clearfix center">
            {{ link_to('user', 'Sign Up', 'class': 'btn btn-primary btn-large btn-success') }}
        </div>
    </div>
</div>