#!/usr/bin/php

<?php
    $lines = file($argv[1]);
    $base = file("base.html") ;
    $fin = file("fin.html") ;  

    $file = implode("", $lines);

    // Remplacement des balises markdown en balises html
    $file = preg_replace('/^# (.+)/im', '<h1>$1</h1>', $file);
    $file = preg_replace('/^## (.+)/im', '<h2>$1</h2>', $file);
    $file = preg_replace('/^### (.+)/im', '<h3>$1</h3>', $file);

    $file = preg_replace('/(^- .+\n)+/im', "<ul>\n$0\n</ul>\n", $file);
    $file = preg_replace('/^- (.+)\n/im', '<li>$1</li>', $file);

    $file = preg_replace('/ \*\*/im', ' <strong>', $file);
    $file = preg_replace('/^\*\*/im', ' <strong>', $file);
    $file = preg_replace('/ \_/im', ' <em>', $file);
    $file = preg_replace('/^\_/im', ' <em>', $file);
    $file = preg_replace('/[^ ]\*\* /im', '</strong> ', $file);
    $file = preg_replace('/[^ ]\*\*\n/im', '</strong> ', $file);
    $file = preg_replace('/[^ ]\_ /im', '</em> ', $file);
    $file = preg_replace('/[^ ]\_\n/im', '</em> ', $file);


    $file = preg_replace('/^```\n((?:.+\n)+)```$/im', "<pre>\n$1</pre>", $file);

    $pages = explode("---", $file);  

    // Reconstruction d'une page html avec le debut, le milieu et la fin
    foreach($pages as $numPage => $page) {
      if ($numPage+1<count($pages))
      {
        file_put_contents($argv[2] . "pages/" . ($numPage+1) . ".html", $base) ; 
        file_put_contents($argv[2] . "pages/" . ($numPage+1) . ".html", $page, FILE_APPEND);
        file_put_contents($argv[2] . "pages/" . ($numPage+1) . ".html", $fin, FILE_APPEND);
      } 
    } 
?>