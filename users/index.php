<?php
if(file_exists('auth.php')){
    include('auth.php');
}else{
    include('../auth.php');
}
?>
<div class="limiter users-list">
    <div class="container-box100">
        <div class="wrap-box100">
				<span class="login100-form-title p-b-48">
					<i class="fa fa-user-plus"></i>
				</span>
            <form method="post" id="add-user-form">
                <input class="input100" type="text" hidden name="action" value="add-user">
                <div class="row user-row">
                    <div class="col-7">
                        Add user as Admin
                    </div>
                    <div class="col-2">
                        <input type="checkbox" class="user-input" name="is_admin">
                    </div>
                    <div class="col-3">
                        <a href="users/logout.php">Logout</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>User ID</label>
                    </div>
                    <div class="col-8">
                        <div class="user-input100 validate-input" data-validate="Enter Valid User Id">
                            <input class="user-input" type="text" name="user_id" required minlength="4">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>Password</label>
                    </div>
                    <div class="col-8">
                        <div class="user-input100 validate-input" data-validate="Enter password">
							<span class="btn-show-pass">
								<i class="zmdi zmdi-eye"></i>
							</span>
                            <input class="user-input" type="password" name="pass" required minlength="4">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <button class="add-btn">Add</button>
                    </div>
                </div>
            </form>
            <div class="row table-margin">
                <div class="col-12">
                    <table class="table user-table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>List of Users</th>
                            <th>Rights</th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="main-screen.html">
                        <button class="delete-btn">Next</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div id="dropDownSelect1"></div>-->