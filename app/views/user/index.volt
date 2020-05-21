<div class="page-header">
    <h2>Register</h2>
</div>

<form action="/user" role="form" method="post">
    <fieldset>
        <div class="form-group">
            <label for="name">Name</label>
            <div class="controls">
                {{ text_field('name', 'class': "form-control") }}
            </div>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
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
            <label for="password">Repeat password</label>
            <div class="controls">
                {{ password_field('re_password', 'class': "form-control") }}
            </div>
        </div>
        <div class="form-group">
            {{ submit_button('Register', 'class': 'btn btn-primary btn-large') }}
        </div>
    </fieldset>
</form>