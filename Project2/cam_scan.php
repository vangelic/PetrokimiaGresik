<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>qrcode-reader usage example</title>
  <link rel="stylesheet" href="../dist/css/qrcode-reader.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
  <style>
    body {
      font-family: 'Lato', sans-serif;
    }
  </style>
</head>

<body>
  
<h1>QRCode reader plugin examples</h1>

<form>
  <label for="single">Single input (rebound click, depending on target input's content):</label> 
  <input id="single2" type="text" size="50"> 
  <button type="button" id="openreader-single2" 
    data-qrr-target="#single2" 
    data-qrr-audio-feedback="true">Read or follow QRCode</button>
</form>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="../dist/js/qrcode-reader.min.js?v=20190604"></script>

<script>
  
  $(function(){

    // overriding path of JS script and audio 
    $.qrCodeReader.jsQRpath = "../dist/js/jsQR/jsQR.min.js";
    $.qrCodeReader.beepPath = "../dist/audio/beep.mp3";

    // bind all elements of a given class
    $(".qrcode-reader").qrCodeReader();

    // read or follow qrcode depending on the content of the target input
    $("#openreader-single2").qrCodeReader({callback: function(code) {
      if (code) {
        window.location.href = code;
      }  
    }}).off("click.qrCodeReader").on("click", function(){
      var qrcode = $("#single2").val().trim();
      if (qrcode) {
        window.location.href = qrcode;
      } else {
        $.qrCodeReader.instance.open.call(this);
      }
    });


  });

</script>


</body>
</html>