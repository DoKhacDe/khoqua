<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todo App</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>
        .top-left{
            float:left;
            padding-left: 30px;
        }
        .top-right{
            text-align: right;
            padding-right: 30px;
            padding-top: 10px;
        }
        .top{
            width: 100%;
            height: 70px;
            background: #aaffff;
        }
        li{
            list-style-type: none;
        }
        li a{
            text-decoration: none;
        }
        .content {
            width: 100%;
            height: auto;
        }
        .content .menu-left{
            width: 20%;
            float: left;
        }
        .content .menu-left ul li a{
            text-align: center;
        }
        .content-right{
            text-align: center;
            float: left;
            width: 100%;
            height: auto;
            background: #e0fcee;
        }
        .content-right h4 {
            padding-top: 13px;
        }
        .content-right a{
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container-fluied">
        <div class="row">
            <div class="top">
                <div class="top-left">
                    <h2>Todo App</h2>
                    
                </div>
                <div class="top-right">
                    <span>{{ $LoggedUserInfo['name'] }}</span>
                    <a href="{{ route('auth.logout') }}">Logout</a>
                </div>
            </div>         
        </div> 
    </div>
    <div class="container-fluied">
        <div class="content">
            <div class="menu-left">         
                
            </div>
            <div class="content-right">
                <h4>Daily work </h4>
                <a href="/admin/create">Add new</a><br>
                @if(session()->has('success'))
                <div class="alert alert-danger">
                    {{session()->get('success')}}
                </div>
                @endif
                @if(session()->has('fail'))
                <div class="alert alert-success">
                    {{session()->get('fail')}}
                </div>
                @endif
            <table class="table table-hover">
                <tr style="background: #99FFCC;">
                    <td>Title</td>
                    <td>Status</td>
                    <td>Edit</td>
                    <td>Delete</td>
                </tr>
                @foreach ( $req as $res )
                <tr>
                    <td>
                    @if($res->completed)
                    <span style="text-decoration:line-through">{{ $res->title }}</span></td>
                    @else
                    {{ $res->title }}
                    @endif
                    </td>
                    <td><a href="{{ asset('/' . $res->id). '/admin/completed'}}">Completed</a></td>
                    <td><a href="{{ asset('/' . $res->id). '/admin/edit'}}">Edit</a></td>
                    <td><a href="{{ asset('/' . $res->id). '/admin/delete'}}">Delete</a></td>

                </tr>
                @endforeach
            </table>
          
           
           
            </div>
        </div>
    </div>
    
    </div>
</body>
</html>