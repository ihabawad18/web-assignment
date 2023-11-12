<?php
  $jsonFile = 'images.json';
  $jsonData = file_get_contents($jsonFile);
  $arrayData = json_decode($jsonData, true);
  $i=0;
  include('templates/header.php');
?>

<div class="container">
  <div class="gallery-container">
      <?php foreach($arrayData as $image){?>
        <div class="image-container">
          <a href="<?php echo '#image'.$i?>" id="<?php echo $i?>"  class="thumbnail"> <img
            src="<?php echo './images/'.$image['image']?>"
            alt="image"/>
          </a>
          <div class="lightbox" id="<?php echo 'image'.$i?>">
            <img src="<?php echo './images/'.$image['image']?>" alt="Image 1">
            <a  href="./gallery.php">Go Back</a>
          </div>
        </div>
      <?php $i++; }?>  
      
    </div>
</div>

</body>
</html>
