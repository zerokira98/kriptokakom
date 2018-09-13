<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Tugas kakom</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">
    <style media="screen">
      ul{

      }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class=" col s12">
          <nav class="nav-extended">
            <div class="nav-content">
              <ul class="tabs tabs-transparent">
                 <li class="tab"><a class="active" href="#nu1">Encrypt</a></li>
                 <li class="tab"><a href="#nu2">Decrypt</a></li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="container" id="nu1">
      <div class="row card-panel">
        <div class="col s12 card-panel">
          <h3>Enkripsi</h3>
        </div>
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12">
          <textarea id="textarea1" class="materialize-textarea"></textarea>
          <label for="textarea1">Input plain text</label>
        </div>
        <div class="input-field col s6">
          <input id="ekey1" type="text" class="validate">
          <label for="ekey1">Key1</label>
        </div>
        <div class="input-field col s6">
          <input id="ekey2" type="text" class="validate">
          <label for="ekey2">Key2</label>
        </div>
          </div>
          <div class="col s12">
            <button class="waves-effect waves-light btn encrypt">Encode</button>
          </div>
        </form>
      </div>
      <br>
      <div class="col s12 card-panel">
      <label for="encoded">Hasil Encoding</label>
        <textarea id="encoded" class="materialize-textarea"></textarea>
      </div>
    </div>

    <div class="container" id="nu2">
      <div class="row card-panel">
        <div class="col s12 card-panel">
          <h3>Dekripsi</h3>
        </div>
        <form class="col s12">
          <div class="row">
            <div class="input-field col s12">
          <textarea id="textarea2" class="materialize-textarea"></textarea>
          <label for="textarea2">Input encoded text</label>
        </div>
        <div class="input-field col s6">
          <input id="dkey1" type="text" class="validate">
          <label for="dkey1">Key1</label>
        </div>
        <div class="input-field col s6">
          <input id="dkey2" type="text" class="validate">
          <label for="dkey2">Key2</label>
        </div>
          </div>
          <div class="col s12">
            <button class="waves-effect waves-light btn decrypt">Decode</button>
          </div>
        </form>
      </div>
      <br>
      <div class="col s12 card-panel">
      <label for="decoded">Hasil Decoding</label>
        <textarea id="decoded" class="materialize-textarea"></textarea>
      </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous">    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/js/materialize.min.js"></script>
    <script type="text/javascript">
    M.AutoInit();
    $("li a").on("click", function () {
      $(this).attr()
    })
    $(".encrypt").on("click", function () {

        event.preventDefault();
        var plain = $("#textarea1").val();
        var key1 = $("#ekey1").val();
        var key2 = $("#ekey2").val();
        $.ajax({
          url:"encode.php",
          type:"POST",
          data:{
            plain:plain,
            key1:key1,
            key2:key2
          },
          success: function (data) {
            console.log("success");
            $("#encoded").html(data);
          }
        })
    });
    $(".decrypt").on("click", function () {
      event.preventDefault();
        var plain = $("#textarea2").val();
        var key1 = $("#dkey1").val();
        var key2 = $("#dkey2").val();
        $.ajax({
          url:"decode.php",
          type:"POST",
          data:{
            plain:plain,
            key1:key1,
            key2:key2
          },
          success: function (data) {
            $("#decoded").html(data);
          }
        })
    });

    </script>
  </body>
</html>
