<?php 
$data = ['title' => 'login'];
echo view('/templates/header',$data);
?>


<!-- Modal -->
<div class="modal fade" id="ResetPasswordModal" tabindex="-1" aria-labelledby="ResetPasswordModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content bg-dark">
            <div class="modal-header border-dark">
                <h5 class="modal-title" id="ResetPasswordModalLabel">Reset Password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="form-floating">
                    <input type="email" class="form-control" placeholder="Email" id="passwordResetEmail" required>
                    <label for="email">Email</label>
                </div>
                <div class="invalid-feedback" id="EmailResetBadFeedback">
                </div>
                <div class="valid-feedback" id="EmailResetGoodFeedback">
                Email Was Sent Successfully
                </div>
            </div>
            <div class="modal-footer border-dark">
                <button onclick="sendResetPasswordEmail()" type="button" class="btn btn-primary">Send Password Reset
                    Link</button>
            </div>
        </div>
    </div>
</div>

<div class="vh-100 d-flex align-items-center">
    <div class='w-100'>
        <h1 class="text-center mb-5 w-75 m-auto">Welcome to the Metroville Character Creator</h1>
        <div class="m-auto bg-dark p-4 pb-3 text-center w-50"
            style="min-width:300px;max-width:500px;border-radius:0.25rem">
            <form id="Login" class="needs-validation" novalidate>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="email" required>
                    <label for="email">Email <text class="text-danger">*</text></label>
                    <div class="invalid-feedback email">
                    </div>
                </div>
                <div class="mb-3 form-floating ">
                    <input type="password" class="form-control" placeholder="Password" id='password' required
                        minlength="6" maxlength="24">
                    <label for="password">Password <text class="text-danger">*</text></label>
                    <div class="invalid-feedback password">
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class='btn btn-primary'>Login</button>
                </div>
            </form>
            <a class="p-0 mb-3" data-bs-toggle="modal" data-bs-target="#ResetPasswordModal">Reset Password</a>
            <hr>
            <div class="mb-3">
                <button onclick="location.href = '/register';" class='btn btn-secondary'>Register</button>
            </div>
        </div>

    </div>
</div>

<script src="/js/LoginAndRegistration.js"></script>
<?php 
echo view('/templates/footer');