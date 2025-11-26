<section class="mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-1">Update Password</h4>
            <p class="text-muted mb-4">
                Ensure your account is using a long and random password to stay secure.
            </p>

            <form method="post" action="{{ route('password.update') }}">
                @csrf
                @method('put')

                <!-- Current Password -->
                <div class="mb-3">
                    <label for="update_password_current_password" class="form-label">Current Password</label>
                    <input id="update_password_current_password" type="password" name="current_password"
                        class="form-control @error('current_password', 'updatePassword') is-invalid @enderror"
                        autocomplete="current-password">

                    @if ($errors->updatePassword->has('current_password'))
                        <div class="invalid-feedback">
                            {{ $errors->updatePassword->first('current_password') }}
                        </div>
                    @endif
                </div>

                <!-- New Password -->
                <div class="mb-3">
                    <label for="update_password_password" class="form-label">New Password</label>
                    <input id="update_password_password" type="password" name="password"
                        class="form-control @error('password', 'updatePassword') is-invalid @enderror"
                        autocomplete="new-password">

                    @if ($errors->updatePassword->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->updatePassword->first('password') }}
                        </div>
                    @endif
                </div>

                <!-- Confirm Password -->
                <div class="mb-3">
                    <label for="update_password_password_confirmation" class="form-label">Confirm Password</label>
                    <input id="update_password_password_confirmation" type="password" name="password_confirmation"
                        class="form-control @error('password_confirmation', 'updatePassword') is-invalid @enderror"
                        autocomplete="new-password">

                    @if ($errors->updatePassword->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->updatePassword->first('password_confirmation') }}
                        </div>
                    @endif
                </div>

                <div class="d-flex align-items-center gap-3">
                    <button class="btn btn-primary" type="submit">Save</button>

                    @if (session('status') === 'password-updated')
                        <span class="text-success small">
                            Saved.
                        </span>
                    @endif
                </div>
            </form>
        </div>
    </div>
</section>
