<!DOCTYPE html>

<html lang="en">

<head>

    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel 5.5 - multiple images uploading using dropzone js</title>

    <link href="http://demo.expertphp.in/css/dropzone.css" rel="stylesheet">

    <script src="http://demo.expertphp.in/js/dropzone.js"></script>

</head>

<body>



<h3>Laravel 5.5 - multiple images uploading using dropzone js</h3>



{!! Form::open([ 'route' => [ 'dropzone.fileupload' ], 'files' => true, 'class' => 'dropzone','id'=>"image-upload"]) !!}

{!! Form::close() !!}



</body>

<script type="text/javascript">

    Dropzone.options.imageUpload = {

        maxFilesize  : 1,

        acceptedFiles: ".jpeg,.jpg,.png,.gif"

    };

</script>

</html>