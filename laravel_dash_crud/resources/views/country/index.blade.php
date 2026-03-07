@extends('layouts.app')

@section('content')
    <style>
        body {
            background: #f5f6f8;
        }

        .sizedBox {
            height: 333px;
            max-height: 333px;
            box-sizing: border-box;
        }

        .leftCard,
        .rightCard {
            box-sizing: border-box;
            max-height: 300px;
        }

        .pagination {
            --bs-pagination-padding-x: 0.75rem;
            --bs-pagination-padding-y: 0.27rem;
            --bs-pagination-font-size: 0.9rem;
            padding-left: 4px;
        }

        /* underline active tab like the screenshot */
        .nav-active {
            position: relative;
            padding-bottom: .9rem;
        }

        .navbar {
            position: relative;
            z-index: 1050;
        }

        .dropdown-menu {
            z-index: 2000;
        }

        .navbar,
        .navbar .container-fluid,
        .navbar-collapse {
            overflow: visible !important;
        }

        .nav-active::after {
            content: "";
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            height: 2px;
            background: #0d6efd;
            border-radius: 2px;
        }

        /* make the navbar reach screen edges even inside .container */
        /* .bleed-x {
                                    margin-left: calc(-1 * var(--bs-gutter-x, .75rem));
                                    margin-right: calc(-1 * var(--bs-gutter-x, .75rem));
                                } */
    </style>

    {{-- Top navbar (inside content) --}}
    {{-- <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm mb-4 bleed-x px-3"> --}}
    <nav class="navbar navbar-expand-md navbar-light bg-white border-bottom shadow-sm mb-4 bleed-x px-3">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                {{-- cube icon placeholder --}}
                <svg width="28" height="28" viewBox="0 0 24 24" fill="none" aria-hidden="true">
                    <path d="M12 2 3 7v10l9 5 9-5V7l-9-5Z" stroke="currentColor" stroke-width="1.5" />
                    <path d="M12 22V12" stroke="currentColor" stroke-width="1.5" />
                    <path d="M21 7 12 12 3 7" stroke="currentColor" stroke-width="1.5" />
                </svg>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#topNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="topNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link nav-active fw-medium text-dark" href="">Dashboard</a>
                    </li>
                </ul>

                <ul class="navbar-nav ms-auto">
                    <li class="nav-item dropdown">
                        {{-- <a class="nav-link dropdown-toggle text-dark" href="#" role="button"
                            data-bs-toggle="dropdown">
                            Admin
                        </a> --}}
                        <button class="nav-link dropdown-toggle btn btn-link text-dark p-0" type="button"
                            data-bs-toggle="dropdown">
                            {{ auth()->user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            {{-- <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li> --}}
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="btn dropdown-item" type="submit">Logout</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <h2 class="mb-4">Dashboard</h2>

    {{-- “You're logged in!” --}}
    <div class="card shadow-sm mb-4">
        @include('partials.login-message')
    </div>

    {{-- Main white panel --}}
    @include('partials.success-message')
    <div class="card sizedBox shadow-sm">
        <div class="card-body">
            <div class="row g-4">

                {{-- Left card: Add New Country --}}
                <div class="col-12  col-lg-4">

                    <div class="card leftCard h-100">
                        <div class="card-header bg-white">
                            Add New Country
                        </div>

                        <div class="card-body">
                            <form action="{{ route('country.store') }}" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <label for="Name" class="form-label">Name</label>
                                    <input name="Name" id="Name" type="text"
                                        class="form-control @error('Name')
                                        is-invalid
                                    @enderror"
                                        value="{{ old('Name') }}" />
                                    @error('Name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="ISO" class="form-label">ISO</label>
                                    <input type="text" id="ISO" name="ISO" value="{{ old('ISO') }}"
                                        class="form-control @error('ISO')
                                        is-invalid
                                    @enderror" />

                                    @error('ISO')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end pt-2">
                                    <button type="submit" class="btn btn-dark px-4">ADD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                {{-- Right card: List of countries --}}
                <div class="col-12 col-lg-8">
                    <div class="card rightCard h-100">
                        <div class="card-header bg-white">
                            List of countries
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0">
                                    <thead>
                                        <tr>
                                            <th style="width:70px;">#</th>
                                            <th>Name</th>
                                            <th style="width:120px;">ISO</th>
                                            <th style="width:130px;">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($countries as $country)
                                            <tr>
                                                <td class="fw-semibold">{{ $country->id }}</td>
                                                <td>{{ $country->Name }}</td>
                                                <td>{{ $country->ISO }}</td>
                                                <td class="d-flex">
                                                    <a href="{{ route('country.edit', $country->id) }}"
                                                        class="btn pt-2 btn-primary btn-sm">Edit</a>
                                                    <form action="{{ route('country.destroy', $country->id) }}"
                                                        method="POST" class="mx-1">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"
                                                            onclick="return confirm('Are you SURE you want to delete this country?')">Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @empty
                                            <td colspan="5" class="text-center">No Countries found</td>
                                        @endforelse

                                    </tbody>

                                </table>
                                <div class="d-flex mt-2 justify-content-end">
                                    {{ $countries->links() }}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
