<?php $this->layout("dashboard"); ?>

<article class="optin_page">
    <div class="container content">
        <div class="optin_page_content">
            <img alt="<?=$data->title;?>" title="<?=$data->title;?>" src="<?=$data->image;?>"/>
            <h1><?=$data->title;?></h1>
            <p><?=$data->desc;?></p>
            <?php if(!empty($data->link)): ?>
                <a class="optin_page_btn gradient gradient-<?=CONF_SITE_BASECOLOR?> gradient-hover radius"
                   href="<?=$data->link;?>" title="<?=$data->linkTitle; ?>"><?=$data->linkTitle;?></a>
            <?php endif;?>
        </div>
    </div>

    <div class="post_page_content">
        <aside class="social_share">
            <h3 class="social_share_title icon-heartbeat">Ajude seus amigos a controlar:</h3>
            <div class="social_share_medias">
                <!--facebook-->
                <div class="fb-share-button" data-href="<?= $data->url; ?>" data-layout="button_count"
                     data-size="large"
                     data-mobile-iframe="true">
                    <a target="_blank"
                       href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode($data->url); ?>"
                       class="fb-xfbml-parse-ignore">Compartilhar</a>
                </div>

                <!--twitter-->
                <a href="https://twitter.com/share?ref_src=site" class="twitter-share-button" data-size="large"
                   data-text="<?= $data->title; ?>" data-url="<?= $data->url; ?>"
                   data-via="<?= str_replace("@", "", CONF_SOCIAL_TWITTER_CREATOR); ?>"
                   data-show-count="true">Tweet</a>
            </div>
        </aside>
    </div>
</article>

<?php $this->start("scripts"); ?>
    <div id="fb-root"></div>
    <script>(function (d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s);
            js.id = id;
            js.src = 'https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v3.1&appId=267654637306249&autoLogAppEvents=1';
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

    <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
<?php $this->end(); ?>