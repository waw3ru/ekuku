		<div id="body">

			<div class="not-approved">
				<h1>Users awaiting your approval</h1>
				<table class="notApproved">
					<tr>
					<th>uid</th> <th>Firstname</th>
					<th>Lastname</th> <th>Phone Number</th>
					<th>Email Address</th> <th>Gender</th>
					<th>Business</th> <th>Creation_Date</th> 
					<th>Approved</th>
					</tr>
				</table>
			</div>

			<!-- post data -->
			
			<div class="approved">
				<h1>Users already approved</h1>
				<table class="table-approved">
					<tr>
					<th>uid</th> <th>Firstname</th>
					<th>Lastname</th> <th>Phone Number</th>
					<th>Email Address</th> <th>Gender</th>
					<th>Business</th> <th>Creation_Date</th> 
					<th>Approved</th>
					</tr>
				</table>
			</div>

			<!-- registration form -->
            <div class="register">
            <form action="<?php echo URL; ?>administrator/ajaxSysRegister" method="post" id="index-registration-form">
                <table class="tbl-register">
                    <tr><th><h3>Don't have an account? Register Here</h3></th></tr>
                    <tr><td class="registration-handle"></td></tr>
                    <tr>
                        <td><label>Enter your firstname: </label></td>
                        <td><input type="text" name="firstname" /></td>
                    </tr>

                    <tr>
                        <td><label>Enter your lastname: </label></td>
                        <td><input type="text" name="lastname" /></td>
                    </tr>

                    <tr>
                        <td><label>Enter your Email Address: </label></td>
                        <td><input type="text" name="email" class="email"/></td>
                    </tr>

                    <tr>
                        <td><label>Enter your Password: </label></td>
                        <td><input type="password" name="password" /></td>
                    </tr>

                    <tr>
                        <td><label>Enter your Phone number: </label></td>
                        <td><input type="text" name="phone" /></td>
                    </tr>

                    <tr>
                        <td><label>Your Gender: </label></td>
                        <td>
                            <select name="gender">
                                <option value="m">Male</option>
                                <option value="f">Female</option>
                            </select>
                        </td>
                    </tr>

                    <tr>
                    <td><label>Select your type of business: </label></td>
                    <td>
                        <select name="business">
                            <option value="layers">Layers</option>
                            <option value="broilers">Broilers</option>
                            <option value="both">Both broilers and layers</option>
                        </select>
                    </td>
                    </tr>
                    <tr><td><input type="submit" value="Register" /></td></tr>
                </table>
            </form>
            </div>

			<div class="foot">
				<p>&copy; ekuku 2014</p><p>A product of Catherine</p>
			</div>
		</div>
	</body>

</html>