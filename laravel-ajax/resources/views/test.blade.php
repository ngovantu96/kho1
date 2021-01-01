<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<body>
<ul>
    <li>vn</li>
    <li>lao</li>
    <li>my</li>
    <li>tq</li>
    <li>tl</li>
</ul>
<input type="submit" value="click" id="iptsubmit">

<select name="" id="ddlskills">
    <option value="">choose laguage</option>
    <option value="c#">C#</option>
    <option value="java">Java</option>
    <option value="php">PHP</option>
    <option value="C++">C++</option>
</select>


    <input type="submit" value="them" id="submit">

<div id="divresult"></div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
</body>
</html>
<script>

    $(document).ready(function(){
       // $('#submit').click(function(){
       //   var selected = $('#ddlskills option:selected');
       //   if(selected.length > 0) {
       //       $('#divresult').html('value : '+ selected.val() + " .text : " + selected.text());
       //   }
       //
       // });

         $('li').css('color','red')
             .slideUp(1000)
             .slideDown(1000)
             .attr('color','blue');

    });
</script>
