<?php

$xml = simplexml_load_file("http://blog.b92.net/rss/feed/index.xml");
foreach($xml->channel->item as $itm) {
    $title = $itm->title;
    $link = $itm ->link;
    $description = $itm->description;
    $date = $itm->pubDate;
    echo '
                
                    <article class="blog-post">
                <h2 class="display-5 link-body-emphasis mb-1"><a href="'.$link.'">'.$title.'</h2>
                <p class="blog-post-meta">'.$date.'</a></p>

                
                <hr>

                <blockquote class="blockquote">
                    '.$description.'

                </blockquote>
                <hr>

            </article>
                
                ';
}



?>
