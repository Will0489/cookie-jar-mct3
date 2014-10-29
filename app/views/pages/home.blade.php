@extends('layouts.default')

@section('content')
    <img src="assets/images/header.gif" class="cover image"/>
    
    <div class="section">
        <div class="col span_1_of_3">
            <h2>Latest Questions</h2>
        </div>
         <div class="col span_2_of_3">
            <p class='xs right'><a href="login">Explore All</a></p>
        </div> 
    </div>
        <div class="section group">
            <div class="col span_1_of_3">
            This is column 1
            </div>
            <div class="col span_1_of_3">
            This is column 2
            </div>
            <div class="col span_1_of_3">
            This is column 3
            </div>
        </div>
        <div class="section group">
            <div class="col span_1_of_3">
            This is column 1
            </div>
            <div class="col span_1_of_3">
            This is column 2
            </div>
            <div class="col span_1_of_3">
            This is column 3
            </div>
        </div>
        <div class="section">
            <div class="col span_3_of_3">
                <h2>Story: Natan van Boven</h2>
                <p>Student of engineering Natan helped Alison with her art project and this is how their friendship was born!</p>
                <br/>
                <img src="assets/images/article.gif" class="image"/>
            </div>
        </div>

    </div>
@stop