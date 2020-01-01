<?php
  $phpFileUploadErrors = array(
    0 => 'there is no error',
    1 => 'The uploaded file exceeds the number of uploads',
    2 => 'The uploaded file exceeds max file size',
    3 => 'The uploaded file was only partially uploaded',
    4 => 'No file was selected',

    6 => 'Missing a temporary folder',
    7 => 'Failed to write file to disk.',
    8 => 'A php extension stopped the file upload.',
  );

  function pre_r( $array ) {
    echo "<pre>";
    print_r( $array );
    echo "</pre>";
  }
  function reArrayFiles( $file_post ) {
    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i < $file_count; $i++) {
      foreach ($file_keys as $key) {
        $file_ary[$i][$key] = $file_post[$key][$i];
      }
    }
    return $file_ary;
  }
  function show_r( $array, $i ) {
    echo count($array);
    $imageData = file_get_contents($array[$i]['tmp_name']); // path to file like /var/tmp/...
    ?>

      <tr >
        <td> <?php echo sprintf("<img src='data:image/png;base64,%s' height='150px' />", base64_encode($imageData)); ?>  </td>
      </tr>

    <?php
    // display in view
    //echo sprintf('<img src="data:image/png;base64,%s" />', base64_encode($imageData));
  }
  $file_array = array();
  if ( isset($_FILES['userfile']) ) {
    global $file_array;
    $file_array = reArrayFiles($_FILES['userfile']);
    pre_r($file_array);
    //show_r($file_array);
    for ($i=0; $i < count($file_array); $i++) {
      if ($file_array[$i]['error']) {
        ?>
        <tr>
          <td> <?php echo $file_array[$i]['name'].' - '.$phpFileUploadErrors[$file_array[$i]['error']]; ?> </td>
        </tr>
        <?php
      } else {
        $extensions = array('jpg' , 'png', 'jpeg');
        $file_ext = explode('.',$file_array[$i]['name']);
        $file_ext = end($file_ext);
        if (!in_array($file_ext, $extensions)) {
          ?>
            <?php echo "{$file_array[$i]['name']} - Invalid file extension!"; ?>
          <?php
        } else {
          show_r( $file_array, $i );
        }
      }
    }
  }

?>
