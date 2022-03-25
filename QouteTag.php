<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="row">
            <h6 class="white-text pl-2">Quote #tag</h6>
        </div>
        <hr class="my-1" />
        
         <div class="row register-main-app">
                
                   <input type="text"  name="tagName" id="tagName" class="" placeholder="Tag Name" />
                   <input type="text" name="tagDes" id="tagDes" class="" placeholder="Tag Description" />
                   <button class="btn btn-dark btn-sm"  onclick="save_tag()" >Save Tag</button>
         </div>
        <p class="alert alert-success text-center" id="alert"></p>
        
        
        <script type="text/javascript" src="js/publish.js"></script>
    </body>
</html>
