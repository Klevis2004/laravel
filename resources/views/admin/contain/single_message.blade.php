@include('admin.includes.header')
@if (Auth::check() && Auth::user()->role == 1 or Auth::user()->role == 2)
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="user-info">
                        <img src="{{ asset('storage/' . $user->profile_photo) }}" alt="" class="profile-photo">
                        <div class="user-details">
                            <h3>{{ $user->name }}</h3>
                            <p>{{ $user->email }}</p>
                        </div>
                    </div>

                    <div class="email-details">
                        <div class="email-header">
                            <span class="email-sender">From: {{ $messages->email }}</span>
                            <span class="email-date">{{ $messages->created_at->format('M d, Y H:i A') }}</span>
                        </div>
                        <div class="email-body">
                            <p>{{ $messages->text }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .card {
            margin-top: 20px;
            padding: 20px;
        }

        .user-info {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .profile-photo {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-right: 20px;
        }

        .user-details {
            flex-grow: 1;
        }

        .email-details {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            margin-top: 20px;
        }

        .email-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 1px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 10px;
        }

        .email-sender {
            font-weight: bold;
        }

        .email-date {
            color: #888;
        }

        .email-body {
            font-size: 16px;
            line-height: 1.6;
        }
    </style>

    @include('admin.includes.footer')
@endif
