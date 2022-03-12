<ul id="menus">
    @if(Route::has(config('lma.module.route')))
    <li class="item {{ request()->routeIs(config('lma.module.route')) ? 'active' : '' }}">
        <a href="{{route(config('lma.module.route'))}}" class="link">{!! lmaIcon("home") !!}<span class="link-title">Home Admin</span></a>
    </li>
    @endif
    @foreach($data as $item)
        @if(Route::has($item->route))
            <li class="item {{ request()->routeIs($item->route.'*') ? 'active' : '' }} ">
                <a href="{{route($item->route)}}" class="link">{!! lmaIcon($item->icon) !!}<span class="link-title">{{$item->name}}</span></a>
                @if($item->children)
                    <ul class="children">
                        @foreach($item->children as $child)
                            @if(Route::has($child->route))
                                <li class="child {{ request()->routeIs($child->route.'*') ? 'active' : '' }} ">
                                    <a class="link" href="{{route($child->route)}}">
                                        {!! lmaIcon($child->icon) !!}<span class="link-title">{{$child->name}}</span>
                                    </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                @endif
            </li>
        @endif
    @endforeach
</ul>
