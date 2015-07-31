<a href="/">
    <img src="/images/{{ Request::is('/') ? 'logo': 'logo-pages'}}.png">
</a>
<nav>
    <a href="/works" class="{{ Request::is('works') ? 'active' : '' }}">Works</a>
    <a href="/cv" class="{{ Request::is('cv') ? 'active' : '' }}"">CV</a>
    <a href="/contact" class="{{ Request::is('contact') ? 'active' : '' }}">Contact</a>
</nav>
