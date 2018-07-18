<!-- Hier soll der Fragenkatalog-vorfahrt hin-->
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Testfragen - Vorfahrt</div>

        <form class = "Fragen" method="post" action="" name="fragen">

            <!-- Filterung nach Kategorie: -->
        @foreach($fragenkatalogs = DB::table('fragenkatalogs')->select('frage', 'fragen_id', 'richtige_antwort', 'erste_falsche_antwort', 'zweite_falsche_antwort')->where('Kategorie', 'Vorfahrt') -> get() as $fragenkatalog)
           <!-- Erstmal ohne Bildeingabe-->

               <!-- Hier wieder Frage einfügen wenn Datenbank stimmt -->
               <label><b> {{$fragenkatalog->frage}} </b></label><br>

               <!-- Zufällige Position der richtigen Antwort: Es gibt 6 verschiedene Möglichkeiten die Fragen anzuordnen -->
           @if(rand(1,6)== 1)
            <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "richtige_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> richtige_antwort}} </label><br>
            <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "erste_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> erste_falsche_antwort}}</label><br>
            <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "zweite_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> zweite_falsche_antwort}}</label><br><br>
                 @elseif(rand(2,6)==2)
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "richtige_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> richtige_antwort}} </label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "zweite_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> zweite_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "erste_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> erste_falsche_antwort}}</label><br><br>
                @elseif(rand(3,6)==3)
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "erste_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> erste_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "richtige_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> richtige_antwort}} </label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "zweite_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> zweite_falsche_antwort}}</label><br><br>
                 @elseif(rand(4,6)==4)
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "zweite_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> zweite_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "richtige_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> richtige_antwort}} </label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "erste_falsche_antwort" name="{{$fragenkatalog->fragen_id}}"> {{$fragenkatalog -> erste_falsche_antwort}}</label><br><br>
               @elseif(rand(5,6)==5)
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "erste_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> erste_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "zweite_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> zweite_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "richtige_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> richtige_antwort}} </label><br><br>
               @else
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "zweite_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> zweite_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "erste_falsche_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> erste_falsche_antwort}}</label><br>
                   <label><input type="radio" id="{{$fragenkatalog->fragen_id}}" value = "richtige_antwort" name="{{$fragenkatalog->fragen_id}}" required> {{$fragenkatalog -> richtige_antwort}} </label><br><br>
            @endif

                   @endforeach

            <input type="submit" value="Antworten prüfen" name="bestaetigen">
            {{ csrf_field() }}


        </form>

                 </div>
            </div>
        </div>
    </div>
</div>

@endsection
