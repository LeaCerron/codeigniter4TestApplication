<?php 
$data = ['title' => 'login'];
echo view('/templates/header',$data);
?>

<div class="vh-100 d-flex align-items-center">
    <div class='w-100'>
        <h1 class="text-center mb-5 w-75 m-auto">Reset Password For <?= $email?></h1>
        <div class="m-auto bg-dark p-4 pb-3 text-center w-50"
            style="min-width:300px;max-width:500px;border-radius:0.25rem">
            <form id="ResetPassword" class="needs-validation" novalidate>
                <div class="mb-3 form-floating ">
                    <input type="password" class="form-control" placeholder="Password" id='password1' required
                        minlength="6" maxlength="24">
                    <label for="password1">New Password <text class="text-danger">*</text></label>
                    <div class="invalid-feedback password1">
                        Please provide a valid password.
                    </div>
                </div>
                <div class="mb-3 form-floating ">
                    <input type="password" class="form-control" placeholder="Password" id='password2' required
                        minlength="6" maxlength="24">
                    <label for="password2">Retype New Password <text class="text-danger">*</text></label>
                    <div class="invalid-feedback password2">
                        Duplicate passwords do not match
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class='btn btn-primary'>Reset Password</button>
                </div>
            </form>
        </div>

    </div>
</div>

<script>
var email = "<?= $email?>"
</script>

<script src="/js/LoginAndRegistration.js"></script>
<?php 
echo view('/templates/footer');