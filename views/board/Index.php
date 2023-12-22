
        <div id="body">
            <div class="news-form">
                <h1><img src="<?php echo URL;?>public/img/news.ico">Write on the board</h1>
                <div class="the-form">
                <form method="post" action="<?php echo URL;?>dashboard/ajaxInsertBoard" id="board-inserts">
                <ul>
                    <li>
                    <textarea name="details"></textarea>
                    </li>
                    <li><input type="submit" value="Post on the board" /></li>
                </ul>
                </form>
                </div>
            </div>

            <div class="theboard">
                 <h1><img src="<?php echo URL;?>public/img/board.ico">The Board</h1>
                 <div class="theboards"> 
                 </div>
            </div>

            <div class="foot">
                <p>&copy; ekuku 2014</p><p>A product of Catherine</p>
            </div>
        </div>
    </body>
</html>