<div class="mb-3">
    <div class="section-title mb-0">
        <h4 class="m-0 text-uppercase font-weight-bold">Newsletter</h4>
    </div>
    <div class="bg-white text-center border border-top-0 p-3">
        <p>Enter email to subscribe</p>
        <form action="{{ route('newsletter') }}" method="post">
            @csrf
            <div class="input-group mb-2" style="width: 100%;">
                <input type="text" class="form-control form-control-lg" placeholder="Your Email" name="email">
                @if(session('success'))
                    <div class="alert-success">{{ session('success') }}</div>
                @endif
                @if($errors->first('email'))
                    <span style="color: red">{{ $errors->first('email') }}</span>
                @endif
                <div class="input-group-append">
                    <button class="btn btn-primary font-weight-bold px-3" type="submit">Sign Up</button>
                </div>
            </div>
        </form>
        <small>Lorem ipsum dolor sit amet elit</small>
    </div>
</div>
