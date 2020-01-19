<div class="limiter">
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
                        <input type="checkbox" class="user-input" name="type">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <label>User ID</label>
                    </div>
                    <div class="col-8">
                        <div class="user-input100 validate-input" data-validate = "Enter Valid User Id">
                            <input class="user-input" type="text" name="user_id">
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
                            <input class="user-input" type="password" name="pass">
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
                        <tr>
                            <td>1</td>
                            <td>Jose DM</td>
                            <td>Admin</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Carlos</td>
                            <td>Admin</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Usama</td>
                            <td>User</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Juana</td>
                            <td>Admin</td>
                            <td><button class="delete-btn">Delete</button></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <a href="main-screen.html"><button class="delete-btn">Next</button></a>
                </div>
            </div>
        </div>
    </div>
</div>


<!--<div id="dropDownSelect1"></div>-->