<?php
/**
 * Created by PhpStorm.
 * User: umar
 * Date: 12/27/2015
 * Time: 7:16 PM
 */

function grab_page($site){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_TIMEOUT, 40);
    curl_setopt($ch, CURLOPT_URL, $site);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST ,"GET");
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);

    return curl_exec ($ch);
    curl_close ($ch);
}

$response = grab_page('https://demo2697834.mockable.io/movies');

//print_r($response);
$response = json_decode($response);
//print_r($response->entries);
$total = $response->totalCount;
/*for($i = 0 ; $i < $total ; $i++)
{
    echo $i.'<br/>';
    echo $response->entries[$i]->contents[0]->url.'<br/>';
}
*/
?>
<!doctype html>
<html>
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <style>
        .carousel-inner > .item > img,
        .carousel-inner > .item > a > img {
            width: 70%;
            margin: auto;
        }
    </style>


</head>
<body>

<div class="container">
    <div class="span8">
        <div id="myCarousel" class="carousel slide">
            <ol class="carousel-indicators">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
                <li data-target="#myCarousel" data-slide-to="3"></li>
            </ol>
            <div class="carousel-inner">
                <?php
                for($i = 0 ; $i < $total ; $i++) {
                    if($i == 0) {
                        ?>
                        <div class="item active">
                            <iframe width="100%" height="500px" src=<?php echo $response->entries[$i]->contents[0]->url ?> frameborder="0" allowfullscreen=""></iframe>

                            <div class="carousel-caption">
                                <h3><?php echo $i.'TH SLIDE'?></h3>
                                <p><?php echo $i.'TH SLIDE'?></p>
                            </div>

                        </div>
                    <?php
                    }
                    else {
                        ?>
                        <div class="item">

                            <iframe width="100%" height="500px" src=<?php echo $response->entries[$i]->contents[0]->url ?> frameborder="0" allowfullscreen=""></iframe>
                            <div class="carousel-caption">
                                <h3><?php echo $i.'TH SLIDE'?></h3>
                                <p><?php echo $i.'TH SLIDE'?></p>
                            </div>

                        </div>
                    <?php
                    }
                }
                ?>

            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
        </div>
    </div>
</div>
</body>
</html>