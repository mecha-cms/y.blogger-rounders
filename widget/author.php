<?php

$author = $page->author ?? 0;
$content = "";
if ($author) {
    if ($author instanceof User) {
        if ($avatar = $author->avatar(72)) {
            $content .= '<figure>';
            $content .= '<img alt="" height="72" src="' . $avatar . '" width="72">';
            $content .= '<figcaption>';
            $content .= '<p><a href="' . ($author->link ?? $author->url) . '" rel="author">' . $author . '</a></p>';
            $content .= '</figcaption>';
            $content .= '</figure>';
        } else {
            $content .= '<p><a href="' . ($author->link ?? $author->url) . '" rel="author">' . $author . '</a></p>';
        }
        $content .= '<p>' . $author->description . '</p>';
        $content .= '<p><time datetime="' . $author->time->format('c') . '" role="status">' . i('Joined since %s', $author->time('%B %Y')) . '</time></p>';
    } else {
        $content .= '<p><b>' . $author . '</b></p>';
    }
}

if ("" !== $content) {
    echo self::widget([
        'content' => $content,
        'title' => $title ?? i('Author')
    ]);
}