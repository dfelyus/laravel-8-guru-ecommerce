<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    <style>
        .pack {
            display: inline-block;
            width: 105px;
            padding-left: 2px;
            overflow: hidden;
            background-color: #FFFFCC;
            color: black;
            vertical-align: top;
            border-radius: 15px;

        }

        .contain {
            margin: 22px;
            right: 15px;
            display: flex;
            flex-wrap: wrap;
            flex-flow: column wrap;
            justify-content: center;
            align-items: center;
        }
    </style>

</head>



<body style="background-color: black;">
    @php
    $categories = $cate_->where('category_status', 1);
    $dishes = $dish_->where('dish_status', 1);
    @endphp
    <div class="" style="background-color: #CCCCCC; color: black; padding-left: 10%; padding-right:10%; display:block; margin-bottom: 40px;">
        <div class="float-right">
            <h2><u>{{$set_->Header_message}}</u></h2>
            <h4 class="mb-0">Phone number : {{$set_->phone_number}} -- Email: contact@bbbootstrap.com</h4>
            <h4 class="mb-0 text-dark mb-1">From : Guru place</h4>
            <p>Phone number : {{$set_->phone_number}} -- 29, Singla Street -- Sikeston,New Delhi 110034</p>
            <hr />
        </div>
    </div>
    <div class="contain" style="font-size: 10px;">
        <div class="center">
            @if($slug == "pack")
            @foreach($packages as $pack)
            <div class="pack">
                <h2 class="text-dark mb-1"><u><b>{{$pack->title}}</b></u></h2>
                <p><b>subtitle </b>: {{$pack->subtitle}}</p>
                <p><b>min_personnes</b> : {{$pack->min_personnes}}</p>
                <p><b>max_personnes</b> : {{$pack->max_personnes}}</p>
                <p><b>full_price</b> : {{$pack->full_price}} $</p>
                <p><b>nb_personnes</b> : {{$pack->nb_personnes}}</p>

                @php
                $qty_current_Pack = $quantities->where('id_package', $pack->id);
                @endphp

                <h4><u>Categories</u></h4>
                @foreach($pack->categories as $packCate)
                <p>
                    @foreach($qty_current_Pack as $qt_cate)
                    @if($packCate->id == $qt_cate->category_id)
                    {{$qt_cate->qty}}
                    @endif
                    @endforeach
                    -
                    <b>{{$packCate->category_name}}</b>
                </p>
                @endforeach

                <h5><u>Food</u></h5>
                @foreach($pack->dishes as $packDish)
                <p>
                    @foreach($qty_current_Pack as $qt_dish)
                    @if($packDish->id == $qt_dish->dish_id)
                    {{$qt_dish->qty}}
                    @endif
                    @endforeach
                    -
                    <b>{{$packDish->dish_name}}</b>
                </p>
                @endforeach
                <hr />
            </div>
            @endforeach


            @elseif($slug == "cate_dish")
            <div style="background-color: #CCFFCC; color: black;font-size: 20px; text-align: center; border-radius: 20px;">
                <h4><u>Categories</u></h4>
                <ul>
                    @foreach($categories as $cate)
                    <li>{{$cate->category_name}}</li>
                    @endforeach
                </ul>
            </div>
            <div>
                @foreach($categories as $cate)
                <div style="font-size: 18px; color: white;">
                    <div>
                        <h4><u>{{$cate->category_name}}</u></h4>
                    </div>
                    <div>
                        <ul>
                            @foreach($dishes as $dish)
                            @if($dish->category_id == $cate->id)
                            <li><b><u>{{$dish->dish_name}}</u></b> | <b>fill_price :</b>
                                <strike>{{$dish->full_price}} $</strike> | <b>half_price:</b> {{$dish->half_price}} $
                            </li>
                            @endif
                            @endforeach
                        </ul>
                    </div>
                    @endforeach
                </div>


            </div>





            @elseif($slug == "tray")
            <table border="1" style="background-color: white; color: black;font-size: 28px;">
                <thead>
                    <tr>
                        <th style="text-align: center;"></th>
                        <th style="text-align: center;">Small</th>
                        <th style="text-align: center;">Medium</th>
                        <th style="text-align: center;">Semi-large</th>
                        <th style="text-align: center;">Large</th>
                        <th style="text-align: center;">Xtra-Large</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($trays as $tray)
                    <tr>
                        <td style="text-align: center;"><b>{{$tray->title}}</b></td>
                        <td style="text-align: center;">{{$tray->small}} $</td>
                        <td style="text-align: center;">{{$tray->medium}} $</td>
                        <td style="text-align: center;">{{$tray->semi_large}} $</td>
                        <td style="text-align: center;">{{$tray->large}} $</td>
                        <td style="text-align: center;">{{$tray->extra_large}} $</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
    <div class="">
        <p class=" mb-0">{{$set_->Header_message}}</p>
    </div>


</body>

</html>