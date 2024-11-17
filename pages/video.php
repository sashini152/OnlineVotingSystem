<?php
?>

<!DOCTYPE html>
<html>

<head>
    <title>StarGlow</title>
    <link rel="stylesheet" href="../css/videoseason.css">
</head>

<body>



    <h1>Video Gallery<br><br></h1>
    <br>

    <div class="container">

        <div class="video-container">
            <div class="video"><video src="../images/udarata1.mp4" muted></video></div>
            <div class="video"><video src="../images/udarata2.mp4" muted></video></div>
            <div class="video"><video src="../images/udarata1.mp4" muted></video></div>
            <div class="video"><video src="../images/udarata2.mp4" muted></video></div>
            <div class="video"><video src="../images/udarata1.mp4" muted></video></div>
            <div class="video"><video src="../images/udarata2.mp4" muted></video></div>



        </div>

        <div class="popup-video">
            <span>&times;</span>
            <video src="../images/udarata2.mp4" muted autoplay controls></video>
        </div>
    </div>

    <script>
        document.querySelectorAll('.video-container video').forEach(vid => {
            vid.onclick = () => {
                document.querySelector('.popup-video').style.display = 'block';
                document.querySelector('.popup-video video').src = vid.getAttribute('src');
                document.querySelector('.popup-video video').play();
            }
        });

        document.querySelector('.popup-video span').onclick = () => {
            var popupVideo = document.querySelector('.popup-video video');
            popupVideo.pause();
            popupVideo.currentTime = 0;
            document.querySelector('.popup-video').style.display = 'none';
        }
    </script>



</body>

</html>