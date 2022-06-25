@section('head')


<link href="{{asset('/')}}assets/vendor/venobox/venobox.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/remixicon/remixicon.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
<link href="{{asset('/')}}assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<!-- Vendor CSS Files -->

@endsection


@extends('FrontEnd.master')
@section('title')
Catering
@endsection


@section('bg-img',asset('assets/img/bg/bg8.jpg'))

@section('heading','Catering')

@section('sub-heading1','Learn Together and Grow Together.')
@section('sub-heading2','The Best Chef For You.')
@section('sub-heading3','Welcome.')




@php
$categories = $cate_->where('category_status', 1);
$dishes = $dish_->where('dish_status', 1);
@endphp


@php
$del_cock = $wedding->where('tab', 'deluxe')->where('select','=','cocktails');
$del_ext = $wedding->where('tab', 'deluxe')->where('select','=','extra');
$del_dess = $wedding->where('tab', 'deluxe')->where('select','=','dessert');
$del_buff = $wedding->where('tab', 'deluxe')->where('select','=','buffets');

$gold_cock = $wedding->where('tab', 'gold')->where('select','=','cocktails');
$gold_ext = $wedding->where('tab', 'gold')->where('select','=','extra');
$gold_dess = $wedding->where('tab', 'gold')->where('select','=','dessert');
$gold_buff = $wedding->where('tab', 'gold')->where('select','=','buffets');

$sta_cock = $wedding->where('tab', 'standards')->where('select','=','cocktails');
$sta_ext = $wedding->where('tab', 'standards')->where('select','=','extra');
$sta_dess = $wedding->where('tab', 'standards')->where('select','=','dessert');
$sta_buff = $wedding->where('tab', 'standards')->where('select','=','buffets');

$opt_per = $wedding->where('tab', 'optional')->where('select','=','per_peop');
$opt_choi = $wedding->where('tab', 'optional')->where('select','=','choice_ofs');

@endphp




@section('content')






<!-- ======= Buy Ticket Section ======= -->
<section id="buy-tickets" class="section-with-bg">
    <div class="container" data-aos="fade-up">

        <div class="section-header">
            <h2>Buy Tickets</h2>
            <p>Velit consequatur consequatur inventore iste fugit unde omnis eum aut.</p>
        </div>

        <div class="row">






            @foreach($packages as $pack)
            <div class="col-lg-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card mb-5 mb-lg-0">
                    <div class="card-body">
                        <div class="container-fluid">
                            <div class="card bg-danger">
                                <h3 style="color: white;" class="card-title text-uppercase text-center"><u>{{$pack->title}}</u></h3>
                                <hr>
                            </div>
                        </div>

                        <ul class="fa-ul">
                            <li><span class="fa-li"><i class="fa fa-check"></i></span><b>subtitle </b>: {{$pack->subtitle}}</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span><b>min_personnes</b> : {{$pack->min_personnes}}</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span><b>max_personnes</b> : {{$pack->max_personnes}}</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span><b>nb_personnes</b> : {{$pack->nb_personnes}}</li>
                            <li><span class="fa-li"><i class="fa fa-check"></i></span><b>max_personnes</b> : {{$pack->max_personnes}}</li>

                            @php
                            $qty_current_Pack = $quantities->where('id_package', $pack->id);
                            @endphp

                            <h2><b><u>Categories</u></b></h2>

                            @foreach($pack->categories as $packCate)

                            <li><span class="fa-li"><i class="fa fa-check"></i></span>
                                @foreach($qty_current_Pack as $qt_cate)
                                @if($packCate->id == $qt_cate->category_id)
                                {{$qt_cate->qty}}
                                @endif
                                @endforeach
                                -
                                <b>{{$packCate->category_name}}</b>
                            </li>
                            @endforeach

                            <h2><b><u>Food</u></b></h2>

                            @foreach($pack->dishes as $packDish)

                            <li><span class="fa-li"><i class="fa fa-check"></i></span>
                                @foreach($qty_current_Pack as $qt_dish)
                                @if($packDish->id == $qt_dish->dish_id)
                                {{$qt_dish->qty}}
                                @endif
                                @endforeach
                                -
                                <b>{{$packDish->dish_name}}</b>
                            </li>
                            @endforeach
                            <li><span class="fa-li"><i class="fa fa-check"></i></span>Custom</li>
                        </ul>
                        <hr>
                        <div class="text-center">
                            <button type="button" class="btn" data-toggle="modal" data-target="#buy-ticket-modal" data-ticket-type="standard-access">{{$pack->full_price}} $ par personne</button>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>

    <!-- Modal Order Form -->
    <div id="buy-ticket-modal" class="modal fade">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Buy Tickets</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="#">
                        <div class="form-group">
                            <input type="text" class="form-control" name="your-name" placeholder="Your Name">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="your-email" placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <select id="ticket-type" name="ticket-type" class="form-control">
                                <option value="">-- Select Your Ticket Type --</option>
                                <option value="standard-access">Standard Access</option>
                                <option value="pro-access">Pro Access</option>
                                <option value="premium-access">Premium Access</option>
                            </select>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn">Buy Now</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</section><!-- End Buy Ticket Section -->





@php($A1=0)
@php($A2=0)
@php($A3=0)
@php($A4=0)


<script>
    //col 1
    var Tdel_cockA = new Array(); //title
    var Tdel_cockB = new Array(); //subtitle
    var Tdel_cockC = new Array(); //desc
    //col 2
    var Tdel_buffA = new Array(); //title
    var Tdel_buffB = new Array(); //subtitle
    //col 3
    var Tdel_dessA = new Array(); //title
    var Tdel_dessB = new Array();
    //col 4
    var Tdel_extA = new Array();
</script>

@foreach($del_cock as $del_cocks)
<script>
    $(document).ready(function() {
        Tdel_cockA[parseInt("{{$A1}}")] = "{{$del_cocks->title}}";
        Tdel_cockB[parseInt("{{$A1}}")] = "{{$del_cocks->subtitle}}";
        Tdel_cockC[parseInt("{{$A1}}")] = "{{$del_cocks->description}}";
    });
</script>
@php($A1++)
@endforeach

@foreach($del_ext as $del_exts)
<script>
    $(document).ready(function() {
        Tdel_extA[parseInt("{{$A2}}")] = "{{$del_exts->title}}";
    });
</script>
@php($A2++)
@endforeach

@foreach($del_dess as $del_desss)
<script>
    $(document).ready(function() {
        Tdel_dessA[parseInt("{{$A3}}")] = "{{$del_desss->title}}";
        Tdel_dessB[parseInt("{{$A3}}")] = "{{$del_desss->subtitle}}";
    });
</script>
@php($A3++)
@endforeach

@foreach($del_buff as $del_buffs)
<script>
    $(document).ready(function() {
        Tdel_buffA[parseInt("{{$A4}}")] = "{{$del_buffs->title}}";
        Tdel_buffB[parseInt("{{$A4}}")] = "{{$del_buffs->subtitle}}";
    });
</script>
@php($A4++)
@endforeach

@foreach($del_dess as $del_desss)
<script>
    $(document).ready(function() {
        Tdel_dessA[parseInt("{{$A3}}")] = "{{$del_desss->title}}";
        Tdel_dessB[parseInt("{{$A3}}")] = "{{$del_desss->subtitle}}";
    });
</script>
@php($A3++)
@endforeach

@foreach($del_buff as $del_buffs)
<script>
    $(document).ready(function() {
        Tdel_buffA[parseInt("{{$A4}}")] = "{{$del_buffs->title}}";
        Tdel_buffB[parseInt("{{$A4}}")] = "{{$del_buffs->subtitle}}";
    });
</script>
@php($A4++)
@endforeach


@php($B1=0)
@php($B2=0)
@php($B3=0)
@php($B4=0)


<script>
    //col 1
    var Tsta_cockA = new Array(); //title
    var Tsta_cockB = new Array(); //subtitle
    var Tsta_cockC = new Array(); //desc
    //col 2
    var Tsta_buffA = new Array(); //title
    var Tsta_buffB = new Array(); //subtitle
    //col 3
    var Tsta_dessA = new Array(); //title
    var Tsta_dessB = new Array();
    //col 4
    var Tsta_extA = new Array();
</script>

@foreach($sta_cock as $sta_cocks)
<script>
    $(document).ready(function() {
        Tsta_cockA[parseInt("{{$B1}}")] = "{{$sta_cocks->title}}";
        Tsta_cockB[parseInt("{{$B1}}")] = "{{$sta_cocks->subtitle}}";
        Tsta_cockC[parseInt("{{$B1}}")] = "{{$sta_cocks->description}}";
    });
</script>
@php($B1++)
@endforeach

@foreach($sta_ext as $sta_exts)
<script>
    $(document).ready(function() {
        Tsta_extA[parseInt("{{$B2}}")] = "{{$sta_exts->title}}";
    });
</script>
@php($B2++)
@endforeach

@foreach($sta_dess as $sta_desss)
<script>
    $(document).ready(function() {
        Tsta_dessA[parseInt("{{$B3}}")] = "{{$sta_desss->title}}";
        Tsta_dessB[parseInt("{{$B3}}")] = "{{$sta_desss->subtitle}}";
    });
</script>
@php($B3++)
@endforeach

@foreach($sta_buff as $sta_buffs)
<script>
    $(document).ready(function() {
        Tsta_buffA[parseInt("{{$B4}}")] = "{{$sta_buffs->title}}";
        Tsta_buffB[parseInt("{{$B4}}")] = "{{$sta_buffs->subtitle}}";
    });
</script>
@php($B4++)
@endforeach

@foreach($sta_dess as $sta_desss)
<script>
    $(document).ready(function() {
        Tsta_dessA[parseInt("{{$B3}}")] = "{{$sta_desss->title}}";
        Tsta_dessB[parseInt("{{$B3}}")] = "{{$sta_desss->subtitle}}";
    });
</script>
@php($B3++)
@endforeach

@foreach($sta_buff as $sta_buffs)
<script>
    $(document).ready(function() {
        Tsta_buffA[parseInt("{{$B4}}")] = "{{$sta_buffs->title}}";
        Tsta_buffB[parseInt("{{$B4}}")] = "{{$sta_buffs->subtitle}}";
    });
</script>
@php($B4++)
@endforeach




@php($C1=0)
@php($C2=0)
@php($C3=0)
@php($C4=0)


<script>
    //col 1
    var Tgold_cockA = new Array(); //title
    var Tgold_cockB = new Array(); //subtitle
    var Tgold_cockC = new Array(); //desc
    //col 2
    var Tgold_buffA = new Array(); //title
    var Tgold_buffB = new Array(); //subtitle
    //col 3
    var Tgold_dessA = new Array(); //title
    var Tgold_dessB = new Array();
    //col 4
    var Tgold_extA = new Array();
</script>

@foreach($gold_cock as $gold_cocks)
<script>
    $(document).ready(function() {
        Tgold_cockA[parseInt("{{$C1}}")] = "{{$gold_cocks->title}}";
        Tgold_cockB[parseInt("{{$C1}}")] = "{{$gold_cocks->subtitle}}";
        Tgold_cockC[parseInt("{{$C1}}")] = "{{$gold_cocks->description}}";
    });
</script>
@php($C1++)
@endforeach

@foreach($gold_ext as $gold_exts)
<script>
    $(document).ready(function() {
        Tgold_extA[parseInt("{{$C2}}")] = "{{$gold_exts->title}}";
    });
</script>
@php($C2++)
@endforeach

@foreach($gold_dess as $gold_desss)
<script>
    $(document).ready(function() {
        Tgold_dessA[parseInt("{{$C3}}")] = "{{$gold_desss->title}}";
        Tgold_dessB[parseInt("{{$C3}}")] = "{{$gold_desss->subtitle}}";
    });
</script>
@php($C3++)
@endforeach

@foreach($gold_buff as $gold_buffs)
<script>
    $(document).ready(function() {
        Tgold_buffA[parseInt("{{$C4}}")] = "{{$gold_buffs->title}}";
        Tgold_buffB[parseInt("{{$C4}}")] = "{{$gold_buffs->subtitle}}";
    });
</script>
@php($C4++)
@endforeach

@foreach($gold_dess as $gold_desss)
<script>
    $(document).ready(function() {
        Tgold_dessA[parseInt("{{$C3}}")] = "{{$gold_desss->title}}";
        Tgold_dessB[parseInt("{{$C3}}")] = "{{$gold_desss->subtitle}}";
    });
</script>
@php($C3++)
@endforeach

@foreach($gold_buff as $gold_buffs)
<script>
    $(document).ready(function() {
        Tgold_buffA[parseInt("{{$C4}}")] = "{{$gold_buffs->title}}";
        Tgold_buffB[parseInt("{{$C4}}")] = "{{$gold_buffs->subtitle}}";
    });
</script>
@php($C4++)
@endforeach
















@php($D1=0)
@php($D2=0)

<script>
    //col 1
    var Topt_perA = new Array(); //title
    var Topt_perB = new Array(); //subtitle
    var Topt_perC = new Array(); //desc
    var Topt_perD = new Array(); //price
    //col 2
    var Topt_choiA = new Array(); //title
</script>

@foreach($opt_per as $opt_pers)
<script>
    $(document).ready(function() {
        Topt_perA[parseInt("{{$D1}}")] = "{{$opt_pers->title}}";
        Topt_perB[parseInt("{{$D1}}")] = "{{$opt_pers->subtitle}}";
        Topt_perC[parseInt("{{$D1}}")] = "{{$opt_pers->description}}";
        Topt_perD[parseInt("{{$D1}}")] = "{{$opt_pers->price}}";
    });
</script>
@php($D1++)
@endforeach

@foreach($opt_choi as $opt_chois)
<script>
    $(document).ready(function() {
        Topt_choiA[parseInt("{{$D2}}")] = "{{$opt_chois->title}}";
    });
</script>
@php($D2++)
@endforeach







<div class="container mt-2">
    <div class="mb-2 d-flex justify-content-center" style="font-size: 25px;color: white;">
        <h2>All items to be selected in our bank menu</h2>
    </div>
    <div class="row">
        <div class="col-sm-4">
            <div class="card" style="background-color: black; color: white;font-size: 18px;">
                <div class="sidebar-row faq">
                    <ol>
                        <ul id="standard_wedding"><u><b>STANDARD WEDDING</b></u></ul>
                        <ul id="deluxe_wedding"><u><b>DELUXE WEDDING</b></u></ul>
                        <ul id="gold_packages"><u><b>GOLD PACKAGES</b></u></ul>
                        <ul id="optionals_items"><u><b>OPTIONALS ITEMS</b></u></ul>
                    </ol>
                </div>
            </div>
        </div>


        @php($x=0)
        @php($y=0)
        <script>
            var AarrayX = new Array();
            var BarrayX = new Array();
            var CarrayX = new Array();
            var DarrayX = new Array();

            var AarrayY = new Array();
            var BarrayY = new Array();
            var CarrayY = new Array();
            var DarrayY = new Array();
        </script>
        @foreach($cate_ as $cat)

        <script>
            $(document).ready(function() {
                AarrayX[parseInt("{{$x}}")] = "{{$cat->id}}";
                BarrayX[parseInt("{{$x}}")] = "{{$cat->order_number}}";
                CarrayX[parseInt("{{$x}}")] = "{{$cat->category_status}}";
                DarrayX[parseInt("{{$x}}")] = "{{$cat->category_name}}";
            });
        </script>

        @php($x++)
        @endforeach


        @foreach($dish_ as $dish)

        <script>
            $(document).ready(function() {

                BarrayY[parseInt("{{$y}}")] = "{{$dish->dish_name}}";
                CarrayY[parseInt("{{$y}}")] = "{{$dish->dish_detail}}";

            });
        </script>

        @php($y++)
        @endforeach


        <div class="col-sm-8" style="color: black;">
            <table class="table table-dark" style="background-color: #FFFF99;font-size: 18px;">
                <thead>
                    <tr>
                        <th scope="col" id="head1">
                        </th>
                        <th scope="col" id="head2">
                        </th>
                        <th scope="col" id="head3">
                        </th>
                        <th scope="col" id="head4">
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @for($i = 0; $i < $y; $i++) <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                        </tr>
                        @endfor
                </tbody>
            </table>
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {

        var taille = 0;
        if (parseInt("{{$y}}") > parseInt("{{$x}}")) {
            taille = parseInt("{{$y}}");
        } else {
            taille = parseInt("{{$x}}");
        }

        var myArray = new Array();



        $('#standard_wedding').on('click', function() {
            $('#optionals_items').css('color', 'white');
            $('#gold_packages').css('color', 'white');
            $('#deluxe_wedding').css('color', 'white');
            $('#standard_wedding').css('color', 'red');

            myArray = ['COCKTAILS HOUR', 'THE WEDDING BUFFET DINNER', 'DESSERTS', 'EXTRAS'];
            $('#head1').html(myArray[0]);
            $('#head2').html(myArray[1]);
            $('#head3').html(myArray[2]);
            $('#head4').html(myArray[3]);


            var aa1 = 0;
            var aa2 = 1;
            var aa3 = 2;
            var aa4 = 3;

            for (var i = 0; i <= parseInt("{{$B1}}"); i++) {

                $('td:eq(' + aa1 + ')').html(Tsta_cockA[i] + '<br/>' + Tsta_cockB[i] + '<br/>' + Tsta_cockC[i]);
                $('td:eq(' + aa1 + ')').show();

                $('td:eq(' + aa2 + ')').html(Tsta_buffA[i] + '<br/>' + Tsta_buffB[i]);
                $('td:eq(' + aa2 + ')').show();

                $('td:eq(' + aa3 + ')').html(Tsta_dessA[i] + '<br/>' + Tsta_dessB[i]);
                $('td:eq(' + aa3 + ')').show();

                $('td:eq(' + aa4 + ')').html(Tsta_extA[i]);
                $('td:eq(' + aa4 + ')').show();

                aa1 = aa1 + 4;
                aa2 = aa2 + 4;
                aa3 = aa3 + 4;
                aa4 = aa4 + 4;
            }

            $('td:gt(' + parseInt("{{$B1}}") * 4 + ')').hide();




        });
        $('#deluxe_wedding').on('click', function() {
            $('#optionals_items').css('color', 'white');
            $('#gold_packages').css('color', 'white');
            $('#deluxe_wedding').css('color', 'red');
            $('#standard_wedding').css('color', 'white');

            myArray = ['COCKTAILS HOUR', 'THE WEDDING BUFFET DINNER', 'DESSERTS', 'EXTRAS'];
            $('#head1').html(myArray[0]);
            $('#head2').html(myArray[1]);
            $('#head3').html(myArray[2]);
            $('#head4').html(myArray[3]);

            var bb1 = 0;
            var bb2 = 1;
            var bb3 = 2;
            var bb4 = 3;

            for (var i = 0; i <= parseInt("{{$A1}}"); i++) {

                $('td:eq(' + bb1 + ')').html(Tdel_cockA[i] + '<br/>' + Tdel_cockB[i] + '<br/>' + Tdel_cockC[i]);
                $('td:eq(' + bb1 + ')').show();

                $('td:eq(' + bb2 + ')').html(Tdel_buffA[i] + '<br/>' + Tdel_buffB[i]);
                $('td:eq(' + bb2 + ')').show();

                $('td:eq(' + bb3 + ')').html(Tdel_dessA[i] + '<br/>' + Tdel_dessB[i]);
                $('td:eq(' + bb3 + ')').show();

                $('td:eq(' + bb4 + ')').html(Tdel_extA[i]);
                $('td:eq(' + bb4 + ')').show();

                bb1 = bb1 + 4;
                bb2 = bb2 + 4;
                bb3 = bb3 + 4;
                bb4 = bb4 + 4;
            }

            $('td:gt(' + parseInt("{{$A1}}") * 4 + ')').hide();


        });
        $('#gold_packages').on('click', function() {
            $('#optionals_items').css('color', 'white');
            $('#gold_packages').css('color', 'red');
            $('#deluxe_wedding').css('color', 'white');
            $('#standard_wedding').css('color', 'white');

            myArray = ['COCKTAILS HOUR', 'THE WEDDING BUFFET DINNER', 'DESSERTS', 'EXTRAS'];
            $('#head1').html(myArray[0]);
            $('#head2').html(myArray[1]);
            $('#head3').html(myArray[2]);
            $('#head4').html(myArray[3]);

            var cc1 = 0;
            var cc2 = 1;
            var cc3 = 2;
            var cc4 = 3;

            for (var i = 0; i <= parseInt("{{$C3}}"); i++) {

                $('td:eq(' + cc1 + ')').html(Tgold_cockA[i] + '<br/>' + Tgold_cockB[i] + '<br/>' + Tgold_cockC[i]);
                $('td:eq(' + cc1 + ')').show();

                $('td:eq(' + cc2 + ')').html(Tgold_buffA[i] + '<br/>' + Tgold_buffB[i]);
                $('td:eq(' + cc2 + ')').show();

                $('td:eq(' + cc3 + ')').html(Tgold_dessA[i] + '<br/>' + Tgold_dessB[i]);
                $('td:eq(' + cc3 + ')').show();

                $('td:eq(' + cc4 + ')').html(Tgold_extA[i]);
                $('td:eq(' + cc4 + ')').show();

                cc1 = cc1 + 4;
                cc2 = cc2 + 4;
                cc3 = cc3 + 4;
                cc4 = cc4 + 4;
            }

            $('td:gt(' + parseInt("{{$C3}}") * 4 + ')').hide();

        });
        $('#optionals_items').on('click', function() {
            $('#optionals_items').css('color', 'red');
            $('#gold_packages').css('color', 'white');
            $('#deluxe_wedding').css('color', 'white');
            $('#standard_wedding').css('color', 'white');

            myArray = ['PER PERSON', 'CHOICE OF STANDARD LIVE ACTION STATION'];
            $('#head1').html(myArray[0]);
            $('#head2').html(myArray[1]);
            $('#head3').html('');
            $('#head4').html('');

            var dd1 = 0;
            var dd2 = 1;
            var dd3 = 2;
            var dd4 = 3;

            for (var i = 0; i <= parseInt("{{$D1}}"); i++) {

                $('td:eq(' + dd1 + ')').html(Topt_perA[i] + '<br/>' + Topt_perB[i] + '<br/>' + Topt_perC[i] + '<br/>' + Topt_perD[i] + '<br/>');
                $('td:eq(' + dd1 + ')').show();

                $('td:eq(' + dd2 + ')').html(Topt_choiA[i]);
                $('td:eq(' + dd2 + ')').show();

                $('td:eq(' + dd3 + ')').html('');
                $('td:eq(' + dd3 + ')').show();

                $('td:eq(' + dd4 + ')').html('');
                $('td:eq(' + dd4 + ')').show();

                dd1 = dd1 + 4;
                dd2 = dd2 + 4;
                dd3 = dd3 + 4;
                dd4 = dd4 + 4;
            }

            $('td:gt(' + parseInt("{{$D1}}") * 4 + ')').hide();

        });


        $("#formPAYl").submit(function(e) {

            e.preventDefault();
            return true;

        });

    });
</script>







<section id="faq">
    <div class="container">

        <div class="section-header">
            <h3 class="section-title" style="color: white;"><u style="font-size: 22px;">Categories</u>-Dishes</h3>
            <span class="section-divider"></span>
            <p class="section-description">See all categories and dishes ...</p>

        </div>
        @php($val = 0)
        <ul id="faq-list" class="wow fadeInUp">
            @foreach($cate_ as $cate)
            <li class="">
                <a data-toggle="collapse" style="background-color: #FFFF99;" class="collapsed" href="#faq{{$val}}">{{$cate->category_name}} <i class="ion-android-remove"></i></a>
                <div id="faq{{$val}}" class="collapse" data-parent="#faq-list">
                    <div class="container">
                        <div class="row">

                            @foreach($dish_ as $dish)
                            @if($dish->category_id == $cate->id)
                            <div class="col-sm">
                                <div class="alert alert-secondary" style=" font-size: 15px; background-color: black;" role="alert">
                                    <a href="{{route('search.offers',$dish->dish_name)}}">{{$dish->dish_name}}</a>
                                </div>

                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </li>
            @php($val ++)
            @endforeach


        </ul>

    </div>
</section><!-- End Frequently Asked Questions Section -->

<div class="container" style="font-size: 18px;">
    <table class="table table-sm">
        <thead style="background-color: #FFFF99;">
            <tr>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center">Small</th>
                <th scope="col" class="text-center">Medium</th>
                <th scope="col" class="text-center">Semi-large</th>
                <th scope="col" class="text-center">Large</th>
                <th scope="col" class="text-center">Xtra-Large</th>
            </tr>
        </thead>
        <tbody>
            @foreach($trays as $tray)
            <tr style="font-size: 22px;">
                <td scope="row"><b>{{$tray->title}}</b></td>
                <td class="text-center">{{$tray->small}} $</td>
                <td class="text-center">{{$tray->medium}} $</td>
                <td class="text-center">{{$tray->semi_large}} $</td>
                <td class="text-center">{{$tray->large}} $</td>
                <td class="text-center">{{$tray->extra_large}} $</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection


@section('foot')
<script src="{{asset('/')}}assets/vendor/jquery.easing/jquery.easing.min.js"></script>
<script src="{{asset('/')}}assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
<script src="{{asset('/')}}assets/vendor/venobox/venobox.min.js"></script>
<script src="{{asset('/')}}assets/vendor/owl.carousel/owl.carousel.min.js"></script>
<script src="{{asset('/')}}assets/vendor/aos/aos.js"></script>
<script src="{{asset('/')}}assets/js/main.js"></script>



@endsection