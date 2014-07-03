<!DOCTYPE html>
<html>
<head>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
  <!-- Optional theme -->
  <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
  <style>
    /*
   * Globals
   */

    /* Links */
    a,
    a:focus,
    a:hover {
      color: #fff;
    }

    /* Custom default button */
    .btn-default,
    .btn-default:hover,
    .btn-default:focus {
      color: #333;
      text-shadow: none; /* Prevent inheritence from `body` */
      background-color: #fff;
      border: 1px solid #fff;
    }

    /*
     * Base structure
     */
    html,
    body {
      height: 100%;
      background-color: #333;
    }

    body {
      color: #fff;
    }

    textarea {
      font-family:Consolas,Monaco,Lucida Console,Liberation Mono,DejaVu Sans Mono,Bitstream Vera Sans Mono,Courier New, monospace;
      resize: none;
    }

    /* Extra markup and styles for table-esque vertical and horizontal centering */
    .site-wrapper {
      display: table;
      width: 100%;
      height: 100%; /* For at least Firefox */
      min-height: 100%;
      -webkit-box-shadow: inset 0 0 100px rgba(0, 0, 0, .5);
      box-shadow: inset 0 0 100px rgba(0, 0, 0, .5);
    }

    .site-wrapper-inner {
      display: table-cell;
      vertical-align: top;
    }

    .cover-container {
      margin-right: auto;
      margin-left: auto;
    }

    /* Padding for spacing */
    .inner {
      padding: 30px;
    }

    /*
     * Cover
     */
    .cover {
      padding: 0 20px;
    }

    .cover .btn-lg {
      padding: 10px 20px;
      font-weight: bold;
    }

    /*
     * Footer
     */

    /*
     * Affix and center
     */
    @media (min-width: 768px) {
      /* Pull out the header and footer */

      /* Start the vertical centering */
      .site-wrapper-inner {
        vertical-align: middle;
      }

      /* Handle the widths */
      .cover-container {
        width: 100%; /* Must be percentage or pixels for horizontal alignment */
      }
    }

    @media (min-width: 992px) {
      .cover-container {
        width: 700px;
      }
    }
  </style>

  <!-- Latest compiled and minified JavaScript -->
  <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
  <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="http://yandex.st/highlightjs/8.0/styles/default.min.css">
  <script src="http://yandex.st/highlightjs/8.0/highlight.min.js"></script>
  <script>hljs.initHighlightingOnLoad('js');</script>
  <script>
    var baseUri = "{{ URL::to('/') }}";
    $(document).ready(function () {
      $("#go").click(function (e) {
        e.stopPropagation();
        e.preventDefault();

        var $form = $("#form");
        var method = $("#method").val();
        var route = $("#route").val();
        var post = $.parseJSON($("#post").val());

        var $methodEl = $("<input>", {
          type: "hidden",
          name: "_method",
          value: method
        });
        $form.append($methodEl);

        if(post) {
          for(var i in post) {
            if(post.hasOwnProperty(i)) {
              var $el = $("<input>", {
                type: "hidden",
                name: i,
                value: post[i]
              });
              $form.append($el);
            }
          }
        }
        var url = baseUri + '/' + route;
        if(method == 'GET') {
          $form.attr('method', method);
        } else {
          $form.attr('method', 'POST');
        }
        $form.attr('action', url);
        $form.submit();
      });
    });
  </script>
</head>
<body>
<div class="site-wrapper">

  <div class="site-wrapper-inner">
    <div class="cover-container">

      <div class="inner cover">
        <h1 class="cover-heading">Warehouse api.</h1>

        <div class="well">
          <form role="form" id="form">
            <input style="margin-bottom: 10px" id="route" type="text" class="form-control" placeholder="Enter route."/>
            <select style="width: 110px; margin-bottom: 10px;" class="form-control" id="method">
              <option value="GET">GET</option>
              <option value="POST">POST</option>
              <option value="PUT">PUT</option>
              <option value="DELETE">DELETE</option
            </select>
            <textarea style="margin-bottom: 10px" rows="3" class="form-control" id="post"></textarea>
            <input id="go" type="submit" class="btn btn-primary" value="Call API"/>
          </form>
        </div>
        @if(isset($json))
        <pre style="overflow-x: scroll; max-height:300px;"><code class="json"><?= stripcslashes(prettyPrint($json)) ?></code></pre>
        @else
        <?php
        $routes = Route::getRoutes()->getRoutes();
        $data = array();
        foreach ($routes as $route) {
          if ($route->getUri() == 'hello' || $route->getUri() == '/') continue;
          $data[] = ['method' => $route->getMethods()[0], 'uri' => $route->getUri()];
        }
        ?>
        <pre style="overflow-x: scroll; max-height:300px;"><code class="js">/* API Routes */
var routes =
<?= stripcslashes(prettyPrint(json_encode($data))) ?></code></pre>
        @endif
      </div>
    </div>
  </div>

</div>
</body>
</html>