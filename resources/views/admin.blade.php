<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shramdaan</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">



        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->

     

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">




        <!--<link rel="stylesheet" href="{{ URL::asset('/css/loginpg.css') }}">-->
        <link rel="stylesheet" href="{{ URL::asset('/css/sb-admin-2.min.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/jert.css') }}">
        

    </head>

    <body>
    

    <br><br><br>
    <br><br><br>
    
    <div class="container">
        <div class="row align-items-center xtccent">
                <div class="col-md-6 border border-primary rounded center mx-auto px-2">
                
                    <form action="{{url('/adminLoginSubmit')}}" method="post">
                    @csrf
                    
                    <div class="form-group">
                        <h3 style="text-align: center;">Admin Login</h3>
                    </div>

                    <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" placeholder="Password" id="password" name="password">
                    </div>

                    <div class="form-group">
                        <select name="selroles" id="selroles" class="form-control">
                                
                        </select>
                    </div>
                    
                    <div class="form-group">
                    <button type="submit" class="form-control btn btn-primary mx-auto">Submit</button>
                    </div>
                    
                    </form>
                </div>  
        </div>
    </div>




<script>

                $.ajax({
                url: '/fetchAdminRoles',
                type: 'get',
                success: function(response){

                    var len = 0;
                    if(response['data'] != null){
                        len = response['data'].length;
                    }

                    if(len > 0){
                        // Read data and create <option >
                        var defaulto="<option>Select Roles</option>";
                        $("#selroles").append(defaulto);
                        for(var i=0; i<len; i++){

                        var id = response['data'][i].roleId;
                        var name = response['data'][i].roleName;
                       
                        var option = "<option value='"+id+"'>"+name+"</option>";
                        
                        $("#selroles").append(option); 
                        }
                    }

                }
                });

</script>



    </body>
</html>