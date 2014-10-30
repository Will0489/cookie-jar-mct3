@extends('layouts.default')

@section('content')
    <img src="assets/images/header.gif" class="cover image"/>
    <div class="section group" id="welcome">
        <div class="col span_3_of_3">
            <h1 class="h-white">Cookie Jar is for Creators and Makers</h1>
            <p class="p-white">Do you need a model for your photoshoot? </p>
            <p class="p-white">Or you are a web ninja in need of project for your portfolio?</p>
            <p class="p-white">Here you can ask for help your fellow students!</p>
            <br/>
            <br/>
            <a href="signup" class="btn xxxl red">Sign Up</a>
        </div>
    </div>
    <div class="section">
    </div>
    <div class="section">
        <div class="col span_1_of_3 qHeading">
            <h2 class="qHeading">Latest Questions</h2>
        </div>
         <div class="col span_2_of_3">
            <p class='xs right'><a href="login">Explore All</a></p>
        </div> 
    </div>
        <div class="section group">
            @include('pages.partials.question')
            @include('pages.partials.question')
            @include('pages.partials.question')
        </div>
        <div class="section group">
            @include('pages.partials.question')
            @include('pages.partials.question')
            @include('pages.partials.question')
        </div>
        <div class="section">
            <div class="col span_3_of_3">
                <h2>Story: Natan van Boven</h2>
                <p>Student of engineering Natan helped Alison with her art project and this is how their friendship was born!</p>
                <br/>
                <img src="assets/images/article.gif" class="image article"/>
                <div class="read">
                    <a href="" class="btn white">Read The Story</a>
                </div>
            </div>
        </div>
    </div>
@stop