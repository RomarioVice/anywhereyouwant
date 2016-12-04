<?php
echo <<<EOT
     <div class="news-main">
     <br>
       <img class="news-pic-main" src="$row[pic]">
        <p class="news-title-main">$row[title]</p>                                    
        <p class="news-text-main">$row[text]...</p>
        <a class='etc-main' href='view.php?type=news&id=$row[id]'>Подробнее</a>
        <p>&nbsp;</p>
     </div>
EOT;
