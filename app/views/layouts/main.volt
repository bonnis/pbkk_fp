{% set topMenu = [
    'index': [
        'title': 'Home',
        'uri': '/index',
        'with_auth': false
    ],
    'Bantuan': [
        'title': 'Bantuan',
        'uri': '/transaksi',
        'with_auth': true
    ]
] %}

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
    <a class="navbar-brand" href="/">Bantuanet</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            {% for controller, menu in topMenu %}
                {% if (session.has('auth') and menu['with_auth'] === true) or menu['with_auth'] === false %}
                <li class="nav-item {% if controller == dispatcher.getControllerName()|lower %}active{% endif %}">
                    <a class="nav-link" href="{{ menu['uri'] }}">{{ menu['title'] }}</a>
                </li>
                {% endif %}
            {% endfor %}
        </ul>

        <div class="my-2 my-lg-0">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item">
                    {% if session.has('auth') %}
                    <a class="nav-link" href="/session/logout">Log Out</a>
                    {% else %}
                    <a class="nav-link" href="/session/index">Log In/Sign Up</a>
                    {% endif %}
                </li>
            </ul>
        </div>
    </div>
</nav>


<div class="container">
    {{ flash.output() }}
    {{ flashSession.output() }}
    {{ content() }}
    <hr>
    <footer>
        <p>&copy; Rafi&friends {{ date('Y') }}</p>
    </footer>
</div>