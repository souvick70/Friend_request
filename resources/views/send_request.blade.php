



<html>

<head>

    <style>
        #fb {
            width: 500px;
            border: 1px solid gray;
            border-radius: 5px;
            position: relative;
            height: 175px;
        }

        #fb p {
            font-family: sans-serif;
            margin: 0 0 0 10px;
            line-height: 30px;
        }

        #fb-top span {
            color: #4267B2;
            float: right;
            margin-right: 10px;
        }

        #fb-top {
            background-color: #efefef;
            height: 30px;
            width: 500px;
            border-radius: 5px 5px 0 0;
            position: absolute;
            top: -1px;
            left: -1px;
            border: 1px solid gray;
        }

        #fb img {
            position: absolute;
            left: 10px;
            top: 52.5px;
        }

        #info {
            position: absolute;
            left: 120px;
            top: 75px;
        }

        #info {
            color: #4267B2;
            line-height: 25px;
            font-size: 18px;
        }

        #info span {
            color: #777;
            font-size: 14px;
        }

        #button-block {
            position: absolute;
            right: 10px;
            top: 85px;
        }

        #button-block div {
            display: inline-block;
        }

        #confirm,
        #delete {
            background-color: #4267B2;
            color: white;
            padding: 7px;
            border-radius: 2px;
            margin-right: 10px;
            font-family: sans-serif;
        }

        #delete {
            color: #222;
            background-color: #bbb;
            border: 1px solid #999;
            padding: 6px;
            margin-right: 0;
        }

        #button-block div:hover {
            opacity: .8;
            cursor: pointer;
        }
    </style>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <form action="{{route('store-data1')}}" method="POST">
        @csrf
        <input type="hidden" name="id" value="{{$admin->id}}">
        <div id="fb">
            <div id="fb-top">
                <p><b>Friend Requests</b><span></span></p>
            </div>
           
            <img src="{{asset('upload/add_images/'.$admin->image)}}" height="100" width="100" alt="Image">
            <p id="info"><b>{{$admin->name}}</b>
                 <br> <span>14 mutual friends</p>
            
                <div id="button-block"><br>
                    
                    <input type="submit" class="btn btn-primary" value="Send Request" >
                    
                    <a href="{{route('delete',$admin->id)}}"  class="btn btn-warning " id="f_request">Delete Request</a>
                </div>
        </div>
</body>

</html>
