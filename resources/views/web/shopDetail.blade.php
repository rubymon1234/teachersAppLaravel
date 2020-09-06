@extends('layouts.innermaster')
@section('title', 'Listing')
@section('content')
<div class="pageCenter">
    <div class="marketDtls">
        <h2>Select stall from Market Map</h2>
        <p>Click on our regular stall holders to see more information or see their information below the map</p>

        <div class="marketLocation">
            <h3 class="marketName">The Rocks Market <em class="location">Sydney</em></h3>
            <select class="selectType1">
                <option>Select date of booking</option>
                <option>01/04/2020</option>
                <option>01/06/2020</option>
                <option>01/07/2020</option>
                <option>01/08/2020</option>
            </select>
        </div>

        <div class="mapHolder" style="background-image: url('/assets/images/mapImg.jpg')">
            
        </div>

       <div class="mapCont">
            <ul class="mapInfo">
                <li class="priceInfo"><span>Stalls Available: </span>8</li>
                <li><em style="background: green"></em><span>Available</span></li>
                <li><em style="background: red"></em><span>Sold Out</span></li>
                <li><em style="background: #59d9f8"></em><span>Unavailable</span></li>
            </ul>
            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, 
            when an unknown printer took</p>
            <div class="selectedArea">
                <h4>Selected Stall:  <span> D11</span>  Area:  <span> 24m x 26m</span>  Price:  <span> $124</span></h4>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the </p>
                <a href="javascript:void(0)" class="commonBtnV1 orange">Buy</a>
            </div>
       </div>
   </div>
</div>
@endsection