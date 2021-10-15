<div>
    <div class="row justify-content-center">

        <div class="col-md-2">
            <div class="card">
                <div class="card-header">Users</div>
                <div class="card-body">
                    <ul class="list list-group">
                        <a wire:click="getUser2" class="test-dark link"></a>

                        <li class="list-group-item">
                            <img class="img-fluid avatar position-relative" width="25" src="https://cdn.pixabay.com/photo/2017/06/13/12/53/profile-2398782_1280.png">
                            <span class="position-absolute top-50 start-50 translate-middle p-2 bg-success border border-light rounded-circle"></span>
                            Name
                            <div class="badge bg-primary">1</div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Ciggy</div>
                <div class="card-body">
                    messages
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
