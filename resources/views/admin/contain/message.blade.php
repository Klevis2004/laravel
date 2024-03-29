@include('admin.includes.header')
@if (Auth::check() && Auth::user()->role == 1 or Auth::user()->role == 2)
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Messages</h5>
                        <h6 class="card-title">Unread messages: {{ $read }}</h6>
                        <button type="button" class="btn btn-square btn-primary m-1" id="toggleButton">
                            <i class="fa fa-envelope"></i>
                        </button>
                    </div>
                    <div class="card-body">
                        @foreach ($messages as $message)
                            @if ($message->read == 1)
                                <a href=" {{ route('single', ['id' => $message->id]) }} ">
                                    <div class="message read">
                                        <strong>Email:</strong><span> {{ $message->email }} </span>
                                        <br>
                                        <strong>Message:</strong>
                                        <div class="truncate-text">
                                            <p class="truncate-text-content">{{ $message->text }}</p>
                                        </div>
                                    </div>
                                </a>
                            @else
                                <form action="{{ route('read', ['id' => $message->id]) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="unread">
                                        <div class="message">
                                            <strong>Email:</strong><span> {{ $message->email }} </span>
                                            <br>
                                            <strong>Message:</strong>
                                            <div class="truncate-text">
                                                <p class="truncate-text-content">
                                                    {{ $message->text }}
                                                </p>
                                            </div>
                                        </div>
                                    </button>
                                </form>
                            @endif
                            <hr>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        a {
            text-decoration: none;
            color: grey;
        }

        .message {
            display: flex;
            flex-direction: column;
            padding: 15px;
            border: 1px solid #ddd;
            margin-bottom: 15px;
            background-color: #f9f9f9;
            border-radius: 5px;
            width: 100%;
        }

        .read {
            background-color: rgba(128, 128, 128, 0.267);
        }

        .unread {
            background-color: #fff;
            border: none;
            padding: 0;
            cursor: pointer;
            text-align: left;
            width: 100%;
        }

        .button-container {
            margin-top: 10px;
        }

        span {
            color: grey;
        }

        .truncate-text {
            overflow: hidden;
            max-height: 1.5em;
            white-space: nowrap;
        }

        .truncate-text-content {
            margin: 0;
            padding: 0;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    </style>

    @include('admin.includes.footer')
@endif
