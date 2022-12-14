@php
    $currentRouteName = Route::currentRouteName();
@endphp
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</head>
<body>
    <div id="panel" class="d-flex flex-column flex-wrap position-absolute inset-0">
        <nav id="panel-navbar" class="navbar navbar-dark bg-dark border-bottom shadow-sm w-100">
            <a href="{{ url('/') }}" class="navbar-brand">
                {{ config('app.name', 'Laravel') }}
            </a>

            <ul class="navbar-nav flex-row ml-auto">
                <li class="nav-item dropdown">
                    @php
                        $currentLocale = LaravelLocalization::getCurrentLocale();
                    @endphp
                    <a href="#" class="nav-link dropdown-toggle pr-2" data-toggle="dropdown" role="button" aria-expanded="false">
                        <span class="text-uppercase">{{ $currentLocale }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right position-absolute">
                        @foreach(LaravelLocalization::getLocalesOrder() as $localeCode => $properties)
                        <li>
                            <a href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}" class="dropdown-item @if($currentLocale == $localeCode) disabled @endif">
                                {{ $properties['native'] }}
                                (<span class="text-uppercase">{{ $localeCode }}</span>)
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle pl-2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu dropdown-menu-right position-absolute">
                        <li>
                            <a href="{{ route('panel.profile.edit') }}" class="dropdown-item @if($currentRouteName == 'panel.profile.edit') active @endif">
                                <i class="fas fa-user text-dark mr-1"></i>
                                {{ __('menu.panel.profile.edit') }}
                            </a>
                        </li>

                        <hr class="dropdown-divider">

                        <li>
                            <a href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                <i class="fas fa-power-off text-dark mr-1"></i>
                                {{ __('menu.panel.profile.logout') }}
                            </a>

                            <form action="{{ route('logout') }}" method="POST" id="logout-form" class="d-none">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>

            <div class="navbar-expand-md">
                <button type="button" class="navbar-toggler button_hamburger_htra ml-3" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false">
                    <span></span>
                </button>
            </div>
        </nav>

        <div class="flex-grow-1 position-relative">
            <div id="panel-body" class="flex-row-reverse flex-md-row">
                <div class="d-flex navbar-expand-md flex-shrink-0">
                    <div id="navbarNav" class="bg-white shadow-sm navbar-collapse width collapse flex-fill">
                        <nav id="panel-side-navbar">
                            <div class="input-group has-clear p-3">
                                <input type="text" id="panel-side-nav-search" class="form-control" placeholder="{{ __('menu.panel.searchbar') }}">

                                <div class="input-group-append">
                                    <button type="button" class="btn btn-clear btn-clear-hidden">
                                        <i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>

                            <hr class="dropdown-divider m-0" />

                            <div id="panel-side-nav-group" class="flex-grow-1 overflow-auto on-hover">
                                @php
                                    $htmlMenuNav = '';

                                    foreach ([
                                        'settlements' => [
                                            'routes' => [
                                                'panel.settlements.index' => [],
                                                'panel.settlements.create' => [
                                                    'permission' => 'panel.settlements.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.settlements.edit'
                                            ]
                                        ],
                                        'town-halls' => [
                                            'routes' => [
                                                'panel.town-halls.index' => [
                                                    'permission' => 'panel.town-halls.index'
                                                ],
                                                'panel.town-halls.create' => [
                                                    'permission' => 'panel.town-halls.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.town-halls.edit'
                                            ]
                                        ],
                                        'municipalities' => [
                                            'routes' => [
                                                'panel.municipalities.index' => [
                                                    'permission' => 'panel.municipalities.index'
                                                ],
                                                'panel.municipalities.create' => [
                                                    'permission' => 'panel.municipalities.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.municipalities.edit'
                                            ]
                                        ],
                                        'districts' => [
                                            'routes' => [
                                                'panel.districts.index' => [
                                                    'permission' => 'panel.districts.index'
                                                ],
                                                'panel.districts.create' => [
                                                    'permission' => 'panel.districts.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.districts.edit'
                                            ]
                                        ],
                                        'regions' => [
                                            'routes' => [
                                                'panel.regions.index' => [
                                                    'permission' => 'panel.regions.index'
                                                ],
                                                'panel.regions.create' => [
                                                    'permission' => 'panel.regions.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.regions.edit'
                                            ]
                                        ],
                                        'users' => [
                                            'routes' => [
                                                'panel.users.index' => [
                                                    'permission' => 'panel.users.index'
                                                ],
                                                'panel.users.create' => [
                                                    'permission' => 'panel.users.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.users.edit'
                                            ]
                                        ],
                                        'roles' => [
                                            'routes' => [
                                                'panel.roles.index' => [
                                                    'permission' => 'panel.roles.index'
                                                ],
                                                'panel.roles.create' => [
                                                    'permission' => 'panel.roles.create'
                                                ]
                                            ],
                                            'extended_routes' => [
                                                'panel.roles.edit'
                                            ]
                                        ],
                                        'permissions' => [
                                            'routes' => [
                                                'panel.permissions.index' => [
                                                    'permission' => 'panel.permissions.index'
                                                ],
                                            ],
                                            'extended_routes' => [
                                                'panel.permissions.edit'
                                            ]
                                        ]
                                    ] as $module => $moduleOptions) {
                                        if (isset($moduleOptions['routes'])) {
                                            $htmlMenuSubnav = '';

                                            foreach ($moduleOptions['routes'] as $route => $options) {
                                                if (!isset($options['permission']) || (
                                                    auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo($options['permission'])
                                                )) {
                                                    $htmlMenuSubnav .= '<li class="nav-item">
                                                        <a href="' . route($route) . '" class="nav-link ' . ($currentRouteName == $route ? 'active' : '') . '">
                                                            ' . __('menu.' . ($options['text'] ?? $route)) . '</a>
                                                    </li>';
                                                }
                                            }

                                            if (!empty($htmlMenuSubnav)) {
                                                $isModuleOpen = in_array($currentRouteName, array_merge(
                                                    array_keys($moduleOptions['routes']),
                                                    $moduleOptions['extended_routes'] ?? []
                                                ));

                                                $htmlMenuNav .= '<li class="nav-item">
                                                    <a href="#collapse-' . $module . '" class="nav-link d-flex align-items-center ' . ($isModuleOpen ? '' : 'collapsed') . '" data-toggle="collapse" aria-expanded="' . ($isModuleOpen ? 'true' : 'false') . '" aria-controls="collapse-' . $module . '">
                                                        ' . __('menu.panel.' . $module . '.text') . '
                                                        <i class="plus-minus-rotate flex-shrink-0 ml-auto collapsed"></i></a>';

                                                $htmlMenuNav .= '<div id="collapse-' . $module . '" class="collapse ' . ($isModuleOpen ? 'show' : '') . '"><ul class="nav flex-column">' . $htmlMenuSubnav . '</ul></div></li>';
                                            }
                                        } else if (!isset($moduleOptions['permission']) || (
                                            auth()->user()->hasRole('admin') || auth()->user()->hasPermissionTo($moduleOptions['permission'])
                                        )) {
                                            $htmlMenuNav .= '<li class="nav-item">
                                                <a href="' . route($moduleOptions['route']) . '" class="nav-link ' . ($currentRouteName == $moduleOptions['route'] ? 'active' : '') . '">
                                                    ' . __('menu.panel.' . $module . '.text') . '
                                                </a>
                                            </li>';
                                        }
                                    }
                                @endphp
                                <ul class="nav flex-column">{!! $htmlMenuNav !!}</ul>
                            </div>
                        </nav>
                    </div>
                </div>

                <main class="flex-md-shrink-1 flex-shrink-0 w-100 overflow-auto py-3">
                    <div class="container-fluid">
                        @yield('content')
                    </div>

                    @yield('scripts')
                </main>
            </div>
        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: '{{ session('success.title') }}',
                text: '{{ session('success.text') }}',
                confirmButtonText: '{{ __('messages.panel.alert-success.buttons.confirm') }}',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'swal2-styled btn btn-primary m-1'
                }
            });
        </script>
    @endif
</body>
</html>