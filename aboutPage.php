<!DOCTYPE html>
<html lang="en">
  <?php echo file_get_contents('components/head.html'); ?>

  <head>
    <link rel="stylesheet" href="assets/css/about.css">
  </head>

  <body>

    <?php
      echo file_get_contents('components/nav.html');
      echo file_get_contents('components/basket.html');
    ?>

    <img src="https://www.getmulberry.com/hubfs/shutterstock_2150257067.jpg">
    <div class="about">
      <section class="about-container">
        <h1>About Coffin Gaming</h1>
        <p>
          At <strong>Coffin Gaming</strong>, we are passionate about delivering immersive and thrilling gaming experiences.
          Founded with a vision to revolutionize interactive entertainment, our team of dedicated developers and designers
          work tirelessly to create games that captivate, challenge, and inspire players around the world.
        </p>

        <p>
          Our mission is simple: <em>to push the boundaries of gaming</em> while maintaining a fun, inclusive, and innovative environment.
          From concept to launch, every project reflects our commitment to quality, creativity, and player satisfaction.
        </p>

        <p>
          Join us on our journey and explore the worlds we create. At Coffin Gaming, the game never ends.
        </p>
      </section>
    </div>

    <div style="position: fixed; bottom: 0; left: 0; width: 100%;">
      <?php include 'components/footer.html'; ?>
    </div>

  </body>
</html>

<script src="assets/js/basket.js"></script>

<style>
body {
    background: #222;
    color: #eee;
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    overflow: hidden;
    
}

img{
  width: 100%;
  height: 100%;
}
.about::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0,0,0,0.7);
}

.about-container {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%, -50%); /* centers text */
    color: #fff; /* white text on image */
    text-align: center;
}

.about-container h1 {
    font-size: 3em;
    margin-bottom: 20px;
}

.about-container p {
    font-size: 1.2em;
    line-height: 1.8;
    margin-top: 20px;
}

hr {
    margin: 40px 0;
    border: 1px solid #444;
}
</style>
