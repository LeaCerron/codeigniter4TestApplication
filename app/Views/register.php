<?php 
$data = ['title' => 'register'];
echo view('/templates/header',$data);
?>
<div class="vh-100 d-flex align-items-center">
    <div class='w-100'>
        <h1 class="text-center mb-5 w-75 m-auto">Welcome to the Metroville Character Creator</h1>
        <div class="m-auto bg-dark p-4 pb-3 text-center w-50"
            style="min-width:300px;max-width:500px;border-radius:0.25rem">
            <form id="Register" class="needs-validation" novalidate>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" placeholder="Email" id="email" required>
                    <label for="email">Email <text class="text-danger">*</text></label>
                    <div class="invalid-feedback email">
                        Please provide a valid Email.
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" placeholder="Name" id="name" maxlength="100">
                    <label for="name">Name</label>
                    <div class="invalid-feedback name">
                    </div>
                </div>
                <div class="mb-3 form-floating ">
                    <input type="password" class="form-control" placeholder="Password" id='password1' required
                        minlength="6" maxlength="24">
                    <label for="password1">Password <text class="text-danger">*</text></label>
                    <div class="invalid-feedback password1">
                        Please provide a valid password.
                    </div>
                </div>
                <div class="mb-3 form-floating ">
                    <input type="password" class="form-control" placeholder="Password" id='password2' required
                        minlength="6" maxlength="24">
                    <label for="password2">Retype Password <text class="text-danger">*</text></label>
                    <div class="invalid-feedback password2">
                        Duplicate passwords do not match
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" class='btn btn-primary'>Register</button>
                </div>
            </form>
            <hr>
            <div class="mb-3">
                <button onclick="location.href = 'login';" class='btn btn-secondary'>Login</button>
            </div>
        </div>
    </div>
</div>
<script src="/js/LoginAndRegistration.js"></script>


<?php 
echo view('/templates/footer')
?>