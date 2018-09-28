<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!DOCTYPE html>
<html>
<head>

    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/css/materialize.min.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.8/js/materialize.min.js"></script>

</head>
<body>
<div class="nav">

</div>
<div class="profile">

    <div class="cover-img">
        <img id="cover-img" src="https://cdn2.xyztimes.com/wp-content/uploads/2015/05/Material-Wallpaper-11.1-696x407.png" width="100%" height="150px" >
    </div>
    <div class="profile-meta z-depth-3">
        <div class="profile-img">
            <img id="profile-img" src="http://orig02.deviantart.net/e65e/f/2016/145/0/f/profile_picture_by_the_spooky_man-da3t6n4.png" height="100px" width="100px">
        </div>

        <div class="profile-name">
            <p class="profile-name">Profile Name</p>
        </div>
        <div class="profile-id">
            <p class="profile-id">Profile ID</p>
        </div>
        <div class="profile-desc">
            <p class="profile-desc">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec in sollicitudin lectus, et gravida mauris. </p>
        </div>
        <ul class="profile-stats">
            <a><li><span>1m</span>Followers</li></a>
            <a><li><span>100</span>Following</li></a>
            <a><li><span>758</span>Posts</li></a>
            <a><li><span>84</span>Helpful</li></a>
        </ul>

        <div class="profile-btn"><a class="waves-effect waves-light btn center-btn purple">Follow</a></div>
    </div>
</div>
<br>

<div class="row">
    <div class="col s12">
        <ul class="tabs">
            <li class="tab col s3"><a href="#test1">Test 1</a></li>
            <li class="tab col s3"><a class="active" href="#test2">Test 2</a></li>

            <li class="tab col s3"><a href="#test4">Test 4</a></li>
        </ul>
    </div>
    <div id="test1" class="col s12">Test 1</div>
    <div id="test2" class="col s12">Test 2</div>

    <div id="test4" class="col s12">Test 4</div>
</div>



</body>
</html>

<script>
    $(document).ready(function(){
        $('ul.tabs').tabs();
    });

</script>


