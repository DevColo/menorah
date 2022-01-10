@extends('default')

@section('content1')
   
<style type="text/css">
    .container-inner{
        width: 100%;
        height: auto;
        align-content: center;
        vertical-align: auto;
        alignment-baseline: central;
        align-items: center;
    }
    .container-content{
display: inline-grid;
width: 220px;
height: 200px;
background: #f7f7f7;
position: relative;
left: 0;
right: 0;
top: 0;
bottom: 0;
margin: auto;

    }
    img{
max-width: 102%;
height: auto;
display: block;
padding: 75px;
margin-top: -54px;
     position: absolute;
    }
    h6{
    position: absolute;
top: 114px;
bottom: 0;
left: 23px;
right: 0;
font-weight: 700;
font-size: 13px;
color: #b91c99;
    }
    p{position: absolute;
top: 123px;
bottom: 0;
left: 8px;
right: 0px;
font-size: 10px;
color: #686b71;
    }
    a .container-content{
        color: #000;
    }
    a .container-content:hover{
        opacity: .5;
    }
    @media(max-width: 930px){
        .container-content {
    display: inline-grid;
    width: 218px;
    height: 200px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 12px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}

     @media(max-width: 920px){
      .container-content {
    display: inline-grid;
    width: 209px;
    height: 193px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 12px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    }
     @media(max-width: 885px){
      .container-content {
    display: inline-grid;
width: 208px;
height: 193px;
background: #f7f7f7;
position: relative;
margin-right: auto;
margin-left: auto;
margin-top: 6px;
left: 0;
right: 0;
top: 0;
bottom: 0;
    }
    h6 {
    position: absolute;
    top: 114px;
    bottom: 0;
    left: 23px;
    right: 0;
    font-weight: 700;
    font-size: 11px;
    color: #b91c99;
}
}
@media(max-width: 874px){
   .container-content {
    display: inline-grid;
    width: 201px;
    height: 183px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 6px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
    }
    @media(max-width: 847px){
   .container-content {
    display: inline-grid;
    width: 193px;
    height: 183px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 6px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
    }
    @media(max-width: 815px){
   .container-content {
    display: inline-grid;
    width: 186px;
    height: 177px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 6px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
    p {
    position: absolute;
    top: 110px;
    bottom: 0;
    left: 8px;
    right: 0px;
    font-size: 10px;
    color: #686b71;
}
    h6 {
    position: absolute;
    top: 104px;
    bottom: 0;
    left: 13px;
    right: 0;
    font-weight: 700;
    font-size: 11px;
    color: #b91c99;
}
    }
        @media(max-width: 786px){
 .container-content {
    display: inline-grid;
    width: 179px;
    height: 177px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 6px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
 p {
    position: absolute;
    top: 95px;
    bottom: 0;
    left: 8px;
    right: 0px;
    font-size: 10px;
    color: #686b71;
}
    h6 {
    position: absolute;
    top: 89px;
    bottom: 0;
    left: 11px;
    right: 0;
    font-weight: 700;
    font-size: 11px;
    color: #b91c99;
}
.container-content>p{
     position: absolute;
    top: 120px;
    bottom: 0;
    left: 8px;
    right: 0px;
    font-size: 15px;
    color: #686b71;

    }
           @media(max-width: 742px){
}
.container-content {
    display: inline-grid;
    width: 168px;
    height: 167px;
    background: #f7f7f7;
    position: relative;
    margin-right: auto;
    margin-left: auto;
    margin-top: 6px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
}
}
    @media(max-width: 360px){
        .container-content {
    display: block;
    width: 218px;
    height: 200px;
    background: #f7f7f7;
    position: relative;
   margin:0 auto;
   margin-top: 5px;
}
.container-content>p{
     position: absolute;
    top: 120px;
    bottom: 0;
    left: 8px;
    right: 0px;
    font-size: 10px;
    color: #686b71;
    padding:10px 10px 10px 10px;

    }
    .container-content>h6 {
  position: absolute;
    top: 114px;
    bottom: 0;
    right: 0;
    font-weight: 700;
    font-size: 10px;
    color: #b91c99;
    padding: 5px;
    letter-spacing: 2px;
}
}

p {
    position: absolute;
    top: 88px;
    bottom: 0;
    left: 8px;
    right: 0px;
    font-size: 10px;
    color: #686b71;
}
h6 {
    position: absolute;
    top: 86px;
    bottom: 0;
    left: 11px;
    right: 0;
    font-weight: 700;
    font-size: 10px;
    color: #b91c99;
}
    img {
    max-width: 109%;
    height: auto;
    display: block;
    padding: 75px;
    margin-top: -54px;
    position: absolute;
}
    }
    @media(max-width: 712px){
        .container-content{
            left:51px;
        }
    }
    @media(max-width: 630px){
        .container-content{
            left:40px;
        }
    }
    @media(max-width: 616px){
        .container-content{
            left:28px;
        }
    }
     @media(max-width: 588px){
        .container-content{
            left:13px;
        }
    }
    @media(width:375px){
        .container-content{
            left:0px;
        }
    }
    @media(max-width: 555px){
        .container-content{
            left:2px;
        }
    }
    @media(max-width: 537px){
        .container-content{
            left:76px;
        }
    }
    @media(max-width: 500px){
        .container-content{
            left:56px;
        }
    }
    @media(max-width: 455px){
        .container-content{
            left:42px;
        }
    }
    @media(max-width: 428px){
        .container-content{
            left:23px;
        }
    }
    @media(max-width: 404px){
        .container-content{
            left:12px;
        }
    }
    @media(max-width:390px){
        .container-content{
            left:7px;
        }
    }
    /*@media(max-width: 378px){
        .container-content{
            left:2px;
        }
    }
    @media(max-width: 369px){
        .container-content{
            left:75px;
        }
    }
    @media(max-width: 325px){
        .container-content{
            left:60px;
        }
    }
    @media(max-width: 307px){
        .container-content{
            left:47px;
        }
    }
    @media(max-width: 275px){
        .container-content{
            left:36px;
        }
    }
    @media(max-width: 254px){
        .container-content{
            left:26px;
        }
    }*/



</style>
<div class="container-inner">
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Administrator.png')}}">
            <h6 style="left:29px;">School Administration</h6>
            <p>The school administration module is the most important part of the school</p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Student.png')}}">
            <h6 style="left: 37px;">Admission Process</h6>
            <p>Admission module provides a student admission process in simple steps...</p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Fees.png')}}" style="margin-top: -37px;">
            <h6 style="left: 48px;">Fee Collection</h6>
            <p>Fee Collection is an essential module that help in maintaining finance of the school. </p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Attendance.png')}}" style="margin-top: -31px;
padding: 64px;">
            <h6 style="left: 18px;">Student/Staff Attendance</h6>
            <p>This provides a very fast and easyprocess in Attendeance taking and tracking of Students and Staff. </p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Data.png')}}" style="margin-top: -26px;">
            <h6 style="left: 35px;">Data Managements</h6>
            <p>Manage multiple data with less burdens.</p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Student.png')}}">
            <h6 style="left: 51px;">Student Details</h6>
            <p>This module provides more detail on student management.</p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Employees.png')}}">
            <h6 style="left: 38px;">Employee Details</h6>
                <p>A school employee management module which helps to manage data about employees.</p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Account.png')}}">
            <h6 style="left: 26px;">Account Management</h6>
            <p>This module helps in managing financial account.</p>
    </div>
    </a>
    <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/HR.png')}}">
            <h6 style="left: 46px;">HR Management</h6>
            <p>HR management is an important module that handle human resources</p>
    </div>
    </a>
     <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Time_Table.png')}}">
            <h6 style="left: 35px;">Calendar of Event</h6>
            <p>The calendar of event provides informations on the school day to day activities.</p>
    </div>
    </a>
     <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Student.png')}}">
            <h6 style="left: 30px;">Student Management</h6>
            <p>this is a stduent management field </p>
    </div>
    </a>
     <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Student.png')}}">
            <h6 style="left: 30px;">Student Management</h6>
            <p>this is a stduent management field </p>
    </div>
    </a>
     <a href="#"><div class="container-content">
        <img src="{{ URL::asset('img/Student.png')}}">
            <h6 style="left: 30px;">Student Management</h6>
            <p>this is a stduent management field </p>
    </div>
    </a>

</div>
@stop