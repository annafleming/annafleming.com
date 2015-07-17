<div id="adminPanel">
    <div>Logged as {{ Auth::user()->name }} </div>
    <ul>
        <li>{!! link_to('auth/logout', 'Logout') !!}</li>
        <li>{!! link_to('works/manage', 'Manage works') !!}</li>
        <li>{!! link_to('practical', 'Manage practical skills') !!}</li>
        <li>{!! link_to('skillcategory', 'Manage skill categories') !!}</li>
    </ul>
</div>