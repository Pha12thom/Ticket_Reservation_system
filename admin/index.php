<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Redirecting you...</title>

<link rel="stylesheet" type="text/css" href="static/dist/semantic-ui/semantic.min.css">
<script src="static/dist/jquery/jquery.min.js"> </script>
<script src="static/dist/semantic-ui/semantic.min.js"></script>

<style>
body{
background-color:f1f1f1;
}
</style>
</head>
<body>
    <div class="ui inverted huge borderless fixed fluid menu">
      <a class="header item">TICKET RESERVATION SYSTEM</a>
    </div><br>
<div class="ui text container" style="margin-top:130px">
<div id="err001" class="ui success icon message">
<i class="notched circle loading icon"></i>
<div class="content">
<div class="header">We are redirecting you....</div>
<p>If the page fails to load, you can load <a href="login.html">Manually</a>.</p>
</div>
</div>
</div>


<script>
setTimeout(function(){location.href="login.php"},4000);
</script>
</body>
</html>