@extends('layouts.pattern')

@section('content')
  {{-- modals --}}
  <div class="modal" tabindex="-1" id="signUpForm">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change info</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post" name="">
                    <input type="text" name="new_name"class="form-control mt-1" placeholder="New name" required>
                    <button type="submit" class="btn">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal" tabindex="-1" id="">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="post"  name="">
                    <input type="text" name="userName" class="form-control my-1" placeholder="User name" required>

                    <button type="submit" class="btn btn-primary">Add order</button>
                </form>
            </div>
        </div>
    </div>
</div>
{{-- modals --}}
    <section id="UserInfo">
        <div class="row">
            <div class="col-12 col-md-3">
                <svg class="bd-placeholder-img"  width="100%" height="100%" role="img"
                    aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                    <rect width="100%" height="100%" fill="#55595c"></rect>
                </svg>
            </div>
            <div class="col-12 col-md-9">
                <h2>{{ Auth::user()->name }}</h2>
                <p>{{ Auth::user()->email }}</p>
                <p>user</p>
            </div>
        </div>
    </section>
@endsection
