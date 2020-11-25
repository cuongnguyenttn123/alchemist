<?php
function addhttp($url)
{
    if (!preg_match("~^(?:f|ht)tps?://~i", $url)) {
        $url = "http://" . $url;
    }
    return $url;
}

function roundUpToAny($n, $x = 5)
{
    return round(($n + $x / 2) / $x) * $x;
}

function rateToStar($starNumber)
{
    $val =  (int) substr(strrchr($starNumber, '.'), 1);
    for ($x = 1; $x <= $starNumber; $x++) {
        echo '<li><i class="fas fa-star star-icon c-primary" aria-hidden="true"></i></li>';
    }
    if (strpos($starNumber, '.') && $val != 0) {
        echo '<li><i class="fas fa-star-half-alt star-icon c-primary" aria-hidden="true"></i></li>';
        $x++;
    }
    while ($x <= 5) {
        echo '<li><i class="far fa-star star-icon c-primary" aria-hidden="true"></i></li>';
        $x++;
    }
}

function addOrdinalNumberSuffix($num)
{
    if (!in_array(($num % 100), array(11, 12, 13))) {
        switch ($num % 10) {
                // Handle 1st, 2nd, 3rd
            case 1:
                return $num . 'st';
            case 2:
                return $num . 'nd';
            case 3:
                return $num . 'rd';
        }
    }
    return $num . 'th';
}


function addSocial($url)
{
    // $url = 'https://thegioiso.vn/';
    $title = 'hungpro';

    $urls = '<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=' . $url . '"><i class="fab fa-facebook-f"></i></a></li>
    <li><a target="_blank" href="http://twitter.com/share?url=' . $url . '"><i class="fab fa-twitter"></i></a></li>';
    echo $urls;
}

function getInfoUrl($url)
{
    $url = htmlspecialchars(trim($url), ENT_QUOTES, 'ISO-8859-1', TRUE);

    $host = '';

    if (!empty($url)) {
        $url_data = parse_url($url);
        $host = $url_data['host'];

        $video = false;
        if (strpos($host, 'youtube') > 0) {
            $video = true;
        }

        $file = fopen($url, 'r');

        if (!$file) {
            return false;
        } else {
            $content = '';
            while (!feof($file)) {
                $content .= fgets($file, 1024);
            }
            $title_pattern = '/<span>(.+)<\/span>/i';
            $meta_tags = get_meta_tags($url);

            // Get the title
            $title = '';

            if (array_key_exists('og:title', $meta_tags)) {
                $title = $meta_tags['og:title'];
            } else if (array_key_exists('twitter:title', $meta_tags)) {
                $title = $meta_tags['twitter:title'];
            } else {
                $title_pattern = '/<title>(.+)<\/title>/i';
                preg_match_all($title_pattern, $content, $title, PREG_PATTERN_ORDER);

                if (!is_array($title[1]))
                    $title = $title[1];
                else {
                    if (count($title[1]) > 0)
                        $title = $title[1][0];
                    else
                        $title = 'Title not found!';
                }
            }

            $title = ucfirst($title);

            // Get the description
            $desc = '';

            if (array_key_exists('description', $meta_tags)) {
                $desc = $meta_tags['description'];
            } else if (array_key_exists('og:description', $meta_tags)) {
                $desc = $meta_tags['og:description'];
            } else if (array_key_exists('twitter:description', $meta_tags)) {
                $desc = $meta_tags['twitter:description'];
            } else {
                $desc = 'Description not found!';
            }

            $desc = ucfirst($desc);

            // Get url of preview image
            $img_url = '';
            if (array_key_exists('og:image', $meta_tags)) {
                $img_url = $meta_tags['og:image'];
            } else if (array_key_exists('og:image:src', $meta_tags)) {
                $img_url = $meta_tags['og:image:src'];
            } else if (array_key_exists('twitter:image', $meta_tags)) {
                $img_url = $meta_tags['twitter:image'];
            } else if (array_key_exists('twitter:image:src', $meta_tags)) {
                $img_url = $meta_tags['twitter:image:src'];
            } else {
                // Image not found in meta tags so find it from content
                $img_pattern = '/<img[^>]*' . 'src=[\"|\'](.*)[\"|\']/Ui';
                $images = '';
                preg_match_all($img_pattern, $content, $images, PREG_PATTERN_ORDER);

                $total_images = count($images[1]);
                if ($total_images > 0)
                    $images = $images[1];

                for ($i = 0; $i < $total_images; $i++) {
                    if (getimagesize($images[$i])) {
                        list($width, $height, $type, $attr) = getimagesize($images[$i]);

                        if ($width > 600) // Select an image of width greater than 600px
                        {
                            $img_url = $images[$i];
                            break;
                        }
                    } else {
                        return false;
                    }
                }
            }
            return ["img_url" => $img_url, "title" => $title, "desc" => $desc, "host" => $host, "url" => $url, "video" => $video];
        }
    }
}

/**
 * Used mainly in email templates
 *
 * @param float $value
 * @return string
 */
function formatMoney($value)
{
    return '$' . number_format($value) . ' USD';
}
