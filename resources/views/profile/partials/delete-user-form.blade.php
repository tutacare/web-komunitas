<section class="mb-4">
    <div class="card shadow-sm border-0">
        <div class="card-body p-4">

            <h4 class="fw-bold mb-1">Delete Account</h4>
            <p class="text-muted mb-4">
                Once your account is deleted, all of its resources and data will be permanently removed.
                Please download any data that you wish to keep before proceeding.
            </p>

            <!-- Button trigger modal -->
            <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal">
                Delete Account
            </button>

        </div>
    </div>
</section>

<!-- Bootstrap Delete Confirmation Modal -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" aria-labelledby="confirmDeleteModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="confirmDeleteModalLabel">Confirm Account Deletion</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>

            <form method="post" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')

                <div class="modal-body">

                    <p>
                        Once your account is deleted, all data and resources associated with it will be permanently
                        removed.
                        Please enter your password below to confirm.
                    </p>

                    <div class="mb-3">
                        <label for="delete_password" class="form-label">Password</label>
                        <input id="delete_password" type="password" name="password"
                            class="form-control @if ($errors->userDeletion->has('password')) is-invalid @endif"
                            placeholder="Enter your password">

                        @if ($errors->userDeletion->has('password'))
                            <div class="invalid-feedback">
                                {{ $errors->userDeletion->first('password') }}
                            </div>
                        @endif
                    </div>

                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        Cancel
                    </button>

                    <button type="submit" class="btn btn-danger">
                        Permanently Delete Account
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
