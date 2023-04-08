<form action="" method="post">
    <textarea name="links" id="" cols="30" rows="10" placeholder="Nhập link youtube..."></textarea> <br />
    <button type="submit">Submit</button>
</form>

<hr />

<?php
$pattern = '/(?:http|https):\/\/(?:(?:www\.|)youtube\.com\/(?:watch\?v=([^&]+)|v\/([^\?]+))|youtu\.be\/([^\?]+))/';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $links = $_POST['links'];
    $links = explode("\n", $links);
    foreach ($links as $link) {
        preg_match($pattern, $link, $matches);
        $matches = array_values(array_filter($matches));

        if (!empty($matches[1])) {
            $id = trim($matches[1]);
            echo '<iframe width="100%" height="315" src="https://www.youtube.com/embed/'.$id.'" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></br/>';
        }
    }
}
