<div>
    <div class="container"></div>
    <div class="row justify-content-center">

        <h2 class="d-flex justify-content-center">Total users: {{ count($users) }}<i class="fas fa-user"></i></h2>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body chatbox">
                    <ul class="list list-group">
                        @foreach ($users as $user)
                            @if($user->id !== auth()->id())
                                @php
                                    $not_seen= App\Models\Message::where('user_id',$user->id)->where('receiver_id',auth()->id())->where('is_seen',false)->get() ?? null
                                @endphp
                                <a wire:click="getUser({{ $user->id }})" class="test-dark link"></a>
                                <li class="list-group-item d-flex flex-row align-items-center">
                                    <img class="position-relative img-fluid avatar m-2" src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
                                    @if($user->is_online==true)
                                    <span class="position-absolute translate-middle top-75 start-20 p-2 bg-success border border-light rounded-circle"></span>
                                    @endif
                                    <h5>{{ $user->name }}</h5>
                                    @if(filled($not_seen))
                                    <div class="badge bg-primary">{{ $not_seen->count() }}</div>
                                    @endif
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">@if(isset($sender)) {{ $sender->name }} @endif @if(!isset($sender)) Select a user and start chatting @endif</div>
                <div class="card-body message-box">
                    <div class="single message" wire:poll="mountdata">
                        @if(filled($allmessages))
                            @foreach($allmessages as $message)
                                <div class="single-message @if($message->user_id == auth()->id()) sent @else received @endif">
                                    <p class="font-weight-bolder my-0">{{$message->user->name}}</p> {{ $message->message}}<br>
                                    <small class="text-muted w-100">Sent <em>{{$message->created_at}}</em></small>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>



                <div class="card-footer">
                    <form wire:submit.prevent="SendMessage">
                        <div class="row">
                            <div class="col-md-8">
                                <input type="text" wire:model="message" placeholder="Input your message here" class="form-control input shadow-none w-100 d-inline-block" required>
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-primary w-100"><i class="fas fa-paper-plane"></i>  Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
