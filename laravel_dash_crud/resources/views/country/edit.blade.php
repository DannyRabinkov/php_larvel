@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h2 class="text-dark-emphasis m-0 mb-1">Edit Country</h2>
                        <p class="text-muted m-0">Update your country details</p>
                    </div>
                    <a href="{{ route('country.index') }}" class="btn btn-info">Back</a>
                </div>

                <div class="card">
                    <div class="card-body p-4">
                        <form action="{{ route('country.update', $country->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-4">
                                <label for="Name" class="form-label">Name</label>
                                <input name="Name" id="Name" type="text"
                                    class="form-control @error('Name')
                                        is-invalid
                                    @enderror"
                                    value="{{ old('Name', $country->Name) }}" />
                                @error('Name')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-4">
                                <label for="ISO" class="form-label">ISO</label>
                                <input type="text" id="ISO" name="ISO" value="{{ old('ISO', $country->ISO) }}"
                                    class="form-control @error('ISO')
                                        is-invalid
                                    @enderror" />

                                @error('ISO')
                                    <span class="invalid-feedback">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-info">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
