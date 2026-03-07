@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f5f6f8;
        }

        .sizedBox {
            width: 60%;
            box-sizing: border-box;
            position: relative;
            margin: 40px auto;
        }



        /* make the navbar reach screen edges even inside .container */
        .bleed-x {
            margin-left: calc(-1 * var(--bs-gutter-x, .75rem));
            margin-right: calc(-1 * var(--bs-gutter-x, .75rem));
        }
    </style>



    <div class="card sizedBox shadow-sm">
        <div class="card-body">
            <div class="d-flex justify-content-center row g-4">
                <div class="d-flex justify-content-center p-4">
                    <h2>Login\Register</h2>
                </div>

                <div class="col-12  col-lg-7">
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input name="email" id="email" type="text"
                                class="form-control @error('email')
                                        is-invalid
                                    @enderror"
                                value="{{ old('email') }}" />
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="text" id="password" name="password" value="{{ old('password') }}"
                                class="form-control @error('password')
                                        is-invalid
                                    @enderror" />

                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-center pt-2">
                            <button type="submit" class="me-5 btn btn-info">Log in</button>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-success">
                                    Register
                                </a>
                            @endif
                        </div>
                    </form>


                </div>



            </div>
        </div>
    </div>
@endsection
