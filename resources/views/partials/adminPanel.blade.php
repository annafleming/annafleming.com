<div id="adminPanel">
    <div>Logged as {{ Auth::user()->name }} </div>
    <ul>
        <li>{!! link_to('auth/logout', 'Logout') !!}</li>
        <li>{!! link_to('config', 'Config') !!}</li>
        <li>{!! link_to('works/manage', 'Works') !!}</li>
        <li>{!! link_to('practical', 'Practical skills') !!}</li>
        <li>{!! link_to('skills', 'Skills') !!}</li>
        <li>{!! link_to('languages', 'Languages') !!}</li>
        <li>{!! link_to('history', 'History') !!}</li>
    </ul>
</div>