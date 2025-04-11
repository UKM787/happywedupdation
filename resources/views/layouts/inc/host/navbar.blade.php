<header style="overflow-x: hidden; position:fixed; top:0; z-index:9999999; width:100%">
    <div class="container-fluid">
        <div class="row">
            <div class="col-4 text-left pl-5">
                <a href="{{route('welcome')}}"><img src="{{asset('storage/theme/logo.svg')}}" class="main-logo" /></a>
            </div>
            <div class="col-8" style="display:flex; justify-content:end;">
                <div class="profile" style="align-self: center; padding-top:0;">
                    <ul>
                        <li>
                            <a href="#">
                                <span class="h-icon"> <i class="fa fa-video-camera" aria-hidden="true" title="livestream"></i>
                                </span>
                            </a>
                        </li>
                        <li class="wed-host-notif-btn">
                            <a>
                                <span class="h-icon"><i class="fa fa-bell " aria-hidden="true" title="notifications"></i>
                                    <span class="wed-host-notif-alert"></span>
                                </span>
                            </a>
                            {{--<div class="wed-host-notif-cont">

                                @if(isset($notifications) && $notifications->isNotEmpty())
                                    @foreach($notifications as $notification)
                                    <div class="notify_item">

                                        @switch($notification->type)

                                            @case ("App\Notifications\Guest\AccommodationNotifications")
                                            <span class="notify_item-span">
                                                @if(isset($notification->data['profile']['imageOne']) )
                                                <img src="{{asset('storage').$notification->data['profile']['imageOne']}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>{{$notification->data['user']['name']}} {{$notification->data['status']}}</p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @else
                                                <img src="{{asset('storage/defaultsv1').'/avatar.png'}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>
                                                        {{$notification->data['user']['name']}} {{$notification->data['status']}}
                                                    </p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @endif
                                            </span>
                                            @break;

                                            @case ("App\Notifications\Guest\InvitationNotifications")
                                            <span class="notify_item-span">
                                                @if(isset($notification->data['profile']['imageOne']) )
                                                <img src="{{asset('storage').$notification->data['profile']['imageOne']}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>
                                                        Marriage Invitation of {{$notification->data['invitation']['brideName']}} weds {{$notification->data['invitation']['groomName']}} on {{\Carbon\Carbon::parse($notification->data['invitation']['startDate'])->format('d m, Y')}} by {{$notification->data['user']['name']}} {{ $notification->data['status'] }}
                                                    </p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @else
                                                <img src="{{asset('storage/defaultsv1').'/avatar.png'}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>Marriage Invitation of {{$notification->data['invitation']['brideName']}} weds {{$notification->data['invitation']['groomName']}} on {{\Carbon\Carbon::parse($notification->data['invitation']['startDate'])->format('d m, Y')}} by {{$notification->data['user']['name']}} {{ $notification->data['status'] }}</p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @endif
                                            </span>
                                            @break;

                                            @case("App\Notifications\Guest\ArrivalNotifications")
                                            <span class="notify_item-span">
                                                @if(isset($notification->data['profile']['imageOne']) )
                                                <img src="{{asset('storage').$notification->data['profile']['imageOne']}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>
                                                        {{$notification->data['user']['name']}} {{ $notification->data['status'] }}
                                                    </p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @else
                                                <img src="{{asset('storage/defaultsv1').'/avatar.png'}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>
                                                        {{$notification->data['user']['name']}} {{ $notification->data['status'] }}
                                                    </p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @endif
                                            </span>
                                            @break

                                            @case("App\Notifications\Guest\DepartureNotifications")
                                            <span class="notify_item-span">
                                                @if(isset($notification->data['profile']['imageOne']) )
                                                <img src="{{asset('storage').$notification->data['profile']['imageOne']}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>
                                                        {{$notification->data['user']['name']}}{{ $notification->data['status'] }}
                                                    </p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @else
                                                <img src="{{asset('storage/defaultsv1').'/avatar.png'}}" alt="profilePhoto" id="imageOneTag" width="6em" height="auto">
                                                <div>
                                                    <p>
                                                        {{$notification->data['user']['name']}} {{ $notification->data['status'] }}
                                                    </p>
                                                    <p>@ {{ $notification->created_at}}</p>
                                                </div>
                                                @endif
                                            </span>
                                            @break

                                            @default:
                                            <h1> No Notifications found</h1>
                                            @break;


                                        @endswitch

                                    </div>
                                    @endforeach
                                @endif
                            </div>--}}
                        </li>
                        @unless(auth()->guard('host')->user())
                        <li>
                            <a href="{{ route('login') }}" title="GuestSign In">
                                <span class="h-icon"><i class="fa fa-user-plus" aria-hidden="true" title="guest signin"></i>
                                </span>
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('hostRegister') }}" title="HostSign up">
                                <span class="h-icon"><i class="fa fa-pencil-square-o" aria-hidden="true" title="host signup"></i>
                                </span>
                            </a>
                        </li>

                        <li>
                            <a href="{{route('hostLogin')}}" title="HostSign In"> <span class="h-icon"><i class="fa fa-sign-in" aria-hidden="true" title="hostlogin"></i></span>
                            </a>
                        </li>

                        @else
                        <li>
                            <a href="{{ route('hostprofile.index') }}" title="Profile">
                                @if(! is_null($host->profile) && $host->profile->imageOne != '/defautlsv1/avatar.png')
                                <span class="h-icon"><img src="{{asset('assets/hosts/uploads/').'/'.$host->profile->imageOne}}" alt="avtar" style="width:28px ;height:28px"></span>
                                @else
                                <span class="h-icon"><img src="{{asset('storage/defaultsv1').'/avatar.png'}}" alt="avtar" style="width:28px ;height:28px"></span>
                                @endif
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}" id="signout" title="sorry! to you go" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <span class="h-icon"><i class="fas fa-sign-out-alt"></i></span>
                            </a>
                            <form id="logout-form" action="{{ route('logoutHost') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                        @endunless
                    </ul>
                </div>
                <!-- .profile ends -->
            </div>
        </div>
    </div>
</header>

