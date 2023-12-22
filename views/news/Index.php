
        <div id="body">
 <?php Session::intiliaze(); ?>
 <?php if (Session::getSessionData("user_type") == 'admin'): ?>
            <div class="news-form">
                <h1><img src="<?php echo URL;?>public/img/news.ico">News Updater</h1>
                <div class="the-form">
                <form method="post" action="<?php echo URL;?>administrator/adminUpdateNews" id="news-insert">
                <ul>
                    <li><label>Target Business : </label></li>
                    <li>
                        <select name="business">
                            <option value="farming">Farming</option>
                            <option value="other">other news</option>
                            <option value="market">Poultry Market and Sales</option>
                        </select>
                    </li>
                    <li><label>The subject of the news : </label></li>
                    <li><input type="text" name="subject" /></li>
                    <li><label>The news : </label></li>
                    <li>
                    <textarea name="details"></textarea>
                    </li>
                    <li><input type="submit" value="update news" /></li>
                    </ul>
                </form>
                </div>

            </div>
                <?php else: /*<?php echo URL;?>dashboard/adminUpdateNews*/ ?>

            <div class="news-form">
                <h1><img src="<?php echo URL;?>public/img/product.ico">What are you selling?</h1>
                <div class="the-form">
                     <form method="post" action="<?php echo URL;?>dashboard/productNews" id="product-insert">
                     <ul><li>
                            <textarea name="product" class="textarea"></textarea>
                        </li>
                        <li><input type="submit" value="Product update" /></li>
                        </ul>
                     </form>
                </div>
            </div>

                <?php endif; ?>

            <div class="news-board">
                 <h1><img src="<?php echo URL;?>public/img/board.ico">The News Board</h1>
                 <div class="new-board">
  
                 </div>
            </div>

            <div class="foot">
                <p>&copy; ekuku 2014</p><p>A product of Catherine</p>
            </div>
        </div>
    </body>
</html>