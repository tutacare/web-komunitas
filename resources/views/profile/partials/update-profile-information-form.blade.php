<section class="mb-4">

    <div class="mb-3">
        <h2 class="h5 fw-bold text-dark">Profile Information</h2>
        <p class="text-muted small">
            Update your account's profile information and email address.
        </p>
    </div>

    <!-- Form untuk kirim ulang verifikasi -->
    <form id="send-verification" method="POST" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <!-- Form Update Profile -->
    <form method="POST" action="{{ route('profile.update') }}" class="mt-3">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="name" class="form-label fw-semibold">Name</label>
            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}" required autofocus>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-semibold">Email</label>
            <input type="email" id="email" name="email"
                class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="alert alert-warning mt-3 py-2">
                    <div class="small">
                        Your email address is unverified.
                        <button form="send-verification" class="btn btn-link p-0 small fw-semibold">
                            Click here to re-send the verification email.
                        </button>
                    </div>

                    @if (session('status') === 'verification-link-sent')
                        <div class="text-success small mt-1">
                            A new verification link has been sent to your email address.
                        </div>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3">
            <button class="btn btn-primary px-4">Save</button>

            @if (session('status') === 'profile-updated')
                <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small">
                    Saved.
                </span>
            @endif
        </div>
    </form>
</section>
