<div class="text-center mt-5">
    <form style="max-width: 300px; margin:auto;" method="POST">
        <h2 class="form-signin-heading">Sign Up</h2>
        <div class="mt-2">
            <label for="emailId" class="form-label">Email Address</label>
            <input id="emailId" type="text" class="form-control" name="txtEmail" placeholder="john@email.com" required="" autofocus="" />
        </div>
        <div class="mt-2">
            <label for="namaId" class="form-label">Full Name</label>
            <input type="text" class="form-control" name="txtNama" placeholder="John Doe" required="" autofocus="" id="namaId" />
        </div>
        <div class="mt-2">
            <input type="radio" name="gender" id="gender1" value="Male" class="btn-check" checked>
            <label for="gender1" class="btn btn-outline-primary">Male</label>
            <input type="radio" name="gender" id="gender2" value="Female" class="btn-check">
            <label for="gender2" class="btn btn-outline-primary">Female</label>
        </div>
        <div class="mt-2">
            <label for="passwordId" class="form-label">Password</label>
            <input id="passwordId" type="password" class="form-control" name="txtPassword" placeholder="Password" required>
        </div>
        <div class="mt-2">
            <label for="confirmId" class="form-label">Confirm Password</label>
            <input id="confirmId" type="password" class="form-control" name="txtConfirm" placeholder="Confirm Password" required>
        </div>
        <div class="mt-3">
            <button class="btn btn-lg btn-primary w-100" type="submit" name="btnSignUp">Create Account</button>
        </div>

    </form>
</div>