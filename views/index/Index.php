        <div id="body">
            <div class="info">
                <h1>eKUKU in a nutshell</h1>
                <p>
                    Poultry farming is the raising of domesticated birds such as chickens, turkeys, ducks, and geese, for the purpose of farming meat or eggs for food. Poultry are farmed in great numbers with chickens being the most numerous. More than 50 billion chickens are raised annually as a source of food, for both their meat and their eggs. Chickens raised for eggs are usually called layers while chickens raised for meat are often called broilers.<br />
                    <a href="http://en.wikipedia.org/wiki/Poultry_farming" target="_blank">more about poultry</a>
                </p>
            </div>

<!-- registration form -->
            <div class="register">
            <form action="<?php echo URL; ?>index/ajaxSysRegister" method="post" id="index-registration-form">
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

<!-- shows the latest products from farmers -->
            <div class="products">
                <h1>Latest product update</h1>
                <div class="product">
                </div>
            </div>

<!-- the footer -->
        <div class="foot">
            <p>&copy; ekuku 2014</p><p>A product of Catherine</p>
        </div>
        </div>
    </body>
</html>