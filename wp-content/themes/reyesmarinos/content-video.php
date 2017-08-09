<?php
/**************************************************************************************/
/* Template for the video post format */
/**************************************************************************************/
?>

<section class="Events">
  <?php
    $values = get_post_custom(get_the_id());
    $video = isset($values['mb_video']) ? esc_attr($values['mb_video'][0]) : '';
  ?>
  <?php if (!empty($video)) : ?>
    <figure class="Page-video Events-video">
      <!-- 1. The <iframe> (and video player) will replace this <div> tag. -->
      <div id="player"></div>

      <script>
        // 2. This code loads the IFrame Player API code asynchronously.
        var tag = document.createElement('script');

        tag.src = "https://www.youtube.com/iframe_api";
        var firstScriptTag = document.getElementsByTagName('script')[0];
        firstScriptTag.parentNode.insertBefore(tag, firstScriptTag);

        // 3. This function creates an <iframe> (and YouTube player)
        //    after the API code downloads.
        var player;
        function onYouTubeIframeAPIReady() {
          player = new YT.Player('player', {
            height: '360',
            width: '640',
            videoId: '<?php echo $video; ?>',
            events: {
              // 'onReady': onPlayerReady,
              'onStateChange': onPlayerStateChange
            }
          });
        }

        // 4. The API will call this function when the video player is ready.
        function onPlayerReady(event) {
          event.target.playVideo();
        }

        // 5. The API calls this function when the player's state changes.
        //    The function indicates that when playing a video (state=1),
        //    the player should play for six seconds and then stop.
        var done = false;
        function onPlayerStateChange(event) {
          if (event.data == YT.PlayerState.PLAYING && !done) {
            setTimeout(stopVideo, 6000);
            done = true;
          }
        }
        function stopVideo() {
          player.stopVideo();
        }
      </script>
    </figure>
  <?php endif; ?>

  <article class="Events-content">
    <h2 class="Page-title text-yellow"><?php the_title(); ?></h2>
    <?php the_content(); ?>
  </article>
</section>

<?php
  if (file_exists(TEMPLATEPATH . '/partials/navigation-events.php')) {
    include TEMPLATEPATH . '/partials/navigation-events.php';
  }
?>